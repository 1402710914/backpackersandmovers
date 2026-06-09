@extends('admin.layout')

@section('title', $post->exists ? 'Edit article' : 'New article')

@section('content')
@php $categories = \App\Models\Category::query()->where('type', 'blog')->orderBy('name')->get(); @endphp
<x-admin.page-toolbar :title="$post->exists ? 'Edit article' : 'New article'" subtitle="Blog content for the public site" />

<form method="post" enctype="multipart/form-data" action="{{ $post->exists ? route('admin.blog-posts.update', $post) : route('admin.blog-posts.store') }}" class="admin-form-card">
    @csrf
    @if ($post->exists) @method('PUT') @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Please fix the following:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-2">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">—</option>
            @foreach ($categories as $c)
                <option value="{{ $c->id }}" @selected(old('category_id', $post->category_id) == $c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-2"><label class="form-label">Title</label><input name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-2"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $post->slug) }}">
        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-2">
        <label class="form-label">Excerpt</label>
        <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="2">{{ old('excerpt', $post->excerpt) }}</textarea>
        @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
        <div class="form-text">Short description for the article (max 500 words).</div>
    </div>
    <div class="mb-2">
        <label class="form-label">Body</label>
        <textarea id="blog-body-editor" name="body" class="form-control @error('body') is-invalid @enderror" rows="14">{!! old('body', $post->body ?? '') !!}</textarea>
        @error('body')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
        <div class="form-text">Visual editor — use <strong>Published</strong> when the article should appear on the site. Leave it off to save a draft.</div>
    </div>
    <div class="mb-2"><label class="form-label">Published at</label><input type="datetime-local" name="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
        @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    @php
        $featuredPreviewSrc = ($post->exists && $post->featured_image) ? storage_url($post->featured_image) : '';
    @endphp
    <div class="mb-2">
        <label class="form-label">Featured image</label>
        <div class="mb-2 {{ $featuredPreviewSrc ? '' : 'd-none' }}" id="blog-featured-preview-box">
            <img src="{{ $featuredPreviewSrc }}" alt="" id="blog-featured-preview-img" class="rounded border" style="max-width: 280px; max-height: 160px; object-fit: cover;">
            <div class="form-text" id="blog-featured-preview-hint">{{ $featuredPreviewSrc ? 'Current image. Choose a new file below to replace it.' : '' }}</div>
        </div>
        <input type="file" name="featured_image" id="blog-featured-image-input" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
        @error('featured_image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">Optional. Shown on the article page and blog cards. JPG, PNG, WebP or GIF — max 4&nbsp;MB.</div>
    </div>
    <div class="mb-3 form-check">
        <input type="hidden" name="is_published" value="0">
        @php
            $pubDefault = $post->exists ? (bool) $post->is_published : false;
        @endphp
        <input type="checkbox" name="is_published" value="1" class="form-check-input @error('is_published') is-invalid @enderror" id="pub" {{ old('is_published', $pubDefault) ? 'checked' : '' }}>
        <label class="form-check-label" for="pub">Published</label>
        @error('is_published')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
        <div class="form-text">New articles start as drafts. Turn on when you’re ready to show them on the site.</div>
    </div>
    <div class="admin-form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-link">Cancel</a>
    </div>
</form>
@endsection

@push('styles')
<style>
    .tox-tinymce { border-radius: 6px !important; }
    .tox .tox-edit-area__iframe { min-height: 420px; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
<script>
(function () {
    var el = document.getElementById('blog-body-editor');
    if (!el) return;

    if (typeof tinymce === 'undefined') {
        console.error('TinyMCE failed to load. Check network / CDN or ad-blockers.');
        return;
    }

    var uploadUrl = @json(route('admin.editor-image-upload'));
    var csrfMeta = document.querySelector('meta[name="csrf-token"]');
    var csrf = csrfMeta ? csrfMeta.getAttribute('content') : '';

    function parseUploadResponse(res, raw) {
        if (res.status === 401 || res.status === 403) {
            return { ok: false, err: 'Session expired or no permission — refresh and sign in again as admin.' };
        }
        if (res.status === 419) {
            return { ok: false, err: 'Page expired (CSRF). Refresh this page then try the upload again.' };
        }
        if (raw.trim().startsWith('<')) {
            return { ok: false, err: 'Server returned HTML (often login or error page). Status ' + res.status + '.' };
        }
        var json;
        try {
            json = JSON.parse(raw);
        } catch (e) {
            return { ok: false, err: 'Invalid JSON from server (status ' + res.status + ').' };
        }
        if (!json || !json.location) {
            return { ok: false, err: json && json.message ? json.message : 'Missing location URL in response.' };
        }
        return { ok: true, location: json.location };
    }

    tinymce.init({
        selector: '#blog-body-editor',
        height: 500,
        menubar: 'edit insert format table tools',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime table help wordcount',
        toolbar: 'undo redo | blocks | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code fullscreen | removeformat',
        content_style: 'body{font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;font-size:16px;line-height:1.65}',
        branding: false,
        promotion: false,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        image_advtab: true,
        automatic_uploads: true,
        paste_data_images: true,
        images_upload_handler: function (blobInfo, progress) {
            return new Promise(function (resolve, reject) {
                if (!uploadUrl || !csrf) {
                    reject('Missing upload URL or CSRF token. Reload the page.');
                    return;
                }
                var formData = new FormData();
                var name = typeof blobInfo.filename === 'function'
                    ? (blobInfo.filename() || 'image.jpg')
                    : 'image.jpg';
                var blob = typeof blobInfo.blob === 'function' ? blobInfo.blob() : blobInfo.blob;
                formData.append('file', blob, name);
                formData.append('_token', csrf);
                if (typeof progress === 'function') {
                    progress(0);
                }
                fetch(uploadUrl, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData,
                    credentials: 'same-origin',
                })
                    .then(function (res) {
                        return res.text().then(function (text) {
                            return { res: res, text: text };
                        });
                    })
                    .then(function (o) {
                        if (typeof progress === 'function') {
                            progress(100);
                        }
                        if (o.res.status < 200 || o.res.status >= 300) {
                            var parsed = parseUploadResponse(o.res, o.text);
                            if (!parsed.ok && o.res.status >= 400) {
                                try {
                                    var errBody = JSON.parse(o.text);
                                    var msg = errBody.message || (errBody.errors && errBody.errors.file && errBody.errors.file[0]);
                                    if (msg) {
                                        reject(msg);
                                        return;
                                    }
                                } catch (ignore) {}
                            }
                            reject(parsed.err || ('Upload failed (HTTP ' + o.res.status + ').'));
                            return;
                        }
                        var out = parseUploadResponse(o.res, o.text);
                        if (!out.ok) {
                            reject(out.err);
                            return;
                        }
                        resolve(out.location);
                    })
                    .catch(function () {
                        reject('Network error — could not reach the server.');
                    });
            });
        },
        setup: function (editor) {
            editor.on('change keyup undo redo SetContent', function () {
                editor.save();
            });
        },
    });

    var form = document.querySelector('.admin-form-card');
    if (form) {
        form.addEventListener('submit', function () {
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }
        });
    }

    var featuredInput = document.getElementById('blog-featured-image-input');
    var featuredBox = document.getElementById('blog-featured-preview-box');
    var featuredImg = document.getElementById('blog-featured-preview-img');
    var featuredHint = document.getElementById('blog-featured-preview-hint');
    if (featuredInput && featuredBox && featuredImg) {
        var featuredSavedSrc = featuredImg.getAttribute('src') || '';
        featuredInput.addEventListener('change', function () {
            var file = featuredInput.files && featuredInput.files[0];
            if (!file || !/^image\//.test(file.type)) {
                if (featuredSavedSrc) {
                    featuredImg.src = featuredSavedSrc;
                    featuredBox.classList.remove('d-none');
                    if (featuredHint) {
                        featuredHint.textContent = 'Current image. Choose a new file below to replace it.';
                    }
                } else {
                    featuredImg.removeAttribute('src');
                    featuredBox.classList.add('d-none');
                    if (featuredHint) {
                        featuredHint.textContent = '';
                    }
                }
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                featuredImg.src = e.target.result;
                featuredBox.classList.remove('d-none');
                if (featuredHint) {
                    featuredHint.textContent = 'New image preview — click Save to apply.';
                }
            };
            reader.readAsDataURL(file);
        });
    }
})();
</script>
@endpush
