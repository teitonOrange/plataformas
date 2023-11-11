@extends('layouts.app')

@section('title')
    Buscar Reservas
@endsection
@section('content')
<body>
    <form class="mt-4" method="get" action="{{route('search.store')}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Ingresa el código de la reserva a buscar</label>
            <input type="text" class="form-control" id="searching"  placeholder="Ingrese el código" name="code">
        </div>
        <button name="button" id="buttonSearch" type="submit">Buscar</button>
        @if (session()-> has('errorBusqueda'))
            <p class="my-4 text-lg text-center px-4 py-3" style="background-color: #ff8a80">
                {{ session()->get('errorBusqueda') }}
            </p>
        @endif
    </form>
</body>
@endsection
