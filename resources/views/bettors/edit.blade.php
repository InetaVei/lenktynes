@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Change bettor info</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bettors.update', $bettor->id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label>Name: </label>
                                <input type="text" name="bettor_name" class="form-control" value="{{ $bettor->bettor_name }}">
                            </div>
                            <div class="form-group">
                                <label>Surname: </label>
                                <input type="text" name="bettor_surname" class="form-control" value="{{ $bettor->bettor_surname }}">
                            </div>
                            <div class="form-group">
                                <label>Bet: </label>
                                <input type="number" name="bet" class="form-control" value="{{ $bettor->bet }}">
                            </div>
                            <div class="form-group">
                                <label>Chose horse: </label>
                                <select name="horse_id" id="" class="form-control">
                                    <option value="" selected disabled>Choose horse</option>
                                    @foreach ($horses as $horse)
                                        <option value="{{ $horse->id }}" @if ($horse->id == $bettor->horse_id) selected="selected" @endif>
                                            {{ $horse->horse_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
