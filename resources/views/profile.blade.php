@extends('layouts.feed')

@section('title', 'TuttoF1 | Profile')
    
@section('style')
<link rel='stylesheet' href='{{ asset("css/profile.css") }}' >
@endsection


@section('content')
        
<main >
    <article class="profile">
        <div><span class='info'>Nome: </span>{{$user['name']}}</div>
        <div><span class='info'>Cognome: </span>{{$user['surname']}}</div>
        <div><span class='info'>E-mail: </span>{{$user['email']}}</div>
        <div><span class='info'>Username: </span>{{$user['username']}}</div>
        <div><span class='info'>Numero di post: </span>{{$user['nposts']}}</div>        
    </article>
</main >
@endsection


