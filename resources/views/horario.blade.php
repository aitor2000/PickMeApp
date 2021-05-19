@extends('layouts.app')

@section('content')

<div class="container">
    <div class="justify-content-center">
        <div>
            <div id="navbar" class="card">
                <div class="card-body">
                    <h1>Horarios:</h1>
                    <div style="overflow-x: auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __("Día de la semana") }}</th>
                                    <th scope="col">{{ __("Hora entrada") }}</th>
                                    <th scope="col">{{ __("Hora salida") }}</th>
                                    <th scope="col">{{ __("Acciones") }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $contHorarios = 0;
                                $contHorariosPropios = 0;
                                @endphp
                                @forelse ($horarios as $horario)
                                @php
                                $contHorarios++;
                                $usuarios = DB::table('usuarios')->where('id',auth()->user()->id)->value('id');
                                $horaEnter = substr_replace($horario->hora_enter, ":", 2, 0);
                                $horaExit = substr_replace($horario->hora_exit, ":", 2, 0);
                                @endphp
                                @if ($horario->id_usuario == $usuarios)
                                @php
                                $contHorariosPropios++;
                                @endphp
    
                                <tr>
                                    <td scope="row"><?php echo $contHorarios ?></td>
                                    <td>{{ $horario->dia_semana }}</td>
                                    <td><?php echo $horaEnter ?></td>
                                    <td><?php echo $horaExit ?></td>
                                    <td>
                                        <a href="{{ route("horario.edit", ["horario" => $horario]) }}" class="text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </a> |
                                        <a href="#" class="text-danger"
                                            onclick="event.preventDefault(); document.getElementById('delete-project-{{ $horario->dia_semana }}-form').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path
                                                    d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
                                            </svg>
                                        </a>
                                        <form id="delete-project-{{ $horario->dia_semana }}-form"
                                            action="{{ route("horario.destroy", ["horario" => $horario]) }}" method="POST"
                                            class="hidden">
                                            @method("DELETE")
                                            @csrf
                                        </form>
    
                                    </td>
                                </tr>
                                @endif
    
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="text-center border px-4 py-3 rounded relative" role="alert">
                                            <p><strong class="font-bold">{{ __("No hay horarios para mostrar") }}</strong>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                                @php
                                if ($contHorariosPropios === 0 && $contHorarios != 0) {
    
                                @endphp
                                <tr>
                                    <td colspan="5">
                                        <div class="text-center border px-4 py-3 rounded relative" role="alert">
                                            <p><strong class="font-bold">{{ __("No hay horarios para mostrar") }}</strong>
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
                        <button type="button" onclick="window.location='{{ route("horario.create") }}'"
                            class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            {{ __('Añadir Horarios') }}
                        </button>
                        <button type="button" onclick="window.location='{{ url("home") }}'" class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
                            </svg>
                            {{ __('Atrás') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection