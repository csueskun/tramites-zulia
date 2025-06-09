<div class="container-carga-de-archivo-govco mb-4">
    <div class="loader-carga-de-archivo-govco">
        <div class="all-input-carga-de-archivo-govco">
            <input {{ $required ? 'required' : '' }} type="file" name="file_{{ $name }}" id="file_{{ $name }}"
                class="input-carga-de-archivo-govco active" data-error="0" data-action="{{ $name }}FileUpload"
                data-action-delete="{{ $name }}DeleteFile"/>
            <label for="{{ $name }}" class="label-carga-de-archivo-govco">{{ $descripcion }}</label>
            <label for="{{ $name }}" class="container-input-carga-de-archivo-govco">
                <span class="button-file-carga-de-archivo-govco">Seleccionar
                    archivo</span>
                <span class="file-name-carga-de-archivo-govco">Sin archivo
                    seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">
                Cualquier tipo de archivo. Peso máximo: {{ $max }} MB
            </span>
        </div>
        <div class="load-button-carga-de-archivo-govco" style="display: none;">
            <div class="load-carga-de-archivo-govco">
                <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;"
                    role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
            <button id="file_{{ $name }}_load" class="button-loader-carga-de-archivo-govco" disabled>
                Cargar archivo
            </button>
        </div>
    </div>
    <div class="container-detail-carga-de-archivo-govco">
        <span id="file_{{ $name }}_error" class="alert-carga-de-archivo-govco visually-hidden"></span>
        <div class="attached-files-carga-de-archivo-govco"></div>
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
