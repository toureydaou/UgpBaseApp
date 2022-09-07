<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescripteur extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom', 'sexe', 'telephone',  
                            'adresse', 'email', 'dateDebut', 
                            'dateFin', 'numSite', 'actif', 'avatar', 'numUser'
                            ];
    

    public function user(){
        return $this->hasOne(User::class, 'numUser');
    }

    public function site() {
        return $this->belongsTo(Site::class, 'numSite');
    }
}
