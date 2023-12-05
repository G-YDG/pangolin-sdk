<?php

use PHPUnit\Framework\TestCase;
use Ydg\PangolinSdk\Pangolin;

abstract class AbstractTest extends TestCase
{
    protected static $app;

    public function getApp(): Pangolin
    {
        if (!(self::$app instanceof Pangolin)) {
            self::$app = new Pangolin($this->getConfig());
        }
        return self::$app;
    }

    public function getConfig(): array
    {
        return [
            'app_key' => getenv('APP_KEY'),
            'app_secure' => getenv('APP_SECURE'),
        ];
    }

    public function assertIsSuccessResponse($response)
    {
        $this->assertIsArray($response);
        $this->assertArrayHasKey('code', $response);
        $this->assertEquals(0, $response['code']);
    }
}
