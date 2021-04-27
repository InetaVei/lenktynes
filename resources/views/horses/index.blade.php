@extends('layouts.app')
@section('content')

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                {{-- <p style="color: rgb(255, 30, 30)">{{ $error }}</p> --}}
            @endforeach
        </div>
    @endif

    @if (session('status_success'))
        <p style="color:green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red)"><b>{{ session('status_error') }}</b></p>
    @endif

    <div class="card-body">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Runs</th>
                <th>Wins</th>
                <th>About</th>
                <th>Actions</th>
            </tr>
            @foreach ($horses as $horse)
                <tr>
                    <td>{{ $horse->horse_name }}</td>
                    <td>{{ $horse->runs }}</td>
                    <td>{{ $horse->wins }}</td>
                    <td>{!! $horse->about !!}</td>
                    <td>
                        <form action={{ route('horse.destroy', $horse->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('horse.edit', $horse->id) }}>Update</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('horse.create') }}" class="btn btn-success">Add new</a>
        </div>
    </div>
@endsection
