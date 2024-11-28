<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AbonnementActif extends Model
{

    use HasFactory;

    protected $fillable = [
        'abonnement_id',
        'user_id',
        'start_date',
        'end_date',
        'is_active',
    ];

     /**
     * Relation avec Abonnement (un abonnement actif appartient à un abonnement)
     */
    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }

    /**
     * Relation avec User (un abonnement actif appartient à un utilisateur)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
