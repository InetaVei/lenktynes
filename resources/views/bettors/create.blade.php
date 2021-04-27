@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new bettor:</div>
                    <div class="card-body">
                        <form action="{{ route('bettors.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name: </label>
                                <input type="text" name="bettor_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Surname: </label>
                                <input type="text" name="bettor_surname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bet: </label>
                                <input type="number" name="bet" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Horse: </label>
                                <select name="horse_id" id="" class="form-control">
                                    <option value="" selected disabled>Choose horse</option>
                                    @foreach ($horses as $horse)
                                        <option value="{{ $horse->id }}">{{ $horse->horse_name }}</option>
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
