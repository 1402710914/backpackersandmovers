<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class MailToolController extends Controller
{
    public function index(): View
    {
        $logs = MailLog::query()->orderByDesc('id')->paginate(20);

        return view('admin.mail.index', compact('logs'));
    }

    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'to_email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:10000'],
        ]);

        try {
            Mail::raw($data['body'], function ($message) use ($data) {
                $message->to($data['to_email'])->subject($data['subject']);
            });
            MailLog::create([
                'to_email' => $data['to_email'],
                'subject' => $data['subject'],
                'body' => $data['body'],
                'status' => 'sent',
            ]);
            $msg = 'Message queued / sent.';
        } catch (\Throwable $e) {
            MailLog::create([
                'to_email' => $data['to_email'],
                'subject' => $data['subject'],
                'body' => $data['body'],
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);
            $msg = 'Mail error: '.$e->getMessage();
        }

        return redirect()->route('admin.mail.index')->with('status', $msg);
    }
}
