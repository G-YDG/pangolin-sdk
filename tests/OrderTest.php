<?php

class OrderTest extends AbstractTest
{
    public function test_search()
    {
        $response = $this->getApp()->order->search([
            'start_time' => time() - 60,
            'end_time' => time(),
            'order_type' => 1
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
