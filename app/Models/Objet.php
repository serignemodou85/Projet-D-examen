<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objet extends Model
{
    use HasFactory;
    protected $table = 'objet'; // Remplacez par le nom correct


    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'titre_anonce',
        'description',
        'id_utilisateur',
        'id_sous_categorie',
        'id_categorie',
        'lieu_perte',
        'date_perte',
        'statut',
        'photo',
    ];

    // Définir la relation avec le modèle Utilisateur
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


}
