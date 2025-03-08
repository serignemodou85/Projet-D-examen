<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'administrateurs';
    protected $fillable =
    [
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'role'
    ];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

    public function sous_categorie()
    {
        return $this->belongsTo(SousCategorie::class, 'id_sous_categorie');
    }
    public function objets()
    {
        return $this->hasMany(Objet::class, 'id_sous_categorie');
    }
}

