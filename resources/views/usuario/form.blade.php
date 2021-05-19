<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="navbar" class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ $route }}">
                        @csrf
                        @isset($update)
                            @method("PUT")
                        @endisset
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $usuario->nombre}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') ?? $usuario->apellidos}}" required autocomplete="apellidos">

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Dirección Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('mail') ?? $usuario->mail }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="conductor" class="col-md-4 col-form-label text-md-right">{{ __('Eres conductor?') }}</label>

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-2 col-md-6" for="siConductor">{{ __('Si') }}</label>
                                    <input id="siConductor" type="radio" class="col-10 col-md-6 form-control @error('conductor') is-invalid @enderror" name="conductor" value="siConductor" {{ $usuario->conductor === 1 ? 'checked' : '' }}>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-2 col-md-6" for="noConductor">{{ __('No') }}</label>
                                    <input id="noConductor" type="radio" class="col-10 col-md-6 form-control @error('conductor') is-invalid @enderror" name="conductor" value="noConductor" {{ $usuario->conductor === 0 ? 'checked' : '' }}>
                                </div>
                                
                                @error('conductor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="5">{{ old('descripcion') ?? $usuario->descripcion }}</textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') ?? $usuario->direccion }}" required autocomplete="direccion">

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="localidad" class="col-md-4 col-form-label text-md-right">{{ __('Localidad') }}</label>

                            <div class="col-md-6">
                                <input id="localidad" type="text" class="form-control @error('localidad') is-invalid @enderror" name="localidad" value="{{ old('localidad') ?? $usuario->localidad }}" required autocomplete="localidad">

                                @error('localidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="instituto" class="col-md-4 col-form-label text-md-right">{{ __('Instituto') }}</label>

                            @php
                                $institutos = App\Models\Instituto::all();
                            @endphp
                            
                            <div class="col-md-6">
                                <select name="instituto_id" id="instituto_id" value="{{ old("instituto_id") ?? $usuario->instituto_id }}" class="form-control @error('instituto_id') is-invalid @enderror" required>
                                    <option value="">-- Escoge un instituto --</option>
                                    @foreach ($institutos as $instituto)
                                        <option value="{{ $instituto->id }}" {{ $usuario->instituto_id == $instituto->id ? 'selected' : '' }}>{{ $instituto->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('instituto_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @php
                                        echo $icono;
                                    @endphp
                                    {{ $textButton }}
                                </button>
                                <button type="button" onclick="window.location='{{ url("usuario") }}'" class="btn btn-secondary" class="btn btn-primary">
                                    @php
                                        echo $iconoAtras;
                                    @endphp
                                    {{ __('Atrás') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>