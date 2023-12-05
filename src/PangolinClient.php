<?php

declare(strict_types=1);

namespace Ydg\PangolinSdk;

use Ydg\FoudationSdk\FoundationApi;
use Ydg\FoudationSdk\Traits\HasAttributes;
use Ydg\PangolinSdk\Support\Utils;

class PangolinClient extends FoundationApi
{
    use HasAttributes;

    protected $baseUri = 'https://ecom.pangolin-sdk-toutiao.com';

    /**
     * @param string $method
     * @param array $data
     * @return array|null
     */
    public function post(string $method, array $data)
    {
        $appConfig = $this->toArray();

        $params = [
            'app_id' => $appConfig['app_key'] ?? '',
            'req_id' => Utils::genUUID($method),
            'data' => Utils::arrayToJson($data),
            'timestamp' => time(),
        ];

        $params['sign'] = $this->makeSign($params, $appConfig['app_secure'] ?? '');
        $params['sign_type'] = 'MD5';
        $params['version'] = '1';

        $response = $this->getHttpClient()->json($this->getUri($method), $params, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        return Utils::jsonResponseToArray($response);
    }

    public function makeSign(array $params, string $secure_key): string
    {
        return md5(("app_id=" . strval($params["app_id"]) . "&data=" . $params["data"] . "&req_id=" . $params["req_id"] . "&timestamp=" . $params["timestamp"] . $secure_key));
    }

    public function getUri(string $method): string
    {
        return $this->getBaseUri() . $method;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public function getHttpClientDefaultOptions(): array
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'verify' => false,
        ];
    }
}
