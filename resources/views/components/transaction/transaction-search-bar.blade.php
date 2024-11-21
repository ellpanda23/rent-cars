<form action="{{  $route }}" method="GET" class="form-inline">
    <label for="keyword" class="sr-only"></label>
    <input type="text" name="keyword" class="form-control w-50 mr-3" id="keyword"
        placeholder="Buscar por nombre de cliente" value="{{ request()->keyword }}">
    <div class="form-group">
        <select name="status" class="form-control status-select2" style="width: 12em">
            <option></option>
            <option value='>' {{ request()->status == '>' ? 'selected' : '' }}>
                En progreso
            </option>
            <option value='<' {{ request()->status == '<' ? 'selected' : '' }}>
                Retrasado
            </option>
            <option value='COMPLETED' {{ request()->status == 'COMPLETED' ? 'selected' : '' }}>
                Terminado
            </option>
        </select>
    </div>
    <button class="btn btn-primary mx-2 ml-3" type="submit" id="button-addon2">{{ __('Buscar') }}</button>
    <a href="{{ $route }}" class="btn btn-dark d-inline-block" id="button-addon2">Restablecer</a>
</form>
