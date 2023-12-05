<?php

declare(strict_types=1);

namespace Ydg\PangolinSdk\Live;

use Ydg\PangolinSdk\PangolinClient;

class Live extends PangolinClient
{
    /**
     * 直播列表接口
     * @param array $params
     * @return array|null
     * @example params['page']⽤⼾[必填]分页index，从1开始
     * @example params['page_size']⽤[必填]分页size，范围(0,100]
     * @example params['search_type']⽤⼾[非必填]排序字段: 1-综合；2-销量；3-佣金率；4-粉丝数。不填默认为1
     * @example params['sort_type']⽤⼾[非必填]排序方式：0-降序；1-升序。不填默认为0。若sort_by为1， 则此字段无意义
     * @example params['status']⽤⼾[非必填]直播间状态筛选：0-在播和不在播，1-在播，2-不在播。默认为1，代表只出在播直播间
     * @example params['author_info']⽤⼾[非必填]达人昵称/账号
     */
    public function search(array $params = [])
    {
        $params['page'] = $params['page'] ?? 1;
        $params['page_size'] = $params['page_size'] ?? 20;
        return $this->post('/live/search', $params);
    }

    /**
     * 直播转链接口
     * @param array $params
     * @return array|null
     * @example params['author_openid'] [非必填]直播间主播open_id， 从直播间列表接口返回的author_openid可获得，author_openid和author_buyin_id必填其一
     * @example params['author_buyin_id'] [非必填]直播间主播buyin_id，从直播间列表接口返回的author_buyin_id可获得
     * @example params['external_info'] [非必填]自定义字段，只允许 数字、字母和_，限制长度为40
     * @example params['live_ext'] [非必填]直播间列表接口下发的live_info.ext，尽量填写
     * @example params['share_type'] [非必填]转链类型：1、抖音 deep link；2、抖音二维码；3、抖音口令 4、抖音zlink，默认返回抖音deeplink
     * @example params['product_id'] [非必填]直播间内的某个商品id， 必须来自直播间列表接口内的商品id， 且必须和直播间对应
     * @example params['platform'] [非必填]0：抖音，1：抖极，不传默认为0
     */
    public function link(array $params)
    {
        return $this->post('/live/link', $params);
    }
}
