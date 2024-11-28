<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'prix',
        'type',
        'duration',
        'admin_id',
    ];

    /**
     * Relation avec AbonnementActif (un abonnement peut avoir plusieurs abonnements actifs)
     */
    public function abonnementsActifs()
    {
        return $this->hasMany(AbonnementActif::class);
    }

    /**
     * Relation avec Admin (chaque abonnement est créé par un admin)
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id'); // Spécifiez 'admin_id' comme clé étrangère
    }
}
