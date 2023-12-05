<?php

declare(strict_types=1);

namespace Ydg\PangolinSdk\Product;

use Ydg\PangolinSdk\PangolinClient;

class Product extends PangolinClient
{
    /**
     * 商品列表接口
     * @param array $params
     * @return array|null
     * @example params['page']⽤⼾[必填]分页(从1开始)
     * @example params['page_size']⽤[必填]每页的数量(小于等于20)
     * @example params['title'] [非必填]| 商品关键词
     * @example params['first_cids'] [非必填]筛选商品一级类目，例：[1,2,3]
     * @example params['second_cids'] [非必填]筛选商品二级类目，例：[11,22,33]
     * @example params['third_cids'] [非必填]筛选商品三级类目，例：[111,222,333]
     * @example params['price_min']⽤⼾[非必填]筛选价格区间-最小值(单位为分)
     * @example params['price_max']⽤⼾[非必填]筛选价格区间-最大值(单位为分)
     * @example params['sell_num_min']⽤⼾[非必填]筛选历史销量区间-最小值
     * @example params['sell_num_max']⽤⼾[非必填]筛选历史销量区间-最大值
     * @example params['search_type']⽤⼾[非必填]排序类型：0 默认排序；1历史销量排序；2价格排序；3佣金排序；4佣金比例排序。不填默认为0
     * @example params['sort_type']⽤⼾[非必填]排序顺序(0升序1降序)，若search_type为0，则此值无意义
     * @example params['cos_fee_min']⽤⼾[非必填]筛选分佣区间-最小值(单位为分)
     * @example params['cos_fee_max']⽤⼾[非必填]筛选分佣区间-最大值(单位为分)
     * @example params['cos_ratio_min']⽤⼾[非必填]筛选分佣比例区间-最小值(乘100,例如1.1%为110)
     * @example params['cos_ratio_max']⽤⼾[非必填]筛选分佣比例区间-最大值(乘100,例如1.1%为110)
     */
    public function search(array $params = [])
    {
        $params['page'] = $params['page'] ?? 1;
        $params['page_size'] = $params['page_size'] ?? 20;
        return $this->post('/product/search', $params);
    }

    /**
     * 商品转链接口
     * @param array $params
     * @return array|null
     * @example params['product_url'] [必填]商品url。与商品接口detail_url一致
     * @example params['product_ext'] [非必填]商品搜索接口返回的product.ext 字段, 尽量填写
     * @example params['external_info'] [非必填]媒体传递扩展参数的字段， 字符只允许字母大小写、数字、下划线，长度不超过40
     * @example params['share_type'] [非必填]转链类型：1、抖音 deep link；2、抖音二维码；3、抖音口令；4、抖音zlink。不填默认只有1
     * @example params['platform'] [非必填]回流端标识0:抖音1:抖音极速版
     */
    public function link(array $params)
    {
        return $this->post('/product/link', $params);
    }

    /**
     * 商品详情接口
     * @param array $params
     * @return array|null
     * @example params['product_ids'] [必填]商品ID列表，例：[912374674527677]
     */
    public function detail(array $params)
    {
        return $this->post('/product/detail', $params);
    }

    /**
     * 商品类目查询
     * @param array $params
     * @return array|null
     * @example params['parent_id'] [必填]本接口是通过上级类目，查询下级类目。如果要查询一级类目，则该字段填写 0 即可。查询二级类目，输入相应的一级类目即可。若未传，则默认为0
     */
    public function category(array $params = [])
    {
        $params['parent_id'] = $params['parent_id'] ?? 0;
        return $this->post('/product/category', $params);
    }

    /**
     * 选品接口
     * @param array $params
     * @return array|null
     * @example params['package_id'] [必填]商品包id，标识一类商品，由穿山甲运营提供
     * @example params['page'] [必填]第几个页面， 从1开始。当前默认每页20个。不应超过页面总数
     */
    public function select(array $params)
    {
        return $this->post('/product/select', $params);
    }
}
