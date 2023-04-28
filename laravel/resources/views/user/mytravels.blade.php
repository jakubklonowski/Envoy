@extends('master')
@section('content')
<!-- user travels page -->
<section>
    <br>
    <button><a href="/user/travels/add">Add travel record</a></button><br><br>
    <section>
        @if (count($travels) > 0) 
            <table>
                <tr>
                    <td>Destination</td>
                    <td>Country</td>
                    <td>Continent</td>
                    <td>Date</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            @foreach ($travels as $travel)
                <tr> 
                    <td>{{ $travel->destination }}</td>
                    <td>{{ $travel->country }}</td>
                    <td>{{ $travel->continent }}</td>
                    <td>{{ $travel->date }}</td>
                    <td><form action="" method="POST">
                        @method('put')
                        @csrf
                        <input hidden value="{{ $travel->id }}">
                        <button class="edit-btn">><a href="/user/travels/edit">Edit</button></a>
                    <form></td>
                    <td><form action="" method="POST">
                        @method('delete')
                        @csrf
                        <input hidden value="{{ $travel->id }}">
                        <button class="delete-btn"><a href="/user/travels/delete">X</a><button>
                    </form></td>
                </tr>
            @endforeach
            </table>
        @else
            <p>Your travels list is empty - fill it!</p>
            <br>
        @endif
    </section>
</section>
@endsection
