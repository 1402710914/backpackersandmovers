@extends('admin.layout')

@section('title', 'Messages')

@section('content')
<x-admin.page-toolbar title="Contact messages" subtitle="Enquiries from the website form" />

<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Read</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($messages as $message)
                <tr>
                    <td class="text-muted small">{{ $message->created_at?->format('Y-m-d H:i') }}</td>
                    <td>{{ $message->name }}</td>
                    <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                    <td>
                        @if ($message->is_read)
                            <span class="admin-badge admin-badge-muted">Read</span>
                        @else
                            <span class="admin-badge">New</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <span class="admin-table-actions">
                            <a href="{{ route('admin.messages.show', $message) }}">Open</a>
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="post" class="d-inline" onsubmit="return confirm('Delete?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-link btn-sm text-danger p-0">Delete</button>
                            </form>
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="admin-pagination">{{ $messages->links() }}</div>
@endsection
