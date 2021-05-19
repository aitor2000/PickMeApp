@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="navbar" class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h1>Tu perfil:</h1>
                            {{-- <img src="{{ asset('images/user.jpg') }}" alt="user" class="img-thumbnail"> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </div>
                        <div class="col-md-6 text-left">

                            <p>Nombre: {{ $usuarios[0]->nombre }}</p>
                            <p>Apellidos: {{ $usuarios[0]->apellidos }}</p>
                            <p>Correo: {{ $usuarios[0]->mail }} </p>
                            <p>Direccion: {{ $usuarios[0]->direccion }} </p>
                            <p>Localidad: {{ $usuarios[0]->localidad }}</p>
                            <p>Conductor: <?php if($usuarios[0]->conductor == 1){ echo "Si";}
                                                else{echo "No";}?> </p>
                            @if ($usuarios[0]->conductor == 0)
                            <p>Descripción: {{ $usuarios[0]->descripcion }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <button type="button"
                            onclick="window.location='{{ route('usuario.edit', ['usuario' => $usuarios[0]]) }}'"
                            class="col-md-3 btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                            {{ __('Editar') }}
                        </button>
                        <div class="col-md-2"></div>
                        <button type="button" onclick="window.location='{{ url('home') }}'"
                            class="col-md-3 btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
                            </svg>
                            {{ __('Atrás') }}
                        </button>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection