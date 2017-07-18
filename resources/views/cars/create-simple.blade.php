@extends('cars.base')

@section('title', 'Add a new car')

@section('content')
    <form role="form" method="POST" action="{{ route('car-update') }}">
        {{ csrf_field() }}

        <div>
            <label for="model" >Model</label>
            <input id="model" type="text" name="model" value="
                @isset(old('model'))
                    old('model')
                @else
                    {{ old('model') }}
            " required autofocus>

            @if ($errors->has('model'))
                <span>{{ $errors->first('model') }}</span>
            @endif
        </div>

        <div>
            <label for="description" >Description</label>
            <textarea id="description" type="text" name="description" required>{{ old('description') }}</textarea>

            @if ($errors->has('description'))
                <span>{{ $errors->first('description') }}</span>
            @endif
        </div>

        <div>
            <label for="photo" >Photo URl</label>
            <input id="photo" type="text" name="photo" value="{{ old('photo') }}" required>

            @if ($errors->has('photo'))
                <span>{{ $errors->first('photo') }}</span>
            @endif
        </div>

        <div>
            <label>
                <input type="checkbox" name="in_stock" {{ old('in_stock') ? 'checked' : '' }}> In stock
            </label>
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
@endsection