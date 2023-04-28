@extends('master')
@section('content')
<!-- add travel informations form -->
<section>
    <form action="/user/travels/add" method="POST">
        @csrf

        <label for="dest">Destination</label><br>
        <select name="dest" id="dest">
            @foreach ($destinations as $dest)
                <option value="{{ $dest->id }}"> {{ $dest->destination }} </option>
            @endforeach
        </select><br>

        <label for="date">Date</label><br>
        <input type="date" name="date" id="date"/><br>

        <label for="active">Active journey?</label><br>
        <input type="checkbox" name="active" id="active"/><br>

        <button>Add</button>
    </form>
</section>
@endsection
