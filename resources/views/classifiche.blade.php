@extends('layouts.feed')

@section('title', 'TuttoF1 | Classifiche')
    
@section('script')
<script src='{{ asset("js/classifiche.js") }}' defer></script>
@endsection
@section('style')
<link rel='stylesheet' href='{{ asset("css/classifiche.css") }}'>
@endsection




@section('content')

<section id="form" >
      <form class="invia_dati" >
        <select name ='tipo' id='tipo'>
          <option value='piloti'>Classifica Piloti</option>
          <option value='costruttori'>Classifica costruttori</option>
      </select>
      <br>
      <br>
      <span class="insert">Inserisci anno (dal 1950 al corrente)</span>
    <input type="text" id="pilota" placeholder="Inserisci anno">
    <input type="submit" id="search" value="Cerca">
    </form>
</section>

<section id="piloti" >
</section>
@endsection