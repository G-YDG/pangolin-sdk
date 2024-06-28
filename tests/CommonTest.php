<?php

class CommonTest extends AbstractTest
{
    public function test_command_parse()
    {
        $products = $this->getApp()->product->search();
        $this->assertIsSuccessResponse($products);

        $productLink = $this->getApp()->product->link([
            'product_url' => $products['data']['products'][0]['detail_url'],
            'product_ext' => $products['data']['products'][0]['ext'],
            'share_type' => [1, 2, 3]
        ]);
        $this->assertIsSuccessResponse($productLink);

        $response = $this->getApp()->common->command_parse(['command' => $productLink['data']['dy_password']]);
        $this->assertIsSuccessResponse($response);
    }

//    public function test_aggregate_h5()
//    {
//        $response = $this->getApp()->common->aggregate_h5([
//            'material_id' => '7215069233665802557',
//            'external_info' => 'test',
//        ]);
//        $this->assertIsSuccessResponse($response);
//    }

    public function test_reward_orders()
    {
        $response = $this->getApp()->common->reward_orders([
            'start_date' => date('Ymd', strtotime('-1 days')),
            'end_date' => date('Ymd'),
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_cpa_report()
    {
        $response = $this->getApp()->common->cpa_report([
            'Filters' => [
                'DateType' => [
                    'Value' => ['day']
                ],
                'StartDate' => [
                    'Value' => [date('Y-m-d', strtotime('-10 days'))]
                ],
                'EndDate' => [
                    'Value' => [date('Y-m-d')]
                ],
                'PidType' => [
                    'Value' => ["api_kol_pid", "api_agency_pid", "live_agency_pid"]
                ],
            ],
            'IsChart' => true,
            'Pagination' => [
                'Current' => 1,
                'PageSize' => 10,
            ],
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_gmv_report()
    {
        $response = $this->getApp()->common->gmv_report([
            'Filters' => [
                'DateType' => [
                    'Value' => ['day']
                ],
                'StartDate' => [
                    'Value' => [date('Y-m-d', strtotime('-10 days'))]
                ],
                'EndDate' => [
                    'Value' => [date('Y-m-d')]
                ],
                'PidType' => [
                    'Value' => ["api_kol_pid", "api_agency_pid", "live_agency_pid"]
                ],
            ],
            'IsChart' => true,
            'Pagination' => [
                'Current' => 1,
                'PageSize' => 10,
            ],
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
