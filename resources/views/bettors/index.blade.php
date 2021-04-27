@extends('layouts.app')
@section('content')
    <div class="card-body">
        <form class="form-inline" action="{{ route('bettors.index') }}" method="GET">
            <select name="horse_id" id="" class="form-control">
                <option value="" selected disabled>Choose horse for filtering:</option>
                @foreach ($horses as $horse)
                    <option value="{{ $horse->id }}" @if ($horse->id == app('request')->input('horse_id')) selected="selected" @endif>{{ $horse->horse_name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href={{ route('bettors.index') }}>Show all</a>
        </form>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="{{ route('bettors.index') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Search by name or surname">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-success" style="">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>


        <div class="card-body">
            @if ($errors->any())
                <h4 style="color: red">{{ $errors->first() }}</h4>
            @endif
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Bet</th>
                    <th>Horse</th>
                    <th>Actions</th>
                </tr>
                @foreach ($bettors as $bettor)
                    <tr>
                        <td>{{ $bettor->bettor_name }}</td>
                        <td>{{ $bettor->bettor_surname }}</td>
                        <td>{{ $bettor->bet }}</td>
                        <td>{{ $bettor->horse->horse_name }}</td>
                        <td>
                            <form action={{ route('bettors.destroy', $bettor->id) }} method="POST">
                                <a class="btn btn-success" href={{ route('bettors.edit', $bettor->id) }}>Edit</a>
                                @csrf @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div>
                <a href="{{ route('bettors.create') }}" class="btn btn-success">Add new</a>
            </div>
        </div>
    @endsection
