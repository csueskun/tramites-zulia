# Radicación de Ventanilla — Internal Integration Notes

This document consolidates the provider documentation captured in [`api_swagger.html`](./api_swagger.html) and the endpoint details supplied for this integration.

The provider is SIEPDOC's Radicación de Ventanilla API. The service implementation is [`RadicacionVentanillaService`](../../images/php/laravel/app/Services/RadicacionVentanillaService.php).

## Security and configuration

Credentials must remain outside tracked source files. The Laravel service reads these values from the `radicacion_ventanilla` configuration section:

| Configuration value | Environment variable |
|---|---|
| API base URL | `RADICACION_VENTANILLA_BASE_URL` |
| Provider username | `RADICACION_VENTANILLA_USERNAME` |
| Provider password | `RADICACION_VENTANILLA_PASSWORD` |
| Application code | `RADICACION_VENTANILLA_APPLICATION` |
| Operator | `RADICACION_VENTANILLA_OPERATOR` |

The QA credentials are kept in the local development material under `dev/radicado_api/creds.txt`; that file must not be copied into PHP classes, documentation, or committed environment templates.

All JSON requests use `Content-Type: application/json` and request JSON responses. File endpoints use `multipart/form-data` as documented by the provider.

## Common provider response conventions

Most endpoints return a wrapper similar to:

```json
{
  "vo": {},
  "mensaje": ""
}
```

Transport-level non-2xx responses are treated as failures by the Laravel HTTP client. Provider business failures may still be returned with HTTP 200 and must be interpreted from the response fields:

- `vo.estado`: processing result, such as `Proceso exitoso`, `Ocurrió un Problema`, or `Advertencia`.
- `vo.mensaje`: human-readable provider message.
- `vo.radicado`: generated or associated radicado number.
- `vo.fecha`: provider registration timestamp.
- `vo.datosdocumento`: document metadata returned by document endpoints.
- `mensaje`: top-level provider message.

## 1. Radicar

### Endpoint

`POST /api/radicacion/radicar`

Creates a new radicado from citizen and source-document information. The generated `vo.radicado` is the identifier used by subsequent operations.

### Request body

| Parameter | Type | Required | Description / validation |
|---|---:|:---:|---|
| `usuario` | String | Yes | Entity-assigned authentication user. Supplied by configuration. |
| `password` | String | Yes | Entity-assigned password. Supplied by configuration. |
| `aplicativo` | String | Yes | Authorized client application code. Supplied by configuration. |
| `operador` | String | Yes | Person or process sending the request. Supplied by configuration. |
| `referencia` | String | Yes | Consumer-defined unique transaction identifier. |
| `tipoDocumentoCiudadano` | Numeric | Yes | Non-negative citizen document type; must exist in the entity table. |
| `documentoCiudadano` | String | Yes | Citizen identifier; maximum 20 characters. |
| `nombre` | String | Yes | Citizen first name; maximum 350 characters. |
| `apellido1` | String | No | First surname; maximum 350 characters. |
| `apellido2` | String | No | Second surname; maximum 350 characters. |
| `direccion` | String | No | Residence address; maximum 350 characters. |
| `telefono` | String | No | Contact telephone; maximum 50 characters. |
| `email` | String | Yes | Contact email; maximum 250 characters. Use `sin@sin.com` when unavailable. |
| `codigoContinenteCiudadano` | Numeric | Yes | Non-negative continent code; entity table validation. |
| `codigoPaisCiudadano` | Numeric | Yes | Non-negative country code; entity table validation. |
| `codigoDepartamentoCiudadano` | Numeric | Yes | Non-negative department code; entity table validation. |
| `codigoMunicipioCiudadano` | Numeric/String | Yes | Non-negative municipality code; entity table validation. |
| `tipoRadicado` | Numeric | Yes | Radicado type; non-negative and entity table validation. |
| `fechaDocumento` | Date | Yes | Source document date in `AAAA-MM-DD` format. |
| `numeroReferenciaxOficio` | String | No | External document or office reference; maximum 50 characters. |
| `asunto` | String | No | Radicado subject; maximum 5000 characters. |
| `requiereRespuesta` | Boolean | Conditional | Required for incoming radicados. |
| `medioRecepcion` | Numeric | Yes | Communication receipt method; entity table validation. |
| `tipoDocumentoRadicado` | Numeric | Yes | Document type; entity table validation. |
| `cantidadFolios` | Numeric | No | Non-negative folio count; default `0`. |
| `conCopiaA` | String | No | Copy recipients; maximum 150 characters. |
| `descripAnexo` | String | No | Description of accompanying annexes; maximum 100 characters. |
| `tiempoParaRespuesta` | Numeric | Conditional | Required for incoming radicados and must be non-negative. |
| `usuarioDestino` | String | No | Destination user or dependency. |
| `antecedente` | Numeric/String/null | No | Previous radicado associated with the same file. Non-negative when present. |
| `envioCorreoCiudadano` | Boolean | No | Whether SIEPDOC sends the standard radication notification. |
| `enviarCorreoCertificado` | Boolean | No | Whether SIEPDOC also sends a certified receipt email. |

