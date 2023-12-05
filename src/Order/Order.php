<?php

declare(strict_types=1);

namespace Ydg\PangolinSdk\Order;

use Ydg\PangolinSdk\PangolinClient;

class Order extends PangolinClient
{
    /**
     * 订单接口
     * @param array $params
     * @return array|null
     * @example params['size'] [非必填]每页订单数目，取值区间： [1, 50]
     * @example params['cursor'] [非必填]下一页索引（第一页传"0"）
     * @example params['start_time'] [非必填]支付时间开始，最早支持90天前，格式：Y-m-d H:i:s
     * @example params['end_time'] [非必填]支付时间结束，格式：Y-m-d H:i:s
     * @example params['order_ids'] [非必填]订单号。多个订单号用英文,分隔，最多支持10个订单号
     * @example params['order_type'] [必填]| 1-商品分销订单，2-直播间分销订单，如果access_type选择2-SDK接入，则此时只能支持查询直播间分销的订单，order_type务必传2
     * @example params['time_type'] [必填]查询时间类型。pay: 支付时间（默认）; update：联盟侧更新时间，非订单状态更新时间
     * @example params['access_type'] [非必填]1-API接入方式，用于查询接入乘风计划cps-api的订单，2-SDK接入方式，用于查询接入闭环电商或内容直播中直播内流出cps直播间的订单，默认为1，建议不传，使用默认值即可
     */
    public function search(array $params)
    {
        $params['cursor'] = $params['cursor'] ?? '0';
        $params['size'] = $params['size'] ?? 50;
        return $this->post('/order/search', $params);
    }
}
