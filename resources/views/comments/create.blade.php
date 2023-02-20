<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulario CREATE COMMENT</title>
</head>
    <body>

    <form action="{{route('comment.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">@lang('Name')</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="body">@lang('Body')</label>
            <input type="text" class="form-control" id="body" name="body" value="{{ old('body') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    
    </body>
</html>