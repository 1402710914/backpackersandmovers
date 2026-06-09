@extends('admin.layout')

@section('title', $tour->exists ? 'Edit tour' : 'New tour')

@section('content')
@php
    $categories = \App\Models\Category::query()->where('type', 'tour')->orderBy('name')->get();
    $destinations = \App\Models\Destination::query()->excludingDemo()->orderBy('name')->get();
    $faqRows = old('faq', $tour->exists ? $tour->faqEntries() : []);
    if (! is_array($faqRows)) {
        $faqRows = [];
    }
    if (count($faqRows) === 0) {
        $faqRows = [['question' => '', 'answer' => '']];
    }

    $itineraryRows = old('itinerary_days');
    if (! is_array($itineraryRows)) {
        if ($tour->exists) {
            $fromModel = $tour->itineraryDays();
            if (count($fromModel) > 0) {
                $itineraryRows = $fromModel;
            } else {
                $legacy = $tour->legacyItineraryRawForAdmin();
                $itineraryRows = $legacy !== null
                    ? [['day_label' => '', 'title' => '', 'body' => $legacy]]
                    : [['day_label' => '', 'title' => '', 'body' => '']];
            }
        } else {
            $itineraryRows = [['day_label' => '', 'title' => '', 'body' => '']];
        }
    }
    if (count($itineraryRows) === 0) {
        $itineraryRows = [['day_label' => '', 'title' => '', 'body' => '']];
    }

    $galleryKeep = old('gallery_keep', $tour->exists ? $tour->galleryImagePaths() : []);
    if (! is_array($galleryKeep)) {
        $galleryKeep = [];
    }
@endphp
<x-admin.page-toolbar :title="$tour->exists ? 'Edit tour' : 'New tour'" subtitle="Rich content, FAQ, pricing, and image" />

@if ($tour->exists)
    <div class="alert alert-light border mb-3 d-flex flex-wrap align-items-center gap-3 justify-content-between">
        <div class="small">
            <strong>Tour #{{ $tour->id }}</strong>
            <span class="text-muted mx-1">·</span>
            <span class="text-muted">URL slug</span>
            <code class="user-select-all">{{ $tour->slug }}</code>
            <span class="text-muted mx-1">—</span>
            <span class="text-muted">Changes here update only this tour. Open the link below to match the page you are editing.</span>
        </div>
        @if ($tour->is_active)
            <a href="{{ route('tours.show', $tour->slug) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary flex-shrink-0">View on site</a>
        @else
            <span class="text-muted small flex-shrink-0">Inactive — hidden on public tours.</span>
        @endif
    </div>
@endif

