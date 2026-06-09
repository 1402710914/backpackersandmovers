@extends('admin.layout')

@section('title', 'Notifications')

@section('content')
<x-admin.page-toolbar title="User notifications" subtitle="Alerts shown in customer accounts">
    <a href="{{ route('admin.notifications.create') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Send new
    </a>
</x-admin.page-toolbar>

<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Title</th>
                    <th>Read</th>
                    <th>Sent</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($alerts as $alert)
                <tr>
                    <td>{{ $alert->user?->email ?? '—' }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($alert->title, 50) }}</td>
                    <td>{{ $alert->read_at ? 'Yes' : 'No' }}</td>
                    <td class="text-muted small">{{ $alert->created_at?->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="admin-pagination">{{ $alerts->links() }}</div>
@endsection
