@extends('admin.layout')

@section('title', 'Homepage sections')

@section('content')
<x-admin.page-toolbar title="Homepage sections" subtitle="Show or hide sections on the homepage" />

@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<form method="post" action="{{ route('admin.settings.homepage.update') }}" class="admin-form-card">
    @csrf
    @method('PUT')

    <div class="d-flex align-items-start justify-content-between gap-3 border rounded p-3 mb-0">
        <div>
            <h5 class="mb-1">School &amp; college tour programs</h5>
            <p class="text-muted small mb-0">
                Category grid with heading “School &amp; college tour programs” and pickup line below the hero.
            </p>
        </div>
        <div class="form-check form-switch flex-shrink-0 mt-1">
            <input type="hidden" name="home_tour_programs_section_enabled" value="0">
            <input
                class="form-check-input"
                type="checkbox"
                role="switch"
                id="home_tour_programs_section_enabled"
                name="home_tour_programs_section_enabled"
                value="1"
                @checked((string) old('home_tour_programs_section_enabled', $tourProgramsEnabled ? '1' : '0') === '1')
            >
            <label class="form-check-label" for="home_tour_programs_section_enabled">Show on homepage</label>
        </div>
    </div>

    <div class="admin-form-actions mt-4">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@endsection