<form method="post" enctype="multipart/form-data" action="{{ $tour->exists ? route('admin.tours.update', $tour) : route('admin.tours.store') }}" class="admin-form-card" id="tour-admin-form">
    @csrf
    @if ($tour->exists) @method('PUT') @endif
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
    <div class="row">
        <div class="col-md-6 mb-2">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select">
                <option value="">—</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}" @selected(old('category_id', $tour->category_id) == $c->id)>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label">Destination</label>
            <select name="destination_id" class="form-select">
                <option value="">—</option>
                @foreach ($destinations as $d)
                    <option value="{{ $d->id }}" @selected(old('destination_id', $tour->destination_id) == $d->id)>{{ $d->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-2"><label class="form-label">Title</label><input name="title" class="form-control" value="{{ old('title', $tour->title) }}" required></div>
    <div class="mb-2"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control" value="{{ old('slug', $tour->slug) }}"></div>
    <div class="mb-2"><label class="form-label">Excerpt</label><textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $tour->excerpt) }}</textarea></div>

    <div class="mb-3">
        <label class="form-label d-block">Description</label>
        <div class="form-text mb-1">Visual/HTML editor — shown on the site in the <strong>Description</strong> section.</div>
        <textarea id="tour-field-description" name="description" class="form-control js-tinymce-tour" rows="8">{{ old('description', $tour->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label d-block">About</label>
        <textarea id="tour-field-about" name="about" class="form-control js-tinymce-tour" rows="8">{{ old('about', $tour->about) }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label d-block">Itinerary</label>
        <p class="form-text">Day-by-day blocks with a rich-text <strong>Details</strong> editor (lists, bold, colors). Shown on the site as a vertical timeline. Use <strong>Add more</strong> for extra days.</p>
        <div id="itinerary-repeater" class="border rounded p-3 bg-light" data-next-index="{{ count($itineraryRows) }}">
            @foreach ($itineraryRows as $idx => $itinRow)
                <div class="itinerary-repeater-row border rounded p-3 mb-3 bg-white" data-itinerary-row>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-semibold text-muted small itinerary-row-label">Day block #{{ $idx + 1 }}</span>
                        <button type="button" class="btn btn-sm btn-outline-danger itinerary-remove-btn" title="Remove" @if (count($itineraryRows) < 2) style="display:none" @endif>Remove</button>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Day / date line</label>
                            <input type="text" name="itinerary_days[{{ $idx }}][day_label]" class="form-control" value="{{ $itinRow['day_label'] ?? '' }}" maxlength="500" placeholder="e.g. Day 1 | 15th May 2026">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Title</label>
                            <input type="text" name="itinerary_days[{{ $idx }}][title]" class="form-control" value="{{ $itinRow['title'] ?? '' }}" maxlength="500" placeholder="e.g. Delhi to Chopta">
                        </div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Details</label>
                        <textarea id="itinerary-body-{{ $idx }}" name="itinerary_days[{{ $idx }}][body]" class="form-control js-tinymce-itinerary-day" rows="6">{{ $itinRow['body'] ?? '' }}</textarea>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-outline-secondary btn-sm" id="itinerary-add-more">Add more</button>
    </div>
    <div class="mb-3">
        <label class="form-label d-block">Attractions</label>
        <textarea id="tour-field-attractions" name="attractions" class="form-control js-tinymce-tour" rows="8">{{ old('attractions', $tour->attractions) }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label d-block">Offers</label>
        <textarea id="tour-field-offers" name="offers" class="form-control js-tinymce-tour" rows="8">{{ old('offers', $tour->offers) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label d-block">FAQ</label>
        <p class="form-text">Add question &amp; answer pairs (plain text — no rich editor). They appear as an accordion on the tour page. Use <strong>Add more</strong> for extra entries.</p>
        <div id="faq-repeater" class="border rounded p-3 bg-light" data-next-index="{{ count($faqRows) }}">
            @foreach ($faqRows as $idx => $faqRow)
                <div class="faq-repeater-row border rounded p-3 mb-3 bg-white" data-faq-row>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-semibold text-muted small">FAQ #{{ $idx + 1 }}</span>
                        <button type="button" class="btn btn-sm btn-outline-danger faq-remove-btn" title="Remove" @if (count($faqRows) < 2) style="display:none" @endif>Remove</button>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Question</label>
                        <input type="text" name="faq[{{ $idx }}][question]" class="form-control" value="{{ $faqRow['question'] ?? '' }}" maxlength="2000" placeholder="e.g. What is included?">
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Answer</label>
                        <textarea name="faq[{{ $idx }}][answer]" class="form-control" rows="5" placeholder="Plain text answer">{{ $faqRow['answer'] ?? '' }}</textarea>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-outline-secondary btn-sm" id="faq-add-more">Add more</button>
    </div>

    <div class="row">
        <div class="col-md-4 mb-2"><label class="form-label">Price</label><input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $tour->price ?? 0) }}" required></div>
        <div class="col-md-4 mb-2"><label class="form-label">Duration (days)</label><input type="number" name="duration_days" class="form-control" value="{{ old('duration_days', $tour->duration_days ?? 1) }}" required></div>
        <div class="col-md-4 mb-2"><label class="form-label">Group size max</label><input type="number" name="group_size" class="form-control" value="{{ old('group_size', $tour->group_size) }}"></div>
    </div>
    <div class="mb-3">
        <label class="form-label d-block">Featured image</label>
        <p class="form-text mb-1">Main photo on the tour detail page and tour cards.</p>
        @if ($tour->exists && $tour->featured_image)
            <div class="mb-2">
                <img src="{{ storage_url($tour->featured_image) }}" alt="" class="rounded border" style="max-width: 320px; max-height: 200px; object-fit: cover;">
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" name="remove_featured_image" value="1" class="form-check-input" id="remove-featured" {{ old('remove_featured_image') ? 'checked' : '' }}>
                <label class="form-check-label" for="remove-featured">Remove featured image</label>
            </div>
        @endif
        <input type="file" name="featured_image" class="form-control" accept="image/*">
    </div>
    <div class="mb-3">
        <label class="form-label d-block">Gallery</label>
        <p class="form-text mb-1">Extra photos — shown in a grid on the public tour page below the main image. Click × to drop an image, then save.</p>
        <div id="tour-gallery-keep" class="d-flex flex-wrap gap-2 mb-2">
            @foreach ($galleryKeep as $gPath)
                <div class="border rounded p-1 position-relative tour-gallery-item" data-gallery-item style="width: 104px;">
                    <img src="{{ storage_url($gPath) }}" alt="" class="w-100 rounded" style="height: 78px; object-fit: cover;">
                    <input type="hidden" name="gallery_keep[]" value="{{ $gPath }}">
                    <button type="button" class="btn btn-sm btn-outline-danger py-0 px-1 position-absolute top-0 end-0 m-1 gallery-remove-btn" title="Remove from gallery" aria-label="Remove">&times;</button>
                </div>
            @endforeach
        </div>
        <input type="file" name="gallery_new[]" class="form-control" accept="image/*" multiple>
    </div>
    <div class="mb-2 form-check">
        <input type="hidden" name="is_featured" value="0">
        <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="tf" {{ old('is_featured', $tour->is_featured) ? 'checked' : '' }}>
        <label class="form-check-label" for="tf">Featured</label>
    </div>
    <div class="mb-3 form-check">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" class="form-check-input" id="ta" {{ old('is_active', $tour->is_active ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="ta">Active</label>
    </div>
    <div class="admin-form-actions">
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
        <a href="{{ route('admin.tours.index') }}" class="btn btn-link btn-sm">Cancel</a>
    </div>
</form>
@endsection

@push('styles')
<style>
    .tox-tinymce { border-radius: 6px !important; }
    .tox .tox-edit-area__iframe { min-height: 280px; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
<script>
(function () {
    if (typeof tinymce === 'undefined') {
        console.error('TinyMCE failed to load.');
        return;
    }

    var uploadUrl = @json(route('admin.editor-image-upload'));
    var csrfMeta = document.querySelector('meta[name="csrf-token"]');
    var csrf = csrfMeta ? csrfMeta.getAttribute('content') : '';

    function parseUploadResponse(res, raw) {
        if (res.status === 401 || res.status === 403) {
            return { ok: false, err: 'Session expired or no permission.' };
        }
        if (res.status === 419) {
            return { ok: false, err: 'Page expired (CSRF). Refresh and try again.' };
        }
        if (raw.trim().startsWith('<')) {
            return { ok: false, err: 'Server returned HTML. Status ' + res.status + '.' };
        }
        var json;
        try {
            json = JSON.parse(raw);
        } catch (e) {
            return { ok: false, err: 'Invalid JSON from server.' };
        }
        if (!json || !json.location) {
            return { ok: false, err: json && json.message ? json.message : 'Missing location URL.' };
        }
        return { ok: true, location: json.location };
    }

    function buildImageUploadHandler() {
        return function (blobInfo, progress) {
            return new Promise(function (resolve, reject) {
                if (!uploadUrl || !csrf) {
                    reject('Missing upload URL or CSRF token.');
                    return;
                }
                var formData = new FormData();
                var name = typeof blobInfo.filename === 'function'
                    ? (blobInfo.filename() || 'image.jpg')
                    : 'image.jpg';
                var blob = typeof blobInfo.blob === 'function' ? blobInfo.blob() : blobInfo.blob;
                formData.append('file', blob, name);
                formData.append('_token', csrf);
                if (typeof progress === 'function') progress(0);
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
                        if (typeof progress === 'function') progress(100);
                        if (o.res.status < 200 || o.res.status >= 300) {
                            var parsed = parseUploadResponse(o.res, o.text);
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
                        reject('Network error.');
                    });
            });
        };
    }

    var basePlugins = 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime table help wordcount';
    var baseToolbar = 'undo redo | blocks | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code fullscreen | removeformat';
    var contentStyle = 'body{font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;font-size:16px;line-height:1.65}';

    tinymce.init({
        selector: 'textarea.js-tinymce-tour',
        height: 380,
        menubar: 'edit insert format table tools',
        plugins: basePlugins,
        toolbar: baseToolbar,
        content_style: contentStyle,
        branding: false,
        promotion: false,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        image_advtab: true,
        automatic_uploads: true,
        paste_data_images: true,
        images_upload_handler: buildImageUploadHandler(),
        setup: function (editor) {
            editor.on('change keyup undo redo SetContent', function () {
                editor.save();
            });
        },
    });

    function itineraryDayEditorConfig() {
        return {
            height: 300,
            menubar: false,
            plugins: basePlugins,
            toolbar: baseToolbar,
            content_style: contentStyle,
            branding: false,
            promotion: false,
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            image_advtab: true,
            automatic_uploads: true,
            paste_data_images: true,
            images_upload_handler: buildImageUploadHandler(),
            setup: function (editor) {
                editor.on('change keyup undo redo SetContent', function () {
                    editor.save();
                });
            },
        };
    }

    function initItineraryDayEditor(textarea) {
        if (!textarea) {
            return;
        }
        if (!textarea.id) {
            textarea.id = 'itinerary-body-n' + Date.now() + '-' + Math.random().toString(16).slice(2);
        }
        tinymce.init(Object.assign({}, itineraryDayEditorConfig(), { target: textarea }));
    }

    document.querySelectorAll('textarea.js-tinymce-itinerary-day').forEach(function (el) {
        initItineraryDayEditor(el);
    });

    var itineraryRepeater = document.getElementById('itinerary-repeater');
    var itineraryAddBtn = document.getElementById('itinerary-add-more');

    function itineraryRowCount() {
        return itineraryRepeater ? itineraryRepeater.querySelectorAll('[data-itinerary-row]').length : 0;
    }

    function refreshItineraryRemoveButtons() {
        if (!itineraryRepeater) {
            return;
        }
        var n = itineraryRowCount();
        itineraryRepeater.querySelectorAll('.itinerary-remove-btn').forEach(function (btn) {
            btn.style.display = n > 1 ? '' : 'none';
        });
    }

    function renumberItineraryLabels() {
        if (!itineraryRepeater) {
            return;
        }
        itineraryRepeater.querySelectorAll('[data-itinerary-row]').forEach(function (r, i) {
            var label = r.querySelector('.itinerary-row-label');
            if (label) {
                label.textContent = 'Day block #' + (i + 1);
            }
        });
    }

    if (itineraryAddBtn && itineraryRepeater) {
        itineraryAddBtn.addEventListener('click', function () {
            var next = parseInt(itineraryRepeater.getAttribute('data-next-index') || '0', 10);
            itineraryRepeater.setAttribute('data-next-index', String(next + 1));
            var uid = 'itinerary-body-n' + Date.now();

            var wrapper = document.createElement('div');
            wrapper.className = 'itinerary-repeater-row border rounded p-3 mb-3 bg-white';
            wrapper.setAttribute('data-itinerary-row', '');
            wrapper.innerHTML =
                '<div class="d-flex justify-content-between align-items-center mb-2">' +
                    '<span class="fw-semibold text-muted small itinerary-row-label">Day block #' + (itineraryRowCount() + 1) + '</span>' +
                    '<button type="button" class="btn btn-sm btn-outline-danger itinerary-remove-btn" title="Remove">Remove</button>' +
                '</div>' +
                '<div class="row g-2">' +
                    '<div class="col-md-6 mb-2">' +
                        '<label class="form-label">Day / date line</label>' +
                        '<input type="text" name="itinerary_days[' + next + '][day_label]" class="form-control" maxlength="500" placeholder="e.g. Day 1 | 15th May 2026">' +
                    '</div>' +
                    '<div class="col-md-6 mb-2">' +
                        '<label class="form-label">Title</label>' +
                        '<input type="text" name="itinerary_days[' + next + '][title]" class="form-control" maxlength="500" placeholder="e.g. City highlights">' +
                    '</div>' +
                '</div>' +
                '<div class="mb-0">' +
                    '<label class="form-label">Details</label>' +
                    '<textarea id="' + uid + '" name="itinerary_days[' + next + '][body]" class="form-control js-tinymce-itinerary-day" rows="6"></textarea>' +
                '</div>';

            itineraryRepeater.appendChild(wrapper);
            renumberItineraryLabels();
            refreshItineraryRemoveButtons();
            var ta = document.getElementById(uid);
            if (ta) {
                initItineraryDayEditor(ta);
            }
        });

        itineraryRepeater.addEventListener('click', function (e) {
            if (!e.target.classList.contains('itinerary-remove-btn')) {
                return;
            }
            var row = e.target.closest('[data-itinerary-row]');
            if (!row || itineraryRowCount() < 2) {
                return;
            }
            var ta = row.querySelector('textarea.js-tinymce-itinerary-day');
            if (ta && ta.id && tinymce.get(ta.id)) {
                tinymce.get(ta.id).remove();
            }
            row.remove();
            renumberItineraryLabels();
            refreshItineraryRemoveButtons();
        });
    }

    var faqRepeater = document.getElementById('faq-repeater');
    var addBtn = document.getElementById('faq-add-more');

    function faqRowCount() {
        return faqRepeater ? faqRepeater.querySelectorAll('[data-faq-row]').length : 0;
    }

    function refreshFaqRemoveButtons() {
        var n = faqRowCount();
        faqRepeater.querySelectorAll('.faq-remove-btn').forEach(function (btn) {
            btn.style.display = n > 1 ? '' : 'none';
        });
    }

    if (addBtn && faqRepeater) {
        addBtn.addEventListener('click', function () {
            var next = parseInt(faqRepeater.getAttribute('data-next-index') || '0', 10);
            faqRepeater.setAttribute('data-next-index', String(next + 1));

            var wrapper = document.createElement('div');
            wrapper.className = 'faq-repeater-row border rounded p-3 mb-3 bg-white';
            wrapper.setAttribute('data-faq-row', '');
            wrapper.innerHTML =
                '<div class="d-flex justify-content-between align-items-center mb-2">' +
                    '<span class="fw-semibold text-muted small">FAQ #' + (faqRowCount() + 1) + '</span>' +
                    '<button type="button" class="btn btn-sm btn-outline-danger faq-remove-btn" title="Remove">Remove</button>' +
                '</div>' +
                '<div class="mb-2">' +
                    '<label class="form-label">Question</label>' +
                    '<input type="text" name="faq[' + next + '][question]" class="form-control" maxlength="2000" placeholder="e.g. What is included?">' +
                '</div>' +
                '<div class="mb-0">' +
                    '<label class="form-label">Answer</label>' +
                    '<textarea name="faq[' + next + '][answer]" class="form-control" rows="5" placeholder="Plain text answer"></textarea>' +
                '</div>';

            faqRepeater.appendChild(wrapper);
            renumberFaqLabels();
            refreshFaqRemoveButtons();
        });

        function renumberFaqLabels() {
            faqRepeater.querySelectorAll('[data-faq-row]').forEach(function (r, i) {
                var label = r.querySelector('.fw-semibold');
                if (label) label.textContent = 'FAQ #' + (i + 1);
            });
        }

        faqRepeater.addEventListener('click', function (e) {
            if (!e.target.classList.contains('faq-remove-btn')) return;
            var row = e.target.closest('[data-faq-row]');
            if (!row || faqRowCount() < 2) return;
            row.remove();
            renumberFaqLabels();
            refreshFaqRemoveButtons();
        });
    }

    var galleryKeepEl = document.getElementById('tour-gallery-keep');
    if (galleryKeepEl) {
        galleryKeepEl.addEventListener('click', function (e) {
            if (!e.target.classList.contains('gallery-remove-btn')) {
                return;
            }
            var item = e.target.closest('[data-gallery-item]');
            if (item) {
                item.remove();
            }
        });
    }

    var form = document.getElementById('tour-admin-form');
    if (form) {
        form.addEventListener('submit', function () {
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }
        });
    }
})();
</script>
@endpush
