<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescripteur extends Model
{
    use HasFactory;
    
    protected $primary = 'id';
    protected $fillable = ['nom', 'prenom', 'sexe', 'telephone',  
                            'adresse', 'email', 'dateDebut', 
                            'dateFin', 'site', 'actif', 
                            'formation', 'profil', 'code', 'avatar'];
    

    public function user(){
        return $this->belongsTo(User::class);
    }
}
