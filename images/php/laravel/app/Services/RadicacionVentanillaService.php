<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use InvalidArgumentException;
use RuntimeException;
use UnexpectedValueException;

class RadicacionVentanillaService
{
    private const RADICAR_ENDPOINT = '/api/radicacion/radicar';

    private const PRINCIPAL_ENDPOINT = '/api/radicacion/documento/principal';

    private const ANEXOS_ENDPOINT = '/api/radicacion/documento/anexos';

    private const CONSULTAR_RADICADO_ENDPOINT = '/api/radicacion/consultar/radicado';

    private const CAMBIAR_ESTADO_ENDPOINT = '/api/radicacion/registro/estado';

    private string $baseUrl;

    private string $username;

    private string $password;

    private string $application;

    private string $operator;

    public function __construct(?array $config = null)
    {
        $config ??= config('services.radicacion_ventanilla', []);

        $this->baseUrl = rtrim((string) ($config['base_url'] ?? ''), '/');
        $this->username = (string) ($config['username'] ?? '');
        $this->password = (string) ($config['password'] ?? '');
        $this->application = (string) ($config['application'] ?? '');
        $this->operator = (string) ($config['operator'] ?? '');
    }

    /**
     * Generación de Radicado.
     *
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    public function radicar(array $payload): array
    {
        return $this->postJson(self::RADICAR_ENDPOINT, $payload);
    }

    /**
     * Crea el radicado de apertura del trámite.
     *
     * The opening radicado always uses type 1 and has no antecedent.
     *
     * @param  array<string, mixed>  $payload
     * @return string The generated opening radicado.
     */
    public function openRadicado(array $payload): string
    {
        $response = $this->radicar(array_merge($payload, [
            'tipoRadicado' => 1,
            'antecedente' => null,
        ]));

        return $this->extractRadicado($response, 'opening');
    }

    /**
     * Crea el radicado de cierre asociado al radicado de apertura.
     *
     * @param  string  $openRadicado  The value returned as vo.radicado by the opening request.
     * @param  array<string, mixed>  $payload
     * @return string The generated closing radicado.
     */
    public function closeRadicado(string $openRadicado, array $payload): string
    {
        $response = $this->radicar(array_merge($payload, [
            'tipoRadicado' => 2,
            'antecedente' => $openRadicado,
        ]));

        return $this->extractRadicado($response, 'closing');
    }

    /**
     * Consulta un radicado existente.
     *
     * @return array<string, mixed>
     */
    public function consultarRadicado(string $referencia, int|string $radicado): array
    {
        return $this->postJson(self::CONSULTAR_RADICADO_ENDPOINT, [
            'referencia' => $referencia,
            'radicado' => $radicado,
        ]);
    }

    /**
     * Actualiza el estado de un radicado.
     *
     * The provider validates whether the state is enabled for the radicado type.
     *
     * @return array<string, mixed>
     */
    public function cambiarEstado(string $referencia, string $radicado, string $estado): array
    {
        return $this->postJson(self::CAMBIAR_ESTADO_ENDPOINT, [
            'referencia' => $referencia,
            'radicado' => $radicado,
            'estado' => $estado,
        ]);
    }

    /**
     * Anexa el documento principal de un radicado.
     *
     * @return array<int, array{codigo: string, nombre: string}>
     */
    public function uploadDocumentoPrincipal(string $referencia, int|string $radicado, string $filePath): array
    {
        return $this->postMultipart(self::PRINCIPAL_ENDPOINT, [
            'referencia' => $referencia,
            'radicado' => $radicado,
        ], [$filePath], 'file');
    }

    /**
     * Anexa uno o más documentos a un radicado.
     *
     * @param  array<int, string>  $filePaths
     * @return array<int, array{codigo: string, nombre: string}>
     */
    public function uploadAnexos(string $referencia, int|string $radicado, array $filePaths): array
    {
        return $this->postMultipart(self::ANEXOS_ENDPOINT, [
            'referencia' => $referencia,
            'radicado' => $radicado,
        ], $filePaths, 'files');
    }

    /**
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    private function postJson(string $endpoint, array $payload): array
    {
        $response = Http::acceptJson()
            ->asJson()
            ->post($this->baseUrl . $endpoint, array_merge($payload, $this->credentials()));

        $response->throw();

        $data = $response->json();

        if (! is_array($data)) {
            throw new UnexpectedValueException("The {$endpoint} endpoint returned an invalid JSON response.");
        }

        return $data;
    }

    /**
     * @param  array<string, scalar|null>  $payload
     * @param  array<int, string>  $filePaths
     * @return array<int, array{codigo: string, nombre: string}>
     */
    private function postMultipart(string $endpoint, array $payload, array $filePaths, string $field): array
    {
        $request = Http::acceptJson();

        foreach ($filePaths as $filePath) {
            [$contents, $filename] = $this->readFile($filePath);
            $request = $request->attach($field, $contents, $filename);
        }

        $response = $request->post($this->baseUrl . $endpoint, array_merge($payload, $this->credentials()));
        $response->throw();

        $data = $response->json();

        if (! is_array($data)) {
            throw new UnexpectedValueException("The {$endpoint} endpoint returned an invalid JSON response.");
        }

        return $this->extractDatosDocumento($data, $endpoint);
    }

    /**
     * @return array{usuario: string, password: string, aplicativo: string, operador: string}
     */
    private function credentials(): array
    {
        return [
            'usuario' => $this->username,
            'password' => $this->password,
            'aplicativo' => $this->application,
            'operador' => $this->operator,
        ];
    }

    private function extractRadicado(array $response, string $operation): string
    {
        $vo = $response['vo'] ?? null;
        $radicado = is_array($vo) ? ($vo['radicado'] ?? null) : null;

        if ((! is_string($radicado) && ! is_int($radicado)) || trim((string) $radicado) === '') {
            $message = is_array($vo) ? ($vo['mensaje'] ?? null) : null;
            $message ??= $response['mensaje'] ?? 'No radicado was returned by the provider.';
            $message = is_scalar($message) ? (string) $message : 'No radicado was returned by the provider.';

            throw new RuntimeException("Unable to complete {$operation} radication: {$message}");
        }

        return (string) $radicado;
    }

    /**
     * @return array{0: string, 1: string}
     */
    private function readFile(string $filePath): array
    {
        if (! is_file($filePath) || ! is_readable($filePath)) {
            throw new InvalidArgumentException("The file '{$filePath}' does not exist or is not readable.");
        }

        $contents = file_get_contents($filePath);

        if ($contents === false) {
            throw new RuntimeException("The file '{$filePath}' could not be read.");
        }

        return [$contents, basename($filePath)];
    }

    /**
     * @return array<int, array{codigo: string, nombre: string}>
     */
    private function extractDatosDocumento(array $response, string $endpoint): array
    {
        $vo = $response['vo'] ?? null;
        $datosDocumento = is_array($vo) ? ($vo['datosdocumento'] ?? null) : null;

        if (! is_array($datosDocumento)) {
            $message = is_array($vo) ? ($vo['mensaje'] ?? null) : null;
            $message ??= $response['mensaje'] ?? 'No document data was returned by the provider.';
            $message = is_scalar($message) ? (string) $message : 'No document data was returned by the provider.';

            throw new RuntimeException("Unable to complete document upload for {$endpoint}: {$message}");
        }

        return $datosDocumento;
    }
}
