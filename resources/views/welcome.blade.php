<!DOCTYPE html>
@extends("layouts.main")
@section('title', 'Pagina Inicial')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        @section('content')
            <p>This is from the welcome page</p>
        @endsection
    </body>
</html>
