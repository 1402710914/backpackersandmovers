@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="admin-page-head">
    <h1>Dashboard</h1>
    <p>Overview and quick stats</p>
</div>

<div class="admin-stat-grid">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fa-solid fa-users" aria-hidden="true"></i></div>
        <div>
            <div class="admin-stat-label">Total users</div>
            <div class="admin-stat-value">{{ $users }}</div>
            <div class="admin-stat-hint">Registered customers</div>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fa-solid fa-user-check" aria-hidden="true"></i></div>
        <div>
            <div class="admin-stat-label">Verified users</div>
            <div class="admin-stat-value">{{ $verifiedUsers }}</div>
            <div class="admin-stat-hint">Email verified</div>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fa-solid fa-newspaper" aria-hidden="true"></i></div>
        <div>
            <div class="admin-stat-label">Blog posts</div>
            <div class="admin-stat-value">{{ $posts }}</div>
            <div class="admin-stat-hint">Published &amp; drafts</div>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fa-solid fa-envelope-open-text" aria-hidden="true"></i></div>
        <div>
            <div class="admin-stat-label">Enquiries</div>
            <div class="admin-stat-value">{{ $enquiries }}</div>
            <div class="admin-stat-hint">Contact form</div>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fa-solid fa-suitcase-rolling" aria-hidden="true"></i></div>
        <div>
            <div class="admin-stat-label">Tours</div>
            <div class="admin-stat-value">{{ $tours }}</div>
            <div class="admin-stat-hint">Tour packages</div>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fa-solid fa-map-location-dot" aria-hidden="true"></i></div>
        <div>
            <div class="admin-stat-label">Destinations</div>
            <div class="admin-stat-value">{{ $destinations }}</div>
            <div class="admin-stat-hint">Destination records</div>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fa-solid fa-people-group" aria-hidden="true"></i></div>
        <div>
            <div class="admin-stat-label">Team members</div>
            <div class="admin-stat-value">{{ $team }}</div>
            <div class="admin-stat-hint">Our team roster</div>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fa-solid fa-calendar-check" aria-hidden="true"></i></div>
        <div>
            <div class="admin-stat-label">Bookings</div>
            <div class="admin-stat-value">{{ $orders }}</div>
            <div class="admin-stat-hint">Tour bookings</div>
        </div>
    </div>
</div>

<div class="admin-panel">
    <div class="admin-panel-head">
        <h2><i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i> Recent enquiries</h2>
        <a class="admin-panel-link" href="{{ route('admin.messages.index') }}">View all <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
    </div>
    @if ($recentEnquiries->isEmpty())
        <p class="admin-table-empty mb-0">No contact messages yet.</p>
    @else
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Received</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentEnquiries as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td><a href="{{ route('admin.messages.show', $row) }}">{{ $row->email }}</a></td>
                            <td>{{ $row->created_at?->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
