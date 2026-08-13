<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use UnexpectedValueException;

class RadicacionVentanillaService
{
    private const RADICAR_ENDPOINT = '/api/radicacion/radicar';

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
        $response = Http::acceptJson()
            ->asJson()
            ->post($this->baseUrl . self::RADICAR_ENDPOINT, array_merge($payload, [
                'usuario' => $this->username,
                'password' => $this->password,
                'aplicativo' => $this->application,
                'operador' => $this->operator,
            ]));

        $response->throw();

        $data = $response->json();

        if (! is_array($data)) {
            throw new UnexpectedValueException('The radicar endpoint returned an invalid JSON response.');
        }

        return $data;
    }
}
