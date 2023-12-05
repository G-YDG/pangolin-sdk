<?php

declare(strict_types=1);

namespace Ydg\PangolinSdk\Support;

use Psr\Http\Message\ResponseInterface;

class Utils
{
    public static function genUUID(string $prefix = ''): string
    {
        return md5($prefix . uniqid() . random_bytes(8));
    }

    public static function arrayToJson(array $params): string
    {
        return json_encode($params, 320);
    }

    public static function jsonResponseToArray(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
