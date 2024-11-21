<div class="row mb-2">
    <div class="col-sm-8">
        <div class="row justify-content-start">
            <div class="col-sm-8">
                <form action="{{ $route }}">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Buscar por nombre"
                            value="{{ request()->search }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <a href="{{ $route }}" class="btn btn-dark">Restablecer</a>
            </div>
        </div>
    </div>
</div>
