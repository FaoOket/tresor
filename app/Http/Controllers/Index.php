<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\Categorie;
use App\Models\Oeuvre;
use Illuminate\Http\Request;

class Index extends Controller
{

    public function afficher() //afficher le tableau
    {

        // Charger toutes les œuvres sans leurs relations artiste et catégorie
        $oeuvres = Oeuvre::all();

        // Renvoyer la vue 'index' en passant les œuvres comme données
        return view('index', compact('oeuvres'));
    }



    public function create() //liste déroulantes au niveau du formulaire
    {
        // Charger toutes les catégories et artistes
        $categories = Categorie::all();
        $artistes = Artiste::all();

        // Renvoyer la vue 'create' en passant les catégories et artistes comme données
        return view('create', compact('categories', 'artistes'));
    }

    public function store(Request $request) //Enregistrer dans la base de données
    {
        // Créer une nouvelle œuvre avec les données du formulaire
        $oeuvre = new Oeuvre([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'annee' => $request->input('annee'),
            'idCategorie' => $request->input('idCategorie'),
            'idArtistes' => $request->input('idArtistes'),
        ]);

        // Enregistrer l'œuvre dans la base de données
        $oeuvre->save();

        // Rediriger vers la page 'index' avec un message de succès
        return redirect('index')->with('success', "L'enregistrement a été effectué avec succès!");
    }

    public function supprimer($id) // Supprimer une oeuvre
    {
        // Recherchez l'oeuvre par son ID
        $oeuvre = Oeuvre::find($id);

        // Vérifiez si l'oeuvre existe
        if ($oeuvre) {
            // Supprimez l'oeuvre
            $oeuvre->delete();

            // Redirigez ensuite vers la page d'index ou une autre page appropriée
            return redirect('index')->with('success', "L'oeuvre a été supprimée avec succès.");
        } else {
            // Si l'oeuvre n'a pas été trouvée, redirigez avec un message d'erreur
            return redirect('index')->with('error', "L'oeuvre n'a pas pu être trouvée.");
        }
    }

     public function edit($id) // modifier une oeuvre
     {
         // Recherchez l'oeuvre par son ID
         $oeuvre = Oeuvre::find($id);
        //dd($oeuvre);
         // Vérifiez si l'oeuvre a été trouvée
         if (!$oeuvre) {
             // Si l'oeuvre n'a pas été trouvée, redirigez avec un message d'erreur
             return redirect('/index')->with('error', "L'oeuvre n'a pas pu être trouvée.");
         }
                 //dd($oeuvre);

    //     // Renvoyez la vue de modification avec les données de l'oeuvre
         return view('show', compact('oeuvre'));

     }

     public function update(Request $request, $id)
     {
         //Récupère l'oeuvre à modifier en fonction de l'ID
         $oeuvre = Oeuvre::find($id);

         //Mets à jour les données de l'oeuvre avec les données soumises dans le formulaire
         $oeuvre->nom = $request->input('nom');
         $oeuvre->description = $request->input('description');
         $oeuvre->annee = $request->input('annee');
         $oeuvre->idCategorie = $request->input('idCategorie');
         $oeuvre->idArtistes = $request->input('idArtistes');

    //     //Sauvegarde les modifications
         $oeuvre->save();

    //     //Redirige vers la page d'affichage des oeuvres après la mise à jour
         return redirect('index')->with('success', "L'oeuvre a été modifiée avec succès.");

     }

}
?>
