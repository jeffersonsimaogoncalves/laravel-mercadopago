<?php

declare(strict_types=1);

namespace WandesCardoso\MercadoPago;

use Saloon\Http\Connector;
use WandesCardoso\MercadoPago\Traits\MpRequest;

final class MercadoPago extends Connector
{
    use MpRequest;

    public function __construct(?string $access_token = null)
    {
        $this->withTokenAuth($access_token ?? config('mercadopago.access_token'));
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.mercadopago.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
