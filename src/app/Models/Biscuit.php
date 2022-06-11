<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property int $qte
 * @property float $price_emballage
 * @property float $pourcentage_energie
 * @property float $price_vente
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Ingredient $ingredients
 *
 */

class Biscuit extends Model
{
    protected $table = 'biscuits';

    protected $fillable = [
        'name',
        'description',
        'image',
        'qte',
        'price_emballage',
        'pourcentage_energie',
        'price_vente',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function ventes()
    {
        return $this->belongsToMany(Vente::class, 'ventes');
    }


}
