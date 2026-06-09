<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(): View
    {
        $messages = ContactMessage::query()->orderByDesc('id')->paginate(25);

        return view('admin.messages.index', compact('messages'));
    }

    public function show(ContactMessage $contact_message): View
    {
        $contact_message->forceFill(['is_read' => true])->save();

        return view('admin.messages.show', ['message' => $contact_message]);
    }

    public function destroy(ContactMessage $contact_message): RedirectResponse
    {
        $contact_message->delete();

        return redirect()->route('admin.messages.index')->with('status', 'Message deleted.');
    }
}