The service's generic [`radicar()`](../../images/php/laravel/app/Services/RadicacionVentanillaService.php) method returns the complete provider response.

### Opening and closing workflow

Use the explicit service methods for the two application-level radication phases:

- [`openRadicado()`](../../images/php/laravel/app/Services/RadicacionVentanillaService.php): forces `tipoRadicado = 1` and `antecedente = null`; returns the generated radicado string from `vo.radicado` or throws.
- [`closeRadicado()`](../../images/php/laravel/app/Services/RadicacionVentanillaService.php): forces `tipoRadicado = 2` and sets `antecedente` to the opening radicado; returns the closing radicado string from `vo.radicado` or throws.

The opening response must be retained before creating the closing radicado.

### Response example

```json
{
  "vo": {
    "estado": "Proceso exitoso",
    "mensaje": "Radicado creado correctamente",
    "radicado": "20269930000082",
    "fecha": "2026-07-15T10:32:00"
  },
  "mensaje": ""
}
```

## 2. Principal document

### Endpoint

`POST /api/radicacion/documento/principal`

Attaches one PDF to an existing radicado.

### Request

The request is `multipart/form-data`:

| Parameter | Type | Required | Description |
|---|---:|:---:|---|
| `usuario` | String | Yes | Configured provider username. |
| `password` | String | Yes | Configured provider password. |
| `aplicativo` | String | Yes | Configured application code. |
| `operador` | String | Yes | Configured operator. |
| `referencia` | String | Yes | Consumer-defined transaction identifier. |
| `radicado` | Numeric | Yes | Radicado returned by the Radicar service; non-negative. |
| `file` | File | Yes | Principal document. Only `.pdf` is accepted. |

The service method is:

```text
uploadDocumentoPrincipal(referencia, radicado, filePath): array
```

The local filesystem path is read and attached as the multipart field `file`; the file is not base64-encoded.

### Response handling

The provider returns `vo.datosdocumento`, for example:

```json
[
  {
    "codigo": "0000",
    "nombre": "documento_principal.pdf"
  }
]
```

The service returns only `vo.datosdocumento`. It throws when that property is missing or is not an array.

## 3. Annex documents

### Endpoint

`POST /api/radicacion/documento/anexos`

Attaches one or more documents to an existing radicado.

### Request

The request is `multipart/form-data`:

| Parameter | Type | Required | Description |
|---|---:|:---:|---|
| `usuario` | String | Yes | Configured provider username. |
| `password` | String | Yes | Configured provider password. |
| `aplicativo` | String | Yes | Configured application code. |
| `operador` | String | Yes | Configured operator. |
| `referencia` | String | Yes | Consumer-defined transaction identifier. |
| `radicado` | Numeric | Yes | Radicado receiving the annexes; non-negative. |
| `files` | File[] | Yes | One or more files; extensions must be enabled by the entity. |

The service method is:

```text
uploadAnexos(referencia, radicado, filePaths): array
```

Each local filesystem path is read and attached as a repeated multipart field named `files`.

### Response handling

The service returns only the provider's `vo.datosdocumento` array, for example:

```json
[
  { "codigo": "0001", "nombre": "cedula.pdf" },
  { "codigo": "0002", "nombre": "soporte.jpg" }
]
```

It throws when the property is missing or malformed.

## 4. Consultar radicado

### Endpoint

`POST /api/radicacion/consultar/radicado`

The JSON body contains:

| Parameter | Required | Description |
|---|:---:|---|
| `usuario` | Yes | Configured provider username. |
| `password` | Yes | Configured provider password. |
| `aplicativo` | Yes | Configured application code. |
| `operador` | Yes | Configured operator. |
| `referencia` | Yes | Transaction reference. |
| `radicado` | Yes | Radicado to consult. |

Service method: `consultarRadicado(referencia, radicado)`.

The complete decoded response is returned because this endpoint has a provider-specific response wrapper.

## 5. Cambio de estado

### Endpoint

`POST /api/radicacion/registro/estado`

The JSON body contains:

| Parameter | Required | Description |
|---|:---:|---|
| `usuario` | Yes | Configured provider username. |
| `password` | Yes | Configured provider password. |
| `aplicativo` | Yes | Configured application code. |
| `operador` | Yes | Configured operator. |
| `referencia` | Yes | Transaction reference. |
| `radicado` | Yes | Radicado to update. |
| `estado` | Yes | New state name. Must be enabled for the radicado type. |

Service method: `cambiarEstado(referencia, radicado, estado)`.

The complete response is returned, including `isValid`, `resultCode`, `warnings`, `errors`, and `resultData.data`. The service does not maintain a local state-name list; the entity's provider response is authoritative.

## Excluded endpoint

`POST /api/radicacion/documento/plantilla` is documented by the provider but is intentionally excluded from the current service implementation.

## Operational notes

1. Obtain the entity's official lookup tables before sending table-controlled codes.
2. Obtain the entity's valid state names before calling `cambiarEstado`.
3. Persist the opening `vo.radicado` before performing closing, document, consultation, or state-change operations.
4. Use a unique `referencia` for every transaction and endpoint call to support tracing.
5. Never log passwords or raw multipart file contents.
