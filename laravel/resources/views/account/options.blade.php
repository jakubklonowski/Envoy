@extends('master')
@section('content')
<!-- delete account form -->
<section>
    <form action="/register" method="POST">
        @method('DELETE')
        @csrf

        <p>To delete your account type your password below</p><br>
        <p>This action is IRREVERSIBLE!</p><br>
        
        <label>Password</label><br>
        <input type="password" name="password"/><br>

        <button>Delete account</button>
    </form>
</section>
@endsection
