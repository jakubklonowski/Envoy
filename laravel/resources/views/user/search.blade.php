@extends('master')
@section('content')
<!-- travels search page -->
<section>
    <h1>Search for you next travel destination!</h1>

    <!-- searchbar -->
    <form action="/user/travels/search" method="POST">
        @csrf
        <label for="query">Search:</label><br>
        <input type="text" name="query" id="query"/><br>
        <button>Search</button>
    </form>

    <!-- results -->
    @if (isset($results))
        @if (count($results) < 1)
            <p>No results :&#40;</p><br>
        @else
            @foreach ($results as $result)
                <p> {{ $result->destination }} </p><br>
            @endforeach
        @endif
    @endif
</section>
@endsection
