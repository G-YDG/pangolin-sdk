<?php

declare(strict_types=1);

namespace Ydg\PangolinSdk\Life;

use Ydg\PangolinSdk\PangolinClient;

class Life extends PangolinClient
{
    /**
     * 商品列表接口
     * @param array $params
     * @return array|null
     * @example params['cursor'] [非必填]游标。注意：首次查询时传空，第二次查询传第一次查询返回值中的cursor
     * @example params['count'] [非必填]数量。默认为20，最大值为20。注意：response可能因为过滤等原因,返回数量小于count
     * @example params['sort_by'] [非必填]排序字段。默认：1，1: 距离、2: 销量、3: 价格、4: 佣金比率
     * @example params['order_by'] [非必填]排序方式。默认：1，1: 升序、2: 降序
     * @example params['city_code'] [非必填]城市码，参见https://bytedance.larkoffice.com/sheets/Vek1si8jghvHIxtIoiRcdZFCn3f。当传递了经纬度时，会依据经纬度查询所在城市。其它情况，请必需传递city_code，依据场景尽量传递到城市级别即可，例如：天津为120000
     * @example params['longitude'] [非必填]经度。WGS84坐标，参见https://tool.lu/coordinate。默认为北京市王府井，重要：一定需要WGS84坐标，且线上场景必需传递该参数。如果获取不到或者无法传递，请咨询运营或技术
     * @example params['latitude'] [非必填]纬度。WGS84坐标，参见https://tool.lu/coordinate。默认为北京市王府井，重要：一定需要WGS84坐标，且线上场景必需传递该参数。如果获取不到或者无法传递，请咨询运营或技术
     * @example params['distance_max'] [非必填]距离限制。示例：3000，表示经纬度为中心3000米内商品
     * @example params['category_id'] [非必填]类别信息。参见：https://bytedance.larkoffice.com/sheets/CIqdsr8mqh6Y7MtX8x6cJ9Nonxe
     * @example params['keyword'] [非必填]商品名称关键字
     */
    public function product_search(array $params = [])
    {
        return $this->post('/life/product/search', $params);
    }

    /**
     * 商品详情接口
     * @param array $params
     * @return array|null
     * @example params['product_id_list'] [必填]商品id列表
     */
    public function product_detail(array $params = [])
    {
        return $this->post('/life/product/detail', $params);
    }

    /**
     * 商品转链接口
     * @param array $params
     * @return array|null
     * @example params['command'] [必填]重要：目前支持商品ID、短链和口令的解析。短链和口令填写错误会导致解析不到对应的商品，影响转化率和收益。
     * @example params['command_external_info'] [非必填]自定义字段，只允许 数字、字母和_，限制长度为40
     * @example params['need_qr_code'] [非必填]是否需要二维码，默认false
     * @example params['need_share_link'] [非必填]是否返回站外H5链接 默认false
     * @example params['need_zlink'] [非必填]是否返回zlink，默认false
     * @example params['need_share_command'] [非必填]是否需要口令，默认false
     */
    public function product_link(array $params)
    {
        return $this->post('/life/product/link', $params);
    }

    /**
     * 商品转链解析接口
     * @param array $params
     * @return array|null
     * @example params['command'] [必填]重要：目前支持短链和口令的解析。短链和口令填写错误会导致解析不到对应的商品，影响转化率和收益。
     */
    public function command_parse(array $params)
    {
        return $this->post('/life/command_parse', $params);
    }

    /**
     * 订单接口
     * @param array $params
     * @return array|null
     * @example params['cursor'] [非必填]游标。注意：首次请求传空字符串
     * @example params['count'] [非必填]数量。默认为20，最大允许50。
     * @example params['order_id_list'] [非必填]订单id列表，注意：该单号不是，用户从抖音端看到的订单号不一样。返回值中的root_order_id为用户在抖音侧的单号（支持抖音侧单号的查询，排期中）
     * @example params['pay_time_begin'] [非必填]支付时间起始，单位：秒
     * @example params['pay_time_end'] [非必填]支付时间结束，单位：秒
     * @example params['update_time_begin'] [非必填]更新时间起始，单位：秒
     * @example params['update_time_end'] [非必填]更新时间结束，单位：秒
     */
    public function order_search(array $params)
    {
        return $this->post('/life/order/search', $params);
    }
}
