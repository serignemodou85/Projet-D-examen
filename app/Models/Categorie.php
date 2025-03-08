<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nom'];

    public function sousCategories()
    {
        return $this->hasMany(SousCategorie::class, 'id_categorie');
    }
}
