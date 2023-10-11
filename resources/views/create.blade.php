@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<fieldset>
    <legend>Enregistrement</legend>
    <form action="{{ route('enregistrer') }}" method="post">

        @csrf

    <div>
        <label for="nom">Nom:</label>
        <input type="text" name="nom">
    </div>

    <div>
        <label for="description">Description:</label>
        <input type="text" name="description">
    </div>

    <div>
        <label for="annee">Annee:</label>
        <input type="text" name="annee">
    </div>
    <div>
        <label for="">Categorie:</label>
        <select name="idCategorie" id="">
            @foreach($categories as $categorie)
                <option value="{{ $categorie->idCategorie }}">{{$categorie->nomCategorie}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="">Artiste:</label>
        <select name="idArtistes" id="artiste_id">
            @foreach($artistes as $artiste)
                <option value="{{ $artiste->idArtistes }}">{{$artiste->nom}} {{$artiste->prenom}}</option>
            @endforeach
        </select>
    </div>

    <input type="submit" value="Enregistrer" name="enregistrer">

</form>

</fieldset>
