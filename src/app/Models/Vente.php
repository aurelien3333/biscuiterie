<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $biscuit_id
 * @property int $lieu_vente_id
 * @property int $qte
 * @property Carbon $date_vente
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Biscuit $biscuit
 * @property LieuVente $lieuVente
 */

class Vente extends Model
{
    protected $table = 'ventes';

    protected $fillable = [
        'biscuit_id',
        'lieu_vente_id',
        'qte',
        'date_vente',
    ];

    public function biscuit()
    {
        return $this->belongsTo(Biscuit::class);
    }

public function lieuVente()
    {
        return $this->belongsTo(LieuVente::class);
    }

}
