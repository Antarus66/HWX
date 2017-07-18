@extends('cars.base')

@section('title', 'Edit')

@section('content')
    <form role="form" method="POST" action="{{ route('car-update', ['id' => $id]) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div>
            <label for="model" >Model</label>
            <input id="model" type="text" name="model" value="@if(old('model') == null){{ $model }}@else{{ old('model') }}@endif"  autofocus>

            @if ($errors->has('model'))
                <span>{{ $errors->first('model') }}</span>
            @endif
        </div>

        <div>
            <label for="registration_number" >registration_number</label>
            <input id="registration_number" type="text" name="registration_number" value="@if(old('registration_number') == null){{ $registration_number }}@else{{ old('registration_number') }}@endif"  autofocus>

            @if ($errors->has('registration_number'))
                <span>{{ $errors->first('registration_number') }}</span>
            @endif
        </div>

        <div>
            <label for="year" >year</label>
            <input id="year" type="text" name="year" value="@if(old('year') == null){{ $year }}@else{{ old('year') }}@endif"  autofocus>

            @if ($errors->has('year'))
                <span>{{ $errors->first('year') }}</span>
            @endif
        </div>

        <div>
            <label for="color" >color</label>
            <input id="color" type="text" name="color" value="@if(old('color') == null){{ $color }}@else{{ old('color') }}@endif"  autofocus>

            @if ($errors->has('color'))
                <span>{{ $errors->first('color') }}</span>
            @endif
        </div>

        <div>
            <label for="price" >price</label>
            <input id="price" type="text" name="price" value="@if(old('price') == null){{ $price }}@else{{ old('price') }}@endif"  autofocus>

            @if ($errors->has('price'))
                <span>{{ $errors->first('price') }}</span>
            @endif
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
@endsection