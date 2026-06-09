@extends('admin.layout')

@section('title', 'Message')

@section('content')
<x-admin.page-toolbar :title="'Message from '.$message->name" subtitle="Contact form submission" />

<div class="admin-detail-card">
    <p class="small text-muted mb-3">
        <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
        @if ($message->phone)
            <span class="mx-1">·</span> {{ $message->phone }}
        @endif
        <span class="mx-1">·</span> {{ $message->created_at?->format('Y-m-d H:i') }}
    </p>
    @if ($message->subject)
        <p class="mb-2"><strong>Subject:</strong> {{ $message->subject }}</p>
    @endif
    <div class="mb-0 admin-pre-wrap">{{ $message->message }}</div>
    <div class="admin-form-actions mb-0 border-0 pb-0 ps-0">
        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary btn-sm">Back to list</a>
    </div>
</div>
@endsection
