<?php

use Ydg\PangolinSdk\Pangolin;

class LifeTest extends AbstractTest
{
    public function test_product_search()
    {
        $response = $this->getLifeApp()->life->product_search([
            'cursor' => 0,
            'count' => 20,
            'sort_by' => 1,
            'order_by' => 1,
            'city_code' => '120000',
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_product_detail()
    {
        $response = $this->getLifeApp()->life->product_search([
            'cursor' => 0,
            'count' => 1,
            'sort_by' => 1,
            'order_by' => 1,
            'city_code' => '120000',
        ]);
        $this->assertIsSuccessResponse($response);

        $productDetail = $this->getLifeApp()->life->product_detail([
            'product_id_list' => [$response['data']['product_list'][0]['id']]
        ]);
        $this->assertIsSuccessResponse($productDetail);
    }

    public function test_product_link()
    {
        $response = $this->getLifeApp()->life->product_search([
            'cursor' => 0,
            'count' => 1,
            'sort_by' => 1,
            'order_by' => 1,
            'city_code' => '120000',
        ]);
        $this->assertIsSuccessResponse($response);

        $productLink = $this->getLifeApp()->life->product_link([
            'command' => (string)$response['data']['product_list'][0]['id'],
            'command_external_info' => 'test_234979',
            'need_share_command' => true,
        ]);
        $this->assertIsSuccessResponse($productLink);

        $commandParse = $this->getLifeApp()->life->command_parse([
            'command' => $productLink['data']['command_share_info']['dy_share_command'],
        ]);
        $this->assertIsSuccessResponse($commandParse);
    }

    public function test_order_search()
    {
        $response = $this->getLifeApp()->life->order_search([
            'pay_time_begin' => time() - 600,
            'pay_time_end' => time(),
            'cursor' => '',
            'count' => 1,
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
