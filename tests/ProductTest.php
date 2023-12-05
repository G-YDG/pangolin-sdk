<?php

class ProductTest extends AbstractTest
{
    public function test_search()
    {
        $response = $this->getApp()->product->search();
        $this->assertIsSuccessResponse($response);
    }

    public function test_link()
    {
        $products = $this->getApp()->product->search();
        $this->assertIsSuccessResponse($products);

        $response = $this->getApp()->product->link([
            'product_url' => $products['data']['products'][0]['detail_url'],
            'product_ext' => $products['data']['products'][0]['ext'],
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_detail()
    {
        $products = $this->getApp()->product->search();
        $this->assertIsSuccessResponse($products);

        $response = $this->getApp()->product->detail(['product_ids' => [$products['data']['products'][0]['product_id']]]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_category()
    {
        $response = $this->getApp()->product->category();
        $this->assertIsSuccessResponse($response);
    }
}
