<?php

namespace App\Models;
use App\Models\Publication;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'role',
        'avatar'
    ];

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class, 'analyst_id');
    }


     /**
     * Les utilisateurs qui suivent cet utilisateur.
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    /**
     * Les utilisateurs que cet utilisateur suit.
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }
    // Ces méthodes isFollowing et isFollowedBy
    // peuvent être utilisées pour vérifier si
    // un utilisateur suit un autre utilisateur ou est suivi par un autre.
    public function isFollowing($userId): bool
    {
        return $this->followings()->where('followed_id', $userId)->exists();
    }

    public function isFollowedBy($userId): bool
    {
        return $this->followers()->where('follower_id', $userId)->exists();
    }
    //

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // Retourner les informations que tu veux inclure dans le token
        return [
            'name' => $this->nom,
            'role' => $this->role,
            'email' => $this->email,
            'created_at' =>  $this->created_at
        ];
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
