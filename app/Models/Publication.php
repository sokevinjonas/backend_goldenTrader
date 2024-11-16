<?php

namespace App\Models;

use App\Models\User;
use App\Models\PublicationVote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publication extends Model
{
    //
    protected $fillable = [
        'content',
        'images',
        'analyst_id', //provien de la migration user
    ];

    protected $casts = [
        'images' => 'array'
    ];

    /**
     * Get the user that owns the Publication
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'analyst_id');
    }

    public function votes()
    {
        return $this->hasMany(PublicationVote::class);
    }

    public function likesCount()
    {
        return $this->votes()->where('vote', 1)->count();
    }

    public function dislikesCount()
    {
        return $this->votes()->where('vote', -1)->count();
    }
}
