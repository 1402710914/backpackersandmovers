@extends('admin.layout')

@section('title', 'Email')

@section('content')
<x-admin.page-toolbar title="Email tool" subtitle="Send test messages using .env mail settings" />

<p class="admin-form-hint mb-3">Uses your application mail configuration. Check logs for delivery status.</p>

<form method="post" action="{{ route('admin.mail.send') }}" class="admin-form-card mb-4">
    @csrf
    <div class="mb-3">
        <label class="form-label">To</label>
        <input type="email" name="to_email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control" required>
    </div>
    <div class="mb-0">
        <label class="form-label">Body (plain text)</label>
        <textarea name="body" class="form-control" rows="6" required></textarea>
    </div>
    <div class="admin-form-actions">
        <button type="submit" class="btn btn-primary">Send test email</button>
    </div>
</form>

<h2 class="admin-section-heading">Recent mail logs</h2>
<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>When</th>
                    <th>To</th>
                    <th>Subject</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td class="text-muted small">{{ $log->created_at?->format('Y-m-d H:i') }}</td>
                    <td>{{ $log->to_email }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($log->subject, 48) }}</td>
                    <td><span class="admin-badge admin-badge-muted">{{ $log->status }}</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="admin-pagination">{{ $logs->links() }}</div>
@endsection
