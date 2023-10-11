<!-- Formulaire de modification (edit.blade.php) -->
<form id="formulaire-modification" style="display: none;" action="{{ route('mettreAJour', ['id' => $oeuvre->idOeuvre]) }}" method="post">
    @csrf
    @method('put')

    <!-- Champs du formulaire pour la modification d'une œuvre -->
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom" value="{{ $oeuvre->nom }}">
    <label for="description">Description:</label>
    <input type="text" name="description" id="description" value="{{ $oeuvre->description }}">
    <label for="annee">Annee:</label>
    <input type="text" name="annee" id="annee" value="{{ $oeuvre->annee }}">


    {{-- <select id="idCategorie" name="idCategorie">
        @foreach($categories as $categorie)
            <option value="{{ $categorie->idCategorie }}">{{$oeuvre->idCategorie == $categorie->idCategorie ? 'selected' : ''}}</option>
        @endforeach
    </select>
    <select id="idArtistes" name="idArtistes">
        @foreach($artistes as $artiste)
            <option value="{{ $artiste->idArtistes }}">{{$oeuvre->idArtistes == $artiste->idArtistes ? 'selected' : ''}}</option>
        @endforeach
    </select> --}}
    <!-- Bouton pour soumettre le formulaire de modification -->
    <button type="submit">Enregistrer les modifications</button>
</form>
