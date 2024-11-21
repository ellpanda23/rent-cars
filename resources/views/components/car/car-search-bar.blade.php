<form action="{{  $route }}" method="GET" class="form-inline">
    <label for="keyword" class="sr-only"></label>
    <input type="text" name="keyword" class="form-control w-50 mr-3" id="keyword"
        placeholder="Buscar por nombre, año, número de placa" value="{{ request()->keyword }}">
    <div class="form-group">
        <select name="status" class="form-control status-select2" style="width: 12em">
            <option></option>
            <option value='AVAILABLE' {{ request()->status == 'AVAILABLE' ? 'selected' : '' }}>
                Disponible
            </option>
            <option value='NOT AVAILABLE' {{ request()->status == 'NOT AVAILABLE' ? 'selected' : '' }}>
                Alquilado
            </option>
        </select>
    </div>
    <button class="btn btn-primary mx-2 ml-3" type="submit" id="button-addon2">{{ __('Buscar') }}</button>
    @if ($type === 'index')
    <a href="{{ route('cars.index', ['status' => 'AVAILABLE']) }}" class="btn btn-dark d-inline-block"
        id="button-addon2">Restablecer</a>
    @else
    <a href="{{ route('cars.trash') }}" class="btn btn-dark d-inline-block" id="button-addon2">Restablecer</a>
    @endif
</form>
