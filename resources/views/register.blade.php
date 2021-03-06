@extends('layouts.guest')

@section('title', 'TuttoF1 | Registrati')

@section('script')
<script src='{{ asset("js/signup.js") }}' defer></script>
@endsection


@section('content')
<section>
      <div>
        <h1>Registrati</h1>
        <h2>Inserisci le tue credenziali</h2>        

      <form name='login' method='post' autocomplete="off" action="{{ route('register')}}">
        @csrf
        <div class="name">
            <div><label for='name'>Nome</label></div>
            <div><input type='text' placeholder="Inserire lettere" name='name' value='{{ old("name") }}'></div>
            <span>Nome non valido</span> 
        </div>
        <div class="surname">
        <div><label for='surname'>Cognome</label></div>
            <div><input type='text' placeholder="Inserire lettere" name='surname' value='{{ old("surname") }}'>  </div>
            <span>Cognome non valido</span>
          </div>
        <div class="username">
            <div><label for='username'>Nome utente</label></div>
            <div><input type='text' placeholder="Max 15 caratteri" name='username' value='{{ old("username") }}'></div>
            <span>Nome utente non disponibile</span>
        </div>
        <div class="email">
        <div><label for='email'>Email</label></div>
            <div><input type='text' placeholder="example@email.com" name='email' value='{{ old("email") }}'></div>
            <span>Indirizzo email non valido</span>
         </div>
        <div class="password">
            <div><label for='password'>Password</label></div>
            <div><input type='password' placeholder="Min 8 caratteri" name='password' ></div>
            <span>Inserisci almeno 8 caratteri</span>
        </div>
        <div class="confirm_password">
            <div><label for='confirm_password'>Ripeti la Password</label><div>
            <div><input type='password' placeholder="Min 8 caratteri" name='confirm_password'></div>
            <span>Le password non coincidono</span>
        </div>
        <div class="allow">
            <div><input type='checkbox' name='allow' value="1"></div>
            <div><label for='allow'>Acconsento al furto dei dati personali</label></div>
        </div>
        <div>
            <input type='submit' value="Iscriviti" {{--disabled--}}>
        </div>
    </form>
    <div class="signup">Hai gi?? un account? <a  href='{{ url("login") }}'>Login</a>
</section>
@endsection