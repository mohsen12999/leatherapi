<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class butcher extends Model
{
    /** @use HasFactory<\Database\Factories\ButcherFactory> */
    use HasFactory, softDeletes;

    protected $fillable = [
        'name'
    ];

    public function leathers()
    {
        return $this->hasMany(Leather::class);
    }
}
