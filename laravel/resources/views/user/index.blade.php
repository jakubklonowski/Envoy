@extends('master')
@section('content')
<!-- user account page -->
<section>
    <h1>Welcome, {{ $login }}</h1>

    <section>
        <a href="/user/travels/search">Next destination</a><br><br>
        <a href="/user/travels/add">Add travel record</a><br><br>
        <a href="/user/travels">My travels</a><br><br>
        <a href="/user/options">Account options</a><br><br>
    </section>
</section>
@endsection
