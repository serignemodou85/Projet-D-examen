<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'utilisateurs';

    protected $fillable = [
        'prenom',
        'nom',
        'adresse',
        'telephone',
    ];


    public function objets()
    {
        return $this->hasMany(Objet::class, 'id_utilisateur');
    }
}
