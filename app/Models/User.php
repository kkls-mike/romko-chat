<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAvatarAttribute(): string
    {
        return url("/storage/users-avatar/{$this->attributes['avatar']}");
    }

    public function setAvatarAttribute(UploadedFile|null|string $ava): void
    {

        if (!($ava instanceof UploadedFile)) {
            return;
        }
        $filename = "{$this->attributes['email']}." . $ava->guessClientExtension();

        $ava->move(storage_path('app/public/users-avatar/'), $filename);
        $this->attributes['avatar'] = $filename;
    }
}
