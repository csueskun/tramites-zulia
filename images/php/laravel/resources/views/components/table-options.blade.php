<div class="filtro-container row mb-4">
    <div class="col-lg-12">
        <form class="form-inline" action="{{ $action }}" method="get">
            <div class="row">
                <div class="col-lg-6">
                    <label class="smaller" for="search">Filtrar:</label>
                    <div class="govco-search-basic">
                        <div class="container-govco d-flex" id="containter-default">
                            <input name="buscar" value="{{ request('buscar') }}" type="text" class="input-search-basic-govco" id="input-basic" placeholder="Filtrar" aria-label="Filtrar" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            <button onclick="window.location.href='{{ $action }}'" class="btn-clean-basic-govco me-2" type="button" id="btn-clean-basic" aria-label="Limpiar"><span class="govco-svg govco-times"></span></button>
                            <div class="line-basic-govco"></div>
                            <button class="btn-search-basic-govco" type="submit"><span class="govco-svg govco-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="smaller" for="buscar_por">Filtrar por:</label>
                    <select class="form-select" name="filter_by" id="filter_by">
                        <option value="radicado" {{ request('filter_by') == 'radicado' ? 'selected' : '' }}>Radicado</option>
                        <option value="tramite" {{ request('filter_by') == 'tramite' ? 'selected' : '' }}>Trámite</option>
                        <option value="nombres" {{ request('filter_by') == 'nombres' ? 'selected' : '' }}>Nombres</option>
                    </select>
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
<script src="{{ asset('assets/transversal/buscador.js') }}"></script>