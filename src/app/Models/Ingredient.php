<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $fournisseur_id
 * @property string $name
 * @property string $description
 * @property string $unite
 * @property float $price_ht
 * @property float $tva
 * @property float $cdt
 * @property string $url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Fournisseur $fournisseur
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
        'cdt',
        'fournisseur_id'
    ];

    public function biscuits()
    {
        return $this->belongsToMany(Biscuit::class);
    }

    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function getPriceTtcAttribute()
    {
        return round($this->price_ht * (1 + ($this->tva / 100)), 3) . ' €';
    }

    public function getPriceUniteTtcAttribute()
    {

        return round($this->price_ht * (1 + ($this->tva / 100)) / $this->cdt, 3) . ' €';
    }


    public function getConditionnementAttribute()
    {
        return $this->cdt . ' ' . $this->unite;
    }


}
