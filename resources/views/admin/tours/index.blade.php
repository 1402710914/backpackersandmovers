@extends('admin.layout')

@section('title', 'Tours')

@section('content')
<x-admin.page-toolbar title="Tours" :subtitle="$tours->count().' tour(s)'">
    <a href="{{ route('admin.tours.export', request()->only(['search', 'category_id', 'status'])) }}" class="btn btn-outline-secondary btn-sm">
        <i class="fa-solid fa-file-export" aria-hidden="true"></i> Export CSV
    </a>
    <a href="{{ route('admin.tours.create') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-plus" aria-hidden="true"></i> Add tour
    </a>
</x-admin.page-toolbar>

<div class="card border-0 shadow-sm mb-4 admin-filter-bar">
    <div class="card-body py-3">
        <form method="get" action="{{ route('admin.tours.index') }}" class="row g-2 align-items-end">
            <div class="col-lg-4 col-md-6">
                <label for="tour-search" class="form-label small text-muted mb-1">Search</label>
                <input type="search" id="tour-search" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="Title, slug, category, destination…">
            </div>
            <div class="col-lg-3 col-md-6">
                <label for="tour-category" class="form-label small text-muted mb-1">Category</label>
                <select id="tour-category" name="category_id" class="form-select form-select-sm">
                    <option value="">All categories</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected((string) request('category_id') === (string) $cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2 col-md-4">
                <label for="tour-status" class="form-label small text-muted mb-1">Status</label>
                <select id="tour-status" name="status" class="form-select form-select-sm">
                    <option value="">All</option>
                    <option value="active" @selected(request('status') === 'active')>Active</option>
                    <option value="inactive" @selected(request('status') === 'inactive')>Inactive</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-8">
                <div class="d-flex flex-wrap gap-1">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Search
                </button>
                @if (request()->hasAny(['search', 'category_id', 'status']))
                    <a href="{{ route('admin.tours.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
                @endif
                </div>
            </div>
        </form>

        <hr class="my-3 my-2">

        <form method="post" action="{{ route('admin.tours.import') }}" enctype="multipart/form-data" class="row g-2 align-items-end">
            @csrf
            <div class="col-md-8 col-lg-6">
                <label for="tour-import-file" class="form-label small text-muted mb-1">Import CSV</label>
                <input type="file" id="tour-import-file" name="file" class="form-control form-control-sm" accept=".csv,text/csv" required>
                <div class="form-text">Use exported CSV format. Updates by <code>id</code> or <code>slug</code>; creates new rows otherwise.</div>
            </div>
            <div class="col-md-4 col-lg-auto">
                <label class="form-label small text-muted mb-1 d-block invisible">Import</label>
                <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="fa-solid fa-file-import" aria-hidden="true"></i> Import
                </button>
            </div>
        </form>
    </div>
</div>

<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th class="text-center" style="width: 72px;">Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Destination</th>
                    <th>Price</th>
                    <th>Active</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($tours as $tour)
                <tr>
                    <td class="text-center">
                        @if ($tour->featured_image)
                            <img src="{{ $tour->listingImageUrl() }}" alt="" class="rounded border" style="width: 56px; height: 56px; object-fit: cover;">
                        @else
                            <img src="{{ asset('assets/img/home-1/tour/tour-8.jpg') }}" alt="" class="rounded border opacity-50" style="width: 56px; height: 56px; object-fit: cover;" title="No featured image">
                        @endif
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit($tour->title, 48) }}</td>
                    <td class="small">{{ $tour->category?->name ?? '—' }}</td>
                    <td class="small">
                        <code class="text-break">{{ $tour->slug }}</code>
                        @if ($tour->is_active)
                            <a href="{{ route('tours.show', $tour->slug) }}" target="_blank" rel="noopener noreferrer" class="d-block mt-1">View page</a>
                        @endif
                    </td>
                    <td>{{ $tour->destination?->name ?? '—' }}</td>
                    <td>{{ $tour->formattedPrice() }}</td>
                    <td>
                        @if ($tour->is_active)
                            <span class="admin-badge">Active</span>
                        @else
                            <span class="admin-badge admin-badge-muted">Off</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <span class="admin-table-actions">
                            <a href="{{ route('admin.tours.edit', $tour) }}">Edit</a>
                            <span class="text-muted small">#{{ $tour->id }}</span>
                            <form action="{{ route('admin.tours.destroy', $tour) }}" method="post" class="d-inline" onsubmit="return confirm('Delete this tour?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-link btn-sm text-danger p-0">Delete</button>
                            </form>
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">No tours match your filters.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
