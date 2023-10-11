<table border="2">
    <tr>
        <th>OEUVRE</th>
        <th>AUTEUR</th>
        <th>ANNEE</th>
        <th>CATEGORIE</th>
        <th>ACTION</th>
    </tr>
    @foreach($oeuvres as $oeuvre) <!-- Boucle foreach pour chaque élément de $oeuvres -->
    <tr>
        <td>{{ $oeuvre->nom }}</td> <!-- Cellule de données avec le nom de l'œuvre -->
        <td>
            @if (!empty($oeuvre->artiste))
                {{ $oeuvre->artiste->prenom }} <!-- Prénom de l'artiste si présent -->
                {{ $oeuvre->artiste->nom }} <!-- Nom de l'artiste si présent -->
            @endif
        </td>
        <td>{{ $oeuvre->annee }}</td> <!-- Cellule de données avec l'année de l'œuvre -->
        <td>
            {{-- @if ($oeuvre->categorie) --}}
            {{ $oeuvre->categorie->nomCategorie }} <!-- Nom de la catégorie de l'œuvre -->
            {{-- @endif --}}
        </td>
        <td>
            {{-- <button class="btn-modifier" data-id="{{ $oeuvre->idOeuvre }}">Modifier</button> --}}
            <a href="{{ route('edit', ['id' => $oeuvre->idOeuvre])}}">Modifier</a> <!-- Lien "Modifier" -->
            </form>
            <form action="{{ route('supprimer', ['id' => $oeuvre->idOeuvre]) }}" method="post"> <!-- Formulaire pour supprimer l'œuvre -->
                @csrf <!-- Jeton CSRF pour sécuriser le formulaire -->
                @method('delete') <!-- Méthode HTTP DELETE -->
                <input type="submit" value="Supprimer" name="supprimer"> <!-- Bouton pour soumettre le formulaire de suppression -->
            </form>
        </td>
    </tr>
    @endforeach
</table>
