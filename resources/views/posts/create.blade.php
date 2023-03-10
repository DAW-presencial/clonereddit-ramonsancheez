<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulario CREATE POST</title>
</head>
    <body>

    <form action="{{route('posts.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">@lang('Title')</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="extract">{{ __('Extract') }}</label>
            <input type="text" class="form-control" id="extract" name="extract" value="{{ old('extract') }}" required>
        </div>
        <div class="form-group">
            <label for="content">@lang('Content')</label>
            <textarea class="form-control" id="content" name="content" required>{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="expirable">{{ __('Expirable') }}</label>
            <input type="checkbox" class="form-control" id="expirable" name="expirable" {{ old('expirable') ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label for="caducable">@lang('Caducable')</label>
            <input type="checkbox" class="form-control" id="caducable" name="caducable" {{ old('caducable') ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label for="comentable">{{ __('Comentable') }}</label>
            <input type="checkbox" class="form-control" id="comentable" name="comentable" {{ old('comentable') ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label for="access">@lang('Access')</label>
            <select class="form-control" id="access" name="access">
                <option value="public" {{ old('access') == 'public' ? 'selected' : '' }}>{{ __('posts.public') }}
                <option value="public">@lang('Public')</option>
                <option value="private">@lang('Private')</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    
    </body>
</html>