<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'numRegion'];

    public function region() {
        return $this->belongsTo(Region::class, 'numRegion');
    }

    public function site() {
        return $this->hasMany(Site::class, 'numSite');
    }
}
