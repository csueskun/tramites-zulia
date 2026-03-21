<div class="carga-archivo-govco actived-events-govco mb-4" id="container_file_{{ $name }}">
    <div class="loader-carga-archivo-govco">
        <div class="all-input-carga-archivo-govco">
            <input {{ $required ? 'required' : '' }} type="file" name="file_{{ $name }}" id="file_{{ $name }}"
                class="input-carga-archivo-govco active" data-error="0" data-action="{{ $name }}FileUpload"
                data-action-delete="{{ $name }}DeleteFile"/>
            <label for="{{ $name }}" class="label-carga-archivo-govco">{{ $descripcion }}</label>
            <label for="{{ $name }}" class="container-input-carga-archivo-govco">
                <span class="button-file-carga-archivo-govco">Seleccionar
                    archivo</span>
                <span class="file-name-carga-archivo-govco">Sin archivo
                    seleccionado</span>
            </label>
            <span class="text-validation-carga-archivo-govco">
                Tipo de archivo: <strong>{{ $type }}</strong>. Peso máximo: {{ $max }} MB
            </span>
        </div>
        <div class="load-button-carga-archivo-govco" style="display: none;">
            <div class="load-carga-archivo-govco">
                <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;"
                    role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
            <button id="file_{{ $name }}_load" class="button-loader-carga-archivo-govco" disabled>
                Cargar archivo
            </button>
        </div>
    </div>
    <div class="container-detail-carga-archivo-govco">
        <span id="file_{{ $name }}_error" class="alert-carga-archivo-govco visually-hidden"></span>
        <div class="attached-files-carga-archivo-govco"></div>
    </div>

</div>
<script>
    function {{ $name }}FileUpload(inputFiles) {
        return new Promise(function (resolve, reject) {
            if (true) {
                fileData['{{ $name }}'] = inputFiles;
                const filesLoadedSuccesfully = inputFiles;
                resolve(filesLoadedSuccesfully);
            } else {
                reject('Ocurrió un error al cargar los archivos.');
            }
        });
    }

    function {{ $name }}DeleteFile() {
        fileData['{{ $name }}'] = [];
        preValidateFileForm(form)
    }

</script>
