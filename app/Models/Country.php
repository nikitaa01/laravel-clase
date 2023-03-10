<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Taula associada al model
    protected $table = 'country'; // Per defecte, la taula es diu igual que el model en minúscules i plural

    // Primary key associada al model
    protected $primaryKey = 'Code'; // Per defecte, busca el nom "id"

    // Indicar si és autoincremental
    public $incrementing = false; // Per defecte és true

    // Tipus de primery key
    protected $keyType = 'string'; // Per defecte és integer

    // Indicar si té timestamps
    public $timestamps = false; // Per defecte és true, ja que espera que hi hagi els camps created_at i updated_at

    public function city()
    {
        return $this->hasMany(City::class, 'CountryCode', 'Code');
    }

    public function langs()
    {
        return $this->belongsToMany(Lang::class, 'countrylanguage', 'CountryCode', 'Language')
            ->withPivot(['isOfficial', 'Percentage']);
    }

    // Els atributs que volem que es puguin canviar en massa.
    protected $fillable = [
        'Name',
        'Continent',
        'Region',
        'SurfaceArea',
        'IndepYear',
        'Population',
        'LifeExpectancy',
        'GNP',
        'GNPOld',
        'LocalName',
        'GovernmentForm',
        'HeadOfState',
        'Capital',
        'Code2'
    ];
}
