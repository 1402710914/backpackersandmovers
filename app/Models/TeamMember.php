<?php

namespace App\Models;

use App\Support\HtmlImageUrls;
use App\Support\PublicStorage;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name', 'slug', 'role', 'bio', 'photo', 'email', 'social_links',
        'sort_order', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'social_links' => 'array',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Bio HTML (rich text) with img src rewritten for the current app base.
     */
    public function htmlBioWithFixedImages(): string
    {
        return HtmlImageUrls::fixImgSrcsInHtml((string) ($this->bio ?? ''));
    }

    public function profilePhotoUrl(): string
    {
        if (filled($this->photo)) {
            return PublicStorage::diskUrl($this->photo)
                ?? asset('assets/img/home-2/team/01.jpg');
        }

        return asset('assets/img/home-2/team/01.jpg');
    }

    /**
     * Card image on listings: uploaded photo or rotating theme placeholder by row index.
     */
    public function listingPhotoUrl(int $ordinalZeroBased = 0): string
    {
        if (filled($this->photo)) {
            return PublicStorage::diskUrl($this->photo)
                ?? asset('assets/img/home-2/team/01.jpg');
        }
        $n = str_pad((string) (($ordinalZeroBased % 4) + 1), 2, '0', STR_PAD_LEFT);

        return asset('assets/img/home-2/team/'.$n.'.jpg');
    }
}
