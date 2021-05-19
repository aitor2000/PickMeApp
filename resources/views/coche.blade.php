@extends('layouts.app')

@section('content')

<div class="container">
    <div class="justify-content-center">
        <div>
            <div id="navbar" class="card">
                <div class="card-body">
                    <h1>Coches:</h1>
                    <div style="overflow-x: auto">
                        <table class="table" style="overflow-x: auto">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __("Marca") }}</th>
                                    <th scope="col">{{ __("Modelo") }}</th>
                                    <th scope="col">{{ __("Color") }}</th>
                                    <th scope="col">{{ __("Plazas") }}</th>
                                    <th scope="col">{{ __("Matrícula") }}</th>
                                    <th scope="col">{{ __("Acciones") }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $contCoches = 0;
                                $contCochesPropios = 0;
                                @endphp
                                @foreach ($coches as $coche)
                                @foreach ($conductores as $conductor)
                                @if ($coche->matricula === $conductor->matricula && $conductor->id_usuario === Auth::id())
                                @php
                                $contCoches++;
                                $contCochesPropios++;
                                @endphp
                                <tr>
                                    <td scope="row">
                                        <?php echo $contCoches ?>
                                    </td>
                                    <td>{{ $coche->marca }}</td>
                                    <td>{{ $coche->modelo }}</td>
                                    <td>{{ $coche->color }}</td>
                                    <td>{{ $coche->plazas }}</td>
                                    <td>{{ $coche->matricula }}</td>
                                    <td>
                                        <a href="{{ route("coche.edit", ["coche" => $coche]) }}" class="text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </a> |
                                        <a href="#" class="text-danger"
                                            onclick="event.preventDefault(); document.getElementById('delete-project-{{ $coche->matricula }}-form').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path
                                                    d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
                                            </svg>
                                        </a>
                                        <form id="delete-project-{{ $coche->matricula }}-form"
                                            action="{{ route("coche.destroy", ["coche" => $coche]) }}" method="POST"
                                            class="hidden">
                                            @method("DELETE")
                                            @csrf
                                        </form>
    
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach
                                @php
                                if ($contCochesPropios === 0 && $contCoches != 0) {
                                @endphp
                                <tr>
                                    <td colspan="7">
                                        <div class="text-center border px-4 py-3 rounded relative" role="alert">
                                            <p><strong class="font-bold">{{ __("No hay coches para mostrar") }}</strong>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                }
                                @endphp
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="text-center mt-2">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location='{{ route("coche.create") }}'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            {{ __("Añadir coche") }}
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="window.location='{{ url("home") }}'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
                            </svg>
                            {{ __("Atrás") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection