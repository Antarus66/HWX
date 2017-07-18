@extends('cars.base')

@section('title', $model)

@section('content')
    <div class="row">
        <div class="col-md-12 main">
            <div class="card mb-3">
                <div class="card-block">
                    <h4 class="card-title">{{ $model }}</h4>
                    <p class="card-text">{{ $year }}</p>
                    <p class="card-text">{{ $registration_number }}</p>
                    <p class="card-text">{{ $color }}</p>
                    <p class="card-text">{{ $price }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Todo: make buttons --}}
    <a href="{{ route('car-edit', ['id' => $id]) }}">Edit</a>

    <form action="{{ route('car-destroy', ['id' => $id]) }}" method="POST">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button class="delete-button">Delete</button>
    </form>
@endsection