<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'countries';

    protected $fillable = [
        'country_code',
        'iso_3166_2',
        'iso_3166_3',
        'name',
        'region_code',
        'flag',
    ];

    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'like', '%' . $value . '%')->orWhere('country_code', $value);
    }
}
