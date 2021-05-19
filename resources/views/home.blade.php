@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div>
        <div>
            @php
            $esConductor = DB::table('usuarios')->where('id',auth()->user()->id)->value('conductor');
            @endphp
            @if ($esConductor === 0)
            @foreach ($usuarios as $usuario)
            @if ($usuario->conductor === 1 && $usuario->id != Auth::id())
            <div id="tarjetahome" class="card mb-5">
                <img class="card-img-top" src="{{ asset('images/cocheEjemplo.jpg') }}" alt="Card image cap">
                <div class="card-body pb-0">
                    <h4 class="card-title"><strong>{{ $usuario->nombre . " " . $usuario->apellidos}}</strong></h4>
                    @foreach ($institutos as $instituto)
                    @if ($instituto->id === $usuario->instituto_id)
                    <h5 class="card-title">{{ $instituto->nombre }}</h5>
                    @endif
                    @endforeach
                    <h6 class="font-weight-bold mt-4">{{ __('Horario') }}</h6>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="col">Día semana</th>
                                <th scope="col">Hora entrada</th>
                                <th scope="col">Hora salida</th>
                            </tr>
                            @foreach ($horarios as $horario)
                            @if ($horario->id_usuario === $usuario->id)
                            @php
                            $horaEnter = substr_replace($horario->hora_enter, ":", 2, 0);
                            $horaExit = substr_replace($horario->hora_exit, ":", 2, 0);
                            @endphp
                            <tr>
                                <td>{{ $horario->dia_semana }}</td>
                                <td>{{ $horaEnter }}</td>
                                <td>{{ $horaExit }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="list-group list-group-flush">
                    <li id="listaTarjetaHome" class="list-group-item"><strong>Email: </strong> {{ $usuario->mail }}</li>
                    <li id="listaTarjetaHome" class="list-group-item"><strong>Localidad: </strong>
                        {{ $usuario->localidad }}</li>
                    @foreach ($coches as $coche)
                    @foreach ($conductores as $conductor)
                    @if ($coche->matricula === $conductor->matricula && $conductor->id_usuario === $usuario->id)
                    <li id="listaTarjetaHome" class="list-group-item"><strong>Coche: </strong>
                        {{ $coche->marca . " " . $coche->modelo }} /
                        <strong>Plazas: </strong> {{ $coche->plazas }}</li>
                    @endif
                    @endforeach
                    @endforeach
                </ul>
                <div class="card-body d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"
                        onclick="window.location='{{ url('notify/' . $usuario->id) }}'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                        </svg>
                        {{ __('Contactar') }}
                    </button>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            @if ($esConductor === 1)
            @foreach ($usuarios as $usuario)
            @if ($usuario->conductor === 0 && $usuario->id != Auth::id())
            <div id="tarjetahome" class="card mb-5">
                <div class="card-body pb-0">
                    <h4 class="card-title"><strong>{{ $usuario->nombre . " " . $usuario->apellidos}}</strong></h4>
                    @foreach ($institutos as $instituto)
                    @if ($instituto->id === $usuario->instituto_id)
                    <h5 class="card-title">{{ $instituto->nombre }}</h5>
                    @endif
                    @endforeach
                    <h6 class="font-weight-bold mt-4">{{ __('Horario') }}</h6>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="col">Día semana</th>
                                <th scope="col">Hora entrada</th>
                                <th scope="col">Hora salida</th>
                            </tr>
                            @foreach ($horarios as $horario)
                            @if ($horario->id_usuario === $usuario->id)
                            @php
                            $horaEnter = substr_replace($horario->hora_enter, ":", 2, 0);
                            $horaExit = substr_replace($horario->hora_exit, ":", 2, 0);
                            @endphp
                            <tr>
                                <td>{{ $horario->dia_semana }}</td>
                                <td>{{ $horaEnter }}</td>
                                <td>{{ $horaExit }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="list-group list-group-flush">
                    <li id="listaTarjetaHome" class="list-group-item"><strong>Email: </strong> {{ $usuario->mail }}</li>
                    <li id="listaTarjetaHome" class="list-group-item"><strong>Localidad: </strong>
                        {{ $usuario->localidad }}</li>
                    <li id="listaTarjetaHome" class="list-group-item"><strong>Descripción: </strong>
                        {{ $usuario->descripcion }}</li>
                </ul>
                <div class="card-body d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"
                        onclick="window.location='{{ url('notify/' . $usuario->id) }}'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                        </svg>
                        {{ __('Contactar') }}
                    </button>
                </div>
            </div>
            @endif
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection