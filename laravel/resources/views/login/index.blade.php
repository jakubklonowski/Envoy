@extends('master')
@section('content')
<!-- login form -->
<section>
    <form action="/login" method="POST">
        @csrf

        <label>Login</label><br>
        <input type="text" name="login"/><br>
        
        <label>Password</label><br>
        <input type="password" name="password"/><br>

        <button>Login</button>
    </form>
</section><hr>

<!-- register form -->
<section>
    <form action="/register" method="POST">
        @csrf
        
        <label>Login</label><br>
        <input type="text" name="login"/><br>
        
        <label>Password</label><br>
        <input type="password" name="password0"/><br>

        <label>Repeat password</label><br>
        <input type="password" name="password1"/><br>

        <button>Register</button>
    </form>
</section>
@endsection
