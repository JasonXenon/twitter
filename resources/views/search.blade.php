<h2>Résultats de la recherche pour "{{ $query }}" :</h2>

<h3>Tweets</h3>
<ul>
    @foreach ($tweets as $tweet)
        <li>{{ $tweet->text }}</li>
    @endforeach
</ul>

<h3>Utilisateurs</h3>
<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
</ul>

