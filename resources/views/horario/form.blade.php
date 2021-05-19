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
                            <label for="dia" class="col-md-4 col-form-label text-md-right">{{ __('Día de la semana') }}</label>

                            <div class="col-md-6">
                                <select name="dia_semana" value="{{ old("dia_semana") ?? $horario->dia_semana }}" class="form-control" required>
                                    <option value="">-- Selecciona un día --</option>
                                    <option value="lunes" {{ $horario->dia_semana === 'lunes' ? 'selected' : '' }}>Lunes</option>
                                    <option value="martes" {{ $horario->dia_semana === 'martes' ? 'selected' : '' }}>Martes</option>
                                    <option value="miercoles" {{ $horario->dia_semana === 'miercoles' ? 'selected' : '' }}>Miércoles</option>
                                    <option value="jueves" {{ $horario->dia_semana === 'jueves' ? 'selected' : '' }}>Jueves</option>
                                    <option value="viernes" {{ $horario->dia_semana === 'viernes' ? 'selected' : '' }}>Viernes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hora_enter" class="col-md-4 col-form-label text-md-right">{{ __('Hora entrada') }}</label>

                            <div class="col-md-6">
                                <select name="hora_enter" value="{{ old("hora_enter") ?? $horario->hora_enter }}" class="form-control" required>
                                    <option value="">-- Selecciona una hora --</option>
                                    <option value="0900" {{ $horario->hora_enter === '0900' ? 'selected' : '' }}>9:00</option>
                                    <option value="0930" {{ $horario->hora_enter === '0930' ? 'selected' : '' }}>9:30</option>
                                    <option value="1000" {{ $horario->hora_enter === '1000' ? 'selected' : '' }}>10:00</option>
                                    <option value="1030" {{ $horario->hora_enter === '1030' ? 'selected' : '' }}>10:30</option>
                                    <option value="1100" {{ $horario->hora_enter === '1100' ? 'selected' : '' }}>11:00</option>
                                    <option value="1130" {{ $horario->hora_enter === '1130' ? 'selected' : '' }}>11:30</option>
                                    <option value="1200" {{ $horario->hora_enter === '1200' ? 'selected' : '' }}>12:00</option>
                                    <option value="1230" {{ $horario->hora_enter === '1230' ? 'selected' : '' }}>12:30</option>
                                    <option value="1300" {{ $horario->hora_enter === '1300' ? 'selected' : '' }}>13:00</option>
                                    <option value="1330" {{ $horario->hora_enter === '1330' ? 'selected' : '' }}>13:30</option>
                                    <option value="1400" {{ $horario->hora_enter === '1400' ? 'selected' : '' }}>14:00</option>
                                    <option value="1430" {{ $horario->hora_enter === '1430' ? 'selected' : '' }}>14:30</option>
                                    <option value="1500" {{ $horario->hora_enter === '1500' ? 'selected' : '' }}>15:00</option>
                                    <option value="1530" {{ $horario->hora_enter === '1530' ? 'selected' : '' }}>15:30</option>
                                    <option value="1600" {{ $horario->hora_enter === '1600' ? 'selected' : '' }}>16:00</option>
                                    <option value="1630" {{ $horario->hora_enter === '1630' ? 'selected' : '' }}>16:30</option>
                                    <option value="1700" {{ $horario->hora_enter === '1700' ? 'selected' : '' }}>17:00</option>
                                    <option value="1730" {{ $horario->hora_enter === '1730' ? 'selected' : '' }}>17:30</option>
                                    <option value="1800" {{ $horario->hora_enter === '1800' ? 'selected' : '' }}>18:00</option>
                                    <option value="1830" {{ $horario->hora_enter === '1830' ? 'selected' : '' }}>18:30</option>
                                    <option value="1900" {{ $horario->hora_enter === '1900' ? 'selected' : '' }}>19:00</option>
                                    <option value="1930" {{ $horario->hora_enter === '1930' ? 'selected' : '' }}>19:30</option>
                                    <option value="2000" {{ $horario->hora_enter === '2000' ? 'selected' : '' }}>20:00</option>
                                    <option value="2030" {{ $horario->hora_enter === '2030' ? 'selected' : '' }}>20:30</option>
                                    <option value="2100" {{ $horario->hora_enter === '2100' ? 'selected' : '' }}>21:00</option>
                                    <option value="2130" {{ $horario->hora_enter === '2130' ? 'selected' : '' }}>21:30</option>
                                    <option value="2200" {{ $horario->hora_enter === '2200' ? 'selected' : '' }}>22:00</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hora_exit" class="col-md-4 col-form-label text-md-right">{{ __('Hora entrada') }}</label>

                            <div class="col-md-6">
                                <select name="hora_exit" value="{{ old("hora_exit") ?? $horario->hora_exit }}" class="form-control" required>
                                    <option value="">-- Selecciona una hora --</option>
                                    <option value="0900" {{ $horario->hora_exit === '0900' ? 'selected' : '' }}>9:00</option>
                                    <option value="0930" {{ $horario->hora_exit === '0930' ? 'selected' : '' }}>9:30</option>
                                    <option value="1000" {{ $horario->hora_exit === '1000' ? 'selected' : '' }}>10:00</option>
                                    <option value="1030" {{ $horario->hora_exit === '1030' ? 'selected' : '' }}>10:30</option>
                                    <option value="1100" {{ $horario->hora_exit === '1100' ? 'selected' : '' }}>11:00</option>
                                    <option value="1130" {{ $horario->hora_exit === '1130' ? 'selected' : '' }}>11:30</option>
                                    <option value="1200" {{ $horario->hora_exit === '1200' ? 'selected' : '' }}>12:00</option>
                                    <option value="1230" {{ $horario->hora_exit === '1230' ? 'selected' : '' }}>12:30</option>
                                    <option value="1300" {{ $horario->hora_exit === '1300' ? 'selected' : '' }}>13:00</option>
                                    <option value="1330" {{ $horario->hora_exit === '1330' ? 'selected' : '' }}>13:30</option>
                                    <option value="1400" {{ $horario->hora_exit === '1400' ? 'selected' : '' }}>14:00</option>
                                    <option value="1430" {{ $horario->hora_exit === '1430' ? 'selected' : '' }}>14:30</option>
                                    <option value="1500" {{ $horario->hora_exit === '1500' ? 'selected' : '' }}>15:00</option>
                                    <option value="1530" {{ $horario->hora_exit === '1530' ? 'selected' : '' }}>15:30</option>
                                    <option value="1600" {{ $horario->hora_exit === '1600' ? 'selected' : '' }}>16:00</option>
                                    <option value="1630" {{ $horario->hora_exit === '1630' ? 'selected' : '' }}>16:30</option>
                                    <option value="1700" {{ $horario->hora_exit === '1700' ? 'selected' : '' }}>17:00</option>
                                    <option value="1730" {{ $horario->hora_exit === '1730' ? 'selected' : '' }}>17:30</option>
                                    <option value="1800" {{ $horario->hora_exit === '1800' ? 'selected' : '' }}>18:00</option>
                                    <option value="1830" {{ $horario->hora_exit === '1830' ? 'selected' : '' }}>18:30</option>
                                    <option value="1900" {{ $horario->hora_exit === '1900' ? 'selected' : '' }}>19:00</option>
                                    <option value="1930" {{ $horario->hora_exit === '1930' ? 'selected' : '' }}>19:30</option>
                                    <option value="2000" {{ $horario->hora_exit === '2000' ? 'selected' : '' }}>20:00</option>
                                    <option value="2030" {{ $horario->hora_exit === '2030' ? 'selected' : '' }}>20:30</option>
                                    <option value="2100" {{ $horario->hora_exit === '2100' ? 'selected' : '' }}>21:00</option>
                                    <option value="2130" {{ $horario->hora_exit === '2130' ? 'selected' : '' }}>21:30</option>
                                    <option value="2200" {{ $horario->hora_exit === '2200' ? 'selected' : '' }}>22:00</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @php
                                        echo $icono
                                    @endphp
                                    {{ $textButton }}
                                </button>
                                <button type="button" onclick="window.location='{{ url('horario') }}'" class="btn btn-secondary" class="btn btn-primary">
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