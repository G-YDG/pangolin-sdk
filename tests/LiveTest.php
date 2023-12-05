<?php

class LiveTest extends AbstractTest
{
    public function test_search()
    {
        $response = $this->getApp()->live->search();
        $this->assertIsSuccessResponse($response);
    }

    public function test_link()
    {
        $lives = $this->getApp()->live->search();
        $this->assertIsSuccessResponse($lives);

        $response = $this->getApp()->live->link([
            'author_openid' => $lives['data']['live_infos'][0]['author_openid'],
            'live_ext' => $lives['data']['live_infos'][0]['ext'],
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
