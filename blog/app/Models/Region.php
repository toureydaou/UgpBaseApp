<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['nom'];

    public function district() {
        return $this->hasMany(District::class, 'numRegion');
    }
}
