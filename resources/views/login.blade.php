@extends('layouts.guest')

@section('title', 'TuttoF1 | Accedi')

@section('content')
<section>
      <div>
        <h1>Accedi</h1>
        <h2>Inserisci le tue credenziali</h2>
      </div>

      <form name='login' method='post' autocomplete="off" action="{{ url('login') }}">
        @csrf
        <div class="username">
        <div><label for='username'>Nome utente</label></div>
            <div><input type='text' name='username' placeholder="Inserire lettere e numeri" value="{{ old('username') }}"></div>
        </div>
        <div class="password">
        <div><label for='password'>Password</label></div>
            <div><input type='password' placeholder="Min. 8 caratteri" name='password' ></div>
        </div>
        <div class="remember">
            <div><input type='checkbox' name='remember' value="1" ></div>
            <div><label for='remember'>Ricorda l'accesso</label></div>
        </div>
        <div>
            <input type='submit' value="Accedi">
        </div>
    </form>
    <div class="signup">Non hai un account? <a href='{{ url("register") }}'>Iscriviti</a>
</section>   
@endsection