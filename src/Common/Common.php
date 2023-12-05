<?php

declare(strict_types=1);

namespace Ydg\PangolinSdk\Common;

use Ydg\PangolinSdk\PangolinClient;

class Common extends PangolinClient
{
    /**
     * 口令解析
     * @param array $params
     * @return array|null
     * @example params['command']⽤⼾[必填]直播间/直播间商品/商品的抖口令
     */
    public function command_parse(array $params)
    {
        return $this->post('/command_parse', $params);
    }

    /**
     * 聚合页接口
     * @param array $params
     * @return array|null
     * @example params['material_id']⽤⼾[必填]聚合页类型枚举值，https://bytedance.larkoffice.com/docx/doxcnkEpyF2kKEzU67B0K2Pyknb
     * @example params['external_info']⽤⼾[非必填]自定义字段，只允许 数字、字母和_，限制长度为40
     * @example params['product_url']⽤⼾[非必填]用于强插指定商品到聚合头部位置
     * @example params['platform']⽤⼾[非必填]回流端标识，0表示抖音，1表示抖音极速版，不填默认为0
     * @example params['extra_params']⽤⼾[非必填]活动页转链自定义参数,json格式,键值都是字符串，product_id用作将指定商品置顶于活动页面。（仅支持超值购、秒杀频道）
     */
    public function aggregate_h5(array $params)
    {
        return $this->post('/aggregate/h5', $params);
    }

    /**
     * 电商新奖励查询接口
     * @param array $params
     * @return array|null
     * @example params['page']⽤⼾[必填]页数，从1开始
     * @example params['page_size']⽤⼾[必填]每页订单数目，最大为100
     * @example params['start_date']⽤⼾[非必填]查询开始日期，格式：20230308，奖励订单只保存近30天的订单
     * @example params['end_date']⽤⼾[非必填]查询结束日期，格式：20230308，奖励订单只保存近30天的订单
     * @example params['distribution_type']⽤⼾[非必填]默认全部，0:全部 1:商品分销 2: 直播间分销 3: mix自建活动页分销 4:频道页分销 99:其他
     */
    public function reward_orders(array $params = [])
    {
        $params['page'] = $params['page'] ?? 1;
        $params['page_size'] = $params['page_size'] ?? 20;
        return $this->post('/reward_orders', $params);
    }

    /**
     * CPA报表接口
     * @param array $params
     * @return array|null
     * @example params['Filters']⽤⼾[必填]过滤器
     * @example params['Dimensions']⽤⼾[非必填]聚合维度，如果是查cpa数据总览，可不传；如果是查cpa明细数据，可固定传"Date"，"SiteIds"，"PidType"
     * @example params['OrderField']⽤⼾[非必填]排序字段，不传默认按时间倒序排列。可传"Date"、"SiteIds"、"FirstPurchaseUserCount"
     * @example params['OrderType']⽤⼾[非必填]排序字段，asc代表升序，desc代表降序
     * @example params['IsChart']⽤⼾[非必填]返回的数据格式类型，true代表折线图，false代表表格；总览数据固定传true，明细数据固定传false
     * @example params['Pagination']⽤⼾[非必填]分页相关，不传默认返回所有数据记录，最大数量为1e4
     * @example params['Pagination']['Current']⽤⼾[必填]当前页
     * @example params['Pagination']['PageSize']⽤⼾[必填]页大小
     */
    public function cpa_report(array $params)
    {
        return $this->post('/cpa/report', $params);
    }

    /**
     * GMV报表接口
     * @param array $params
     * @return array|null
     * @example params['Filters']⽤⼾[必填]过滤器
     * @example params['Dimensions']⽤⼾[非必填]聚合维度，如果是查cpa数据总览，可不传；如果是查cpa明细数据，可固定传"Date"，"SiteIds"，"PidType"
     * @example params['OrderField']⽤⼾[非必填]排序字段，不传默认按时间倒序排列。可传"Date"、"SiteIds"、"FirstPurchaseUserCount"
     * @example params['OrderType']⽤⼾[非必填]排序字段，asc代表升序，desc代表降序
     * @example params['IsChart']⽤⼾[非必填]返回的数据格式类型，true代表折线图，false代表表格；总览数据固定传true，明细数据固定传false
     * @example params['Pagination']⽤⼾[非必填]分页相关，不传默认返回所有数据记录，最大数量为1e4
     * @example params['Pagination']['Current']⽤⼾[必填]当前页
     * @example params['Pagination']['PageSize']⽤⼾[必填]页大小
     */
    public function gmv_report(array $params)
    {
        return $this->post('/gmv/report', $params);
    }
}
