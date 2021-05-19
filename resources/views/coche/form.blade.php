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
                            <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" value="{{ old('marca') ?? $coche->marca}}" required autocomplete="marca" autofocus>

                                @error('marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="modelo" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="{{ old('modelo') ?? $coche->modelo}}" required autocomplete="modelo">

                                @error('modelo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="matricula" class="col-md-4 col-form-label text-md-right">{{ __('Matricula') }}</label>

                            <div class="col-md-6">
                                <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') ?? $coche->matricula}}" required autocomplete="matricula">

                                @error('matricula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                            <div class="col-md-6">
                                <select name="color" id="color" value="{{ old("color") ?? $coche->color }}" class="form-control @error('color') is-invalid @enderror" required>
                                    <option value="">-- Escoge un color --</option>
                                    <option value="Azul" {{ $coche->color === 'Azul' ? 'selected' : '' }}>Azul</option>
                                    <option value="Rojo" {{ $coche->color === 'Rojo' ? 'selected' : '' }}>Rojo</option>
                                    <option value="Verde" {{ $coche->color === 'Verde' ? 'selected' : '' }}>Verde</option>
                                    <option value="Blanco" {{ $coche->color === 'Blanco' ? 'selected' : '' }}>Blanco</option>
                                    <option value="Negro" {{ $coche->color === 'Negro' ? 'selected' : '' }}>Negro</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plazas" class="col-md-4 col-form-label text-md-right">{{ __('Plazas') }}</label>

                            <div class="col-md-6">
                                <select name="plazas" id="plazas" value="{{ old("plazas") ?? $coche->plazas }}" class="form-control @error('plazas') is-invalid @enderror" required>
                                    <option value="">-- Escoge plazas... --</option>
                                    <option value="1" {{ $coche->plazas === 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $coche->plazas === 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $coche->plazas === 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $coche->plazas === 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $coche->plazas === 5 ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ $coche->plazas === 6 ? 'selected' : '' }}>6</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @php
                                        echo $icono
                                    @endphp
                                    {{ __($textButton) }}
                                </button>
                                <button type="button" onclick="window.location='{{ url('coche') }}'" class="btn btn-secondary">
                                    @php
                                        echo $iconoAtras
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
