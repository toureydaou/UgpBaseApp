<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'numDistrict'];

    public function district() {
        return $this->belongsTo(District::class, 'numDistrict');
    }

    public function prescripteur() {
        return $this->hasMany(Prescripteur::class, 'numSite');
    }
}
