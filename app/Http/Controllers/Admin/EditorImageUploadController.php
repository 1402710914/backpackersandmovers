<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\PublicStorage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Throwable;

class EditorImageUploadController extends Controller
{
    /**
     * TinyMCE and other editors may use different multipart field names.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $file = $this->resolveUploadedImage($request);

        if (! $file instanceof UploadedFile) {
            return response()->json([
                'message' => $this->missingFileMessage($request),
                'errors' => ['file' => ['Upload missing or invalid (check PHP upload_max_filesize / post_max_size).']],
            ], 422);
        }

        $validator = Validator::make(
            ['file' => $file],
            ['file' => ['file', 'image', 'max:10240']],
        );
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first('file'),
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $path = Storage::disk('public')->putFile('blog/editor', $file);
        } catch (Throwable) {
            return response()->json([
                'message' => 'Could not save the file on the server.',
            ], 500);
        }

        return response()->json([
            'location' => PublicStorage::diskUrl($path) ?? '',
        ]);
    }

    private function resolveUploadedImage(Request $request): ?UploadedFile
    {
        foreach (['file', 'upload', 'image'] as $key) {
            $f = $request->file($key);
            if ($f instanceof UploadedFile && $f->isValid()) {
                return $f;
            }
        }

        foreach (Arr::flatten($request->allFiles()) as $f) {
            if ($f instanceof UploadedFile && $f->isValid() && str_starts_with((string) $f->getMimeType(), 'image/')) {
                return $f;
            }
        }

        return null;
    }

    private function missingFileMessage(Request $request): string
    {
        $keys = array_keys($request->allFiles());
        $base = 'No image file received by the server.';
        if (config('app.debug') && $keys !== []) {
            return $base.' (multipart keys: '.implode(', ', $keys).')';
        }

        return $base.' Increase PHP upload_max_filesize and post_max_size if the file is large.';
    }
}
