<?php

namespace App\Models;

use App\Support\HtmlImageUrls;
use App\Support\PublicStorage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    protected $fillable = [
        'category_id', 'destination_id', 'title', 'slug', 'excerpt', 'description',
        'about', 'itinerary', 'attractions', 'offers', 'faq',
        'price', 'duration_days', 'group_size', 'featured_image', 'gallery_images',
        'is_featured', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'gallery_images' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Stored paths relative to the public disk (e.g. tours/foo.jpg).
     *
     * @return list<string>
     */
    public function galleryImagePaths(): array
    {
        $raw = $this->gallery_images;
        if (! is_array($raw)) {
            return [];
        }
        $out = [];
        foreach ($raw as $p) {
            if (! is_string($p)) {
                continue;
            }
            $p = trim($p);
            if ($p === '' || str_contains($p, '..') || ! str_starts_with($p, 'tours/')) {
                continue;
            }
            $out[] = $p;
        }

        return array_values(array_unique($out));
    }

    public function hasGallerySection(): bool
    {
        return count($this->galleryImagePaths()) > 0;
    }

    public function featuredImageUrl(): string
    {
        if (filled($this->featured_image)) {
            return PublicStorage::diskUrl($this->featured_image)
                ?? asset('assets/img/inner-page/tour-details/details-1.jpg');
        }

        return asset('assets/img/inner-page/tour-details/details-1.jpg');
    }

    public function galleryImageUrl(string $path): string
    {
        return PublicStorage::diskUrl($path) ?? asset('assets/img/inner-page/tour-details/details-1.jpg');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * FAQ entries stored as JSON: [{"question":"...","answer":"..."}].
     *
     * @return list<array{question: string, answer: string}>
     */
    public function faqEntries(): array
    {
        $raw = $this->attributes['faq'] ?? null;
        if ($raw === null || $raw === '') {
            return [];
        }
        if (! is_string($raw)) {
            return [];
        }
        $decoded = json_decode($raw, true);
        if (! is_array($decoded)) {
            return [];
        }
        $out = [];
        foreach ($decoded as $row) {
            if (! is_array($row)) {
                continue;
            }
            $q = trim((string) ($row['question'] ?? ''));
            $a = trim((string) ($row['answer'] ?? ''));
            if ($q === '' && $a === '') {
                continue;
            }
            $out[] = ['question' => $q, 'answer' => $a];
        }

        return $out;
    }

    /** Plain-text FAQ answer for display (no rich HTML). */
    public function faqAnswerForDisplay(string $answer): string
    {
        $t = trim((string) $answer);
        if ($t === '') {
            return '';
        }
        $t = preg_replace('#</p>\s*<p[^>]*>#i', "\n\n", $t);
        $t = preg_replace('#<br\s*/?>#i', "\n", $t);
        $t = strip_tags($t);

        return nl2br(e($t));
    }

    public function htmlAbout(): string
    {
        return HtmlImageUrls::fixImgSrcsInHtml((string) ($this->about ?? ''));
    }

    public function htmlDescription(): string
    {
        return HtmlImageUrls::fixImgSrcsInHtml((string) ($this->description ?? ''));
    }

    /**
     * Itinerary stored as JSON: [{"day_label":"Day 1 | …","title":"…","body":"<ul>…"}].
     *
     * @return list<array{day_label: string, title: string, body: string}>
     */
    public function itineraryDays(): array
    {
        $raw = $this->attributes['itinerary'] ?? null;
        if ($raw === null || $raw === '') {
            return [];
        }
        if (! is_string($raw)) {
            return [];
        }
        $decoded = json_decode($raw, true);
        if (! is_array($decoded) || ! array_is_list($decoded)) {
            return [];
        }
        $out = [];
        foreach ($decoded as $row) {
            if (! is_array($row)) {
                continue;
            }
            $dayLabel = trim((string) ($row['day_label'] ?? ''));
            $title = trim((string) ($row['title'] ?? ''));
            $body = trim((string) ($row['body'] ?? ''));
            if ($dayLabel === '' && $title === '' && $body === '') {
                continue;
            }
            $out[] = ['day_label' => $dayLabel, 'title' => $title, 'body' => $body];
        }

        return $out;
    }

    public function itineraryDayBodyHtml(string $body): string
    {
        return HtmlImageUrls::fixImgSrcsInHtml($body);
    }

    /** Legacy single HTML block (tours saved before structured itinerary). */
    public function htmlLegacyItinerary(): string
    {
        return HtmlImageUrls::fixImgSrcsInHtml((string) ($this->attributes['itinerary'] ?? ''));
    }

    public function htmlItinerary(): string
    {
        return $this->htmlLegacyItinerary();
    }

    public function hasStructuredItinerary(): bool
    {
        return count($this->itineraryDays()) > 0;
    }

    public function legacyItineraryRawForAdmin(): ?string
    {
        $raw = (string) ($this->attributes['itinerary'] ?? '');
        if ($raw === '') {
            return null;
        }
        $decoded = json_decode($raw, true);
        if (is_array($decoded) && array_is_list($decoded)) {
            return null;
        }

        return $raw;
    }

    public function htmlAttractions(): string
    {
        return HtmlImageUrls::fixImgSrcsInHtml((string) ($this->attractions ?? ''));
    }

    public function htmlOffers(): string
    {
        return HtmlImageUrls::fixImgSrcsInHtml((string) ($this->offers ?? ''));
    }

    public function hasAboutSection(): bool
    {
        return $this->hasMeaningfulHtml($this->about);
    }

    public function hasDescriptionSection(): bool
    {
        return $this->hasMeaningfulHtml($this->description);
    }

    public function hasItinerarySection(): bool
    {
        if ($this->hasStructuredItinerary()) {
            return true;
        }
        $raw = trim((string) ($this->attributes['itinerary'] ?? ''));
        if ($raw === '') {
            return false;
        }
        $decoded = json_decode($raw, true);
        if (is_array($decoded) && array_is_list($decoded)) {
            return false;
        }

        return $this->hasMeaningfulHtml($raw);
    }

    public function hasAttractionsSection(): bool
    {
        return $this->hasMeaningfulHtml($this->attractions);
    }

    public function hasOffersSection(): bool
    {
        return $this->hasMeaningfulHtml($this->offers);
    }

    public function hasFaqSection(): bool
    {
        return count($this->faqEntries()) > 0;
    }

    private function hasMeaningfulHtml(?string $value): bool
    {
        return filled(trim(strip_tags((string) $value)));
    }

    public function formattedPrice(): string
    {
        $amount = (float) $this->price;
        if ($amount <= 0) {
            return 'On request';
        }

        if (floor($amount) === $amount) {
            return '₹'.number_format($amount, 0);
        }

        return '₹'.number_format($amount, 2);
    }

    public function priceNote(): string
    {
        if ($this->isStudentGroupTour()) {
            return 'Starting from · per member (class-wise rates on tour page)';
        }

        return 'Per person · taxes as applicable';
    }

    public function isEducationalOuting(): bool
    {
        return $this->isStudentGroupTour();
    }

    public function isStudentGroupTour(): bool
    {
        return in_array($this->category?->slug, [
            'educational-one-day-outing',
            'educational-field-visit',
            'agri-tourism',
            'one-day-trek',
            'one-night-camping',
        ], true);
    }

    public function listingTitle(int $max = 52): string
    {
        return Str::limit($this->title, $max);
    }

    public function listingImageUrl(): string
    {
        if (filled($this->featured_image)) {
            return PublicStorage::diskUrl($this->featured_image)
                ?? asset('assets/img/home-1/tour/tour-8.jpg');
        }

        $fallback = ['tour-8', 'tour-9', 'tour-10', 'tour-11', 'tour-12', 'tour-13', 'tour-14', 'tour-15'];
        $index = ($this->id ?? 0) % count($fallback);

        return asset('assets/img/home-1/tour/'.$fallback[$index].'.jpg');
    }

    public function pickupLocationsLabel(): string
    {
        return tour_pickup_locations_label();
    }
}
