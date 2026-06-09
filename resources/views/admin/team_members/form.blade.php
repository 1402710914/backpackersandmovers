@extends('admin.layout')

@section('title', $member->exists ? 'Edit team member' : 'New team member')

@section('content')
<x-admin.page-toolbar :title="$member->exists ? 'Edit team member' : 'New team member'" subtitle="Profile shown on the team page" />

<form method="post" enctype="multipart/form-data" action="{{ $member->exists ? route('admin.team-members.update', $member) : route('admin.team-members.store') }}" class="admin-form-card">
    @csrf
    @if ($member->exists) @method('PUT') @endif
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
    <div class="mb-2"><label class="form-label">Name</label><input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $member->name) }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-2"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $member->slug) }}">
        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-2"><label class="form-label">Role</label><input name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $member->role) }}">
        @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-2"><label class="form-label">Email</label><input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $member->email) }}">
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-2">
        <label class="form-label">Bio</label>
        <textarea id="team-bio-editor" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="8">{!! old('bio', $member->bio ?? '') !!}</textarea>
        @error('bio')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
        <div class="form-text">Visual editor (same as blog) — toolbar <strong>&lt;&gt;</strong> for HTML. Insert images via <strong>Image</strong> or paste; uploads go to storage.</div>
    </div>
    <div class="mb-2"><label class="form-label">Sort order</label><input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $member->sort_order ?? 0) }}">
        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    @php
        $photoPreviewSrc = ($member->exists && $member->photo) ? storage_url($member->photo) : '';
    @endphp
    <div class="mb-2">
        <label class="form-label">Photo</label>
        <div class="mb-2 {{ $photoPreviewSrc ? '' : 'd-none' }}" id="team-photo-preview-box">
            <img src="{{ $photoPreviewSrc }}" alt="" id="team-photo-preview-img" class="rounded border" style="max-width: 280px; max-height: 160px; object-fit: cover;">
            <div class="form-text" id="team-photo-preview-hint">{{ $photoPreviewSrc ? 'Current photo. Choose a new file below to replace it.' : '' }}</div>
        </div>
        <input type="file" name="photo" id="team-photo-input" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
        <div class="form-text">Profile image on team pages. JPG, PNG, WebP or GIF — max 4&nbsp;MB.</div>
    </div>
    <div class="mb-3 form-check">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" class="form-check-input @error('is_active') is-invalid @enderror" id="tm" {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="tm">Active</label>
        @error('is_active')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="admin-form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.team-members.index') }}" class="btn btn-link">Cancel</a>
    </div>
</form>
@endsection

@push('styles')
<style>
    .tox-tinymce { border-radius: 6px !important; }
    .tox .tox-edit-area__iframe { min-height: 360px; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
<script>
(function () {
    var el = document.getElementById('team-bio-editor');
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
        selector: '#team-bio-editor',
        height: 420,
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

    var photoInput = document.getElementById('team-photo-input');
    var photoBox = document.getElementById('team-photo-preview-box');
    var photoImg = document.getElementById('team-photo-preview-img');
    var photoHint = document.getElementById('team-photo-preview-hint');
    if (photoInput && photoBox && photoImg) {
        var photoSavedSrc = photoImg.getAttribute('src') || '';
        photoInput.addEventListener('change', function () {
            var file = photoInput.files && photoInput.files[0];
            if (!file || !/^image\//.test(file.type)) {
                if (photoSavedSrc) {
                    photoImg.src = photoSavedSrc;
                    photoBox.classList.remove('d-none');
                    if (photoHint) {
                        photoHint.textContent = 'Current photo. Choose a new file below to replace it.';
                    }
                } else {
                    photoImg.removeAttribute('src');
                    photoBox.classList.add('d-none');
                    if (photoHint) {
                        photoHint.textContent = '';
                    }
                }
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                photoImg.src = e.target.result;
                photoBox.classList.remove('d-none');
                if (photoHint) {
                    photoHint.textContent = 'New photo preview — click Save to apply.';
                }
            };
            reader.readAsDataURL(file);
        });
    }
})();
</script>
@endpush
