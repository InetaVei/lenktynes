@extends('layouts.app')
@section('content')

    {{-- Validation error, for invalid incoming data display logic --}}
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                {{-- <p style="color: red">{{ $error }}</p> --}}
            @endforeach
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create horse:</div>
                    <div class="card-body">
                        <form action="{{ route('horse.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name: </label>
                                @error('horse_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" name="horse_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Runs: </label>
                                @error('runs')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" name="runs" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Wins: </label>
                                @error('wins')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" name="wins" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>About: </label>
                                @error('about')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <textarea id="mce" name="about" rows=10 cols=100 class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
