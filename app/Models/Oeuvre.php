<?php

namespace App\Models;
use App\Models\Artiste;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oeuvre extends Model
{
    use HasFactory;

    protected $primaryKey = 'idOeuvre';
    protected $fillable = [
        'nom',
        'description',
        'annee',
        'idArtistes',
        'idCategorie',];

    public function artiste()
    {
        return $this->belongsTo(Artiste::class, 'idArtistes', 'idArtistes'); // Spécifiez la clé étrangère personnalisée
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'idCategorie', 'idCategorie');
    }

}
