<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function alerts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserAlert::class);
    }

    public function avatarUrl(): string
    {
        $label = $this->name ?: Str::before($this->email, '@') ?: 'Admin';

        return 'https://ui-avatars.com/api/?'.http_build_query([
            'name' => $label,
            'background' => 'b8924a',
            'color' => 'ffffff',
            'size' => 128,
            'bold' => 'true',
        ]);
    }

    public function headerRoleLabel(): string
    {
        return $this->is_admin ? 'ADMIN' : strtoupper(Str::before($this->name ?? $this->email, ' '));
    }
}
