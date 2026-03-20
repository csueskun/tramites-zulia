<div class="filtro-container row">
    <div class="col-lg-12">
        <form class="form-inline" action="{{ $action }}" method="get">
            <div class="row">
                <div class="col-lg-3">
                    <label class="smaller" for="buscar_por">Filtrar por:</label>
                    <select class="form-select" name="filter_by" id="filter_by">
                        <option value="radicado" {{ request('filter_by') == 'radicado' ? 'selected' : '' }}>Radicado</option>
                        <option value="tramite" {{ request('filter_by') == 'tramite' ? 'selected' : '' }}>Trámite</option>
                        <option value="nombres" {{ request('filter_by') == 'nombres' ? 'selected' : '' }}>Nombres</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label class="smaller" for="search">Buscar:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Buscar" value="{{ request('search') }}">
                        <a href="{{ $action }}" class="btn btn-secondary">✖</a>
                        <button class="btn-govco fill-btn-govco" type="submit">Buscar</button>
                    </div>
                </div>
                <div class="col-lg-2">

                </div>
                <div class="col-lg-3">
                    <label class="smaller" for="buscar_por">Resultados pág:</label>
                    <select class="form-select" name="per_page" id="per_page" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>