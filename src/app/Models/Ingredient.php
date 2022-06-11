<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $unite
 * @property float $price_ht
 * @property float $tva
 * @property string $url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Fournisseur $fournisseurs
 */

class Ingredient extends Model
{
    protected $table = 'ingredients';

    protected $fillable = [
        'name',
        'description',
        'unite',
        'price_ht',
        'tva',
        'url',
    ];

    public function fournisseurs()
    {
        return $this->belongsToMany(Fournisseur::class);
    }
}
