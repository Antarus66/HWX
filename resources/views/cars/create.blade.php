@extends('cars.base')

@section('title', 'New')

@section('content')
    <form role="form" method="POST" action="{{ route('car-store') }}">
        {{ csrf_field() }}

        <div>
            <label for="model" >Model</label>
            <input id="model" type="text" name="model" value="{{ old('model') }}"  autofocus>

            @if ($errors->has('model'))
                <span>{{ $errors->first('model') }}</span>
            @endif
        </div>

        <div>
            <label for="registration_number" >registration_number</label>
            <input id="registration_number" type="text" name="registration_number" value="{{ old('registration_number') }}"  autofocus>

            @if ($errors->has('registration_number'))
                <span>{{ $errors->first('registration_number') }}</span>
            @endif
        </div>

        <div>
            <label for="year" >year</label>
            <input id="year" type="text" name="year" value="{{ old('year') }}"  autofocus>

            @if ($errors->has('year'))
                <span>{{ $errors->first('year') }}</span>
            @endif
        </div>

        <div>
            <label for="color" >color</label>
            <input id="color" type="text" name="color" value="{{ old('color') }}"  autofocus>

            @if ($errors->has('color'))
                <span>{{ $errors->first('color') }}</span>
            @endif
        </div>

        <div>
            <label for="price" >price</label>
            <input id="price" type="text" name="price" value="{{ old('price') }}"  autofocus>

            @if ($errors->has('price'))
                <span>{{ $errors->first('price') }}</span>
            @endif
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
@endsection