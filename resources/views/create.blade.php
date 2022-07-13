@extends('layouts.feed')

@section('title', 'TuttoF1 | Crea Post')

@section('script')
<script src='{{ asset("js/create.js") }}' defer></script>
@endsection
@section('style')
<link rel='stylesheet' href='{{ asset("css/create.css") }}'>
@endsection


@section('content')


<section class="crea_post">
    <div>
        <h3>Pubblica qualcosa</h3>
        <form class="invia_post " autocomplete="off" method='post' action="{{ url('create_post')}}">
            @csrf
            <textarea type="text" name="text"  id="text_area"></textarea>
            <span class="hidden" class="errore">Inserire un testo</span>
            <input type="submit" value="Crea post" id="submit" disabled>                
        </form>
    </div>
</section>

@endsection