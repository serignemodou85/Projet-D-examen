<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;
    protected $table = 'sous_categories';
    public $timestamps = false;

    protected $fillable = ['nom', 'id_categorie'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

    public function objets()
    {
        return $this->hasMany(Objet::class, 'id_sous_categorie');
    }
}

