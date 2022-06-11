<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Biscuit $biscuits
 **/
class LieuVente extends Model
{
    protected $table = 'lieu_vente';

    protected $fillable = [
        'name',
        'description',
    ];

    public function biscuits()
    {
        return $this->belongsToMany(Biscuit::class);
    }

    public function ventes()
    {
        return $this->belongsToMany(Vente::class);
    }
}
