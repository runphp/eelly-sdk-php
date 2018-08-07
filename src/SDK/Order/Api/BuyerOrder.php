<?php

declare(strict_types=1);
/*
 * This file is part of eelly package.
 *
 * (c) eelly.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eelly\SDK\Order\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Order\Service\BuyerOrderInterface;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class BuyerOrder implements BuyerOrderInterface
{
    /**
     * 获取小程序订单列表(买家).
     *
     * > 订单筛选值(tab)
     *
     * 状态          | 状态值
     * ------------ | --------
     * 全部          | 0
     * 待付款        | 1
     * 待分享(已付款) | 2
     * 待发货        | 3
     * 待收货        | 4
     * 待评价(已收货) | 5
     *
     * > 返回数据说明
     *
     * key         | type    | value
     * ------------ |------  | --------
     * current      | int    | 当前页码
     * last         | int    | 下一页页码
     * totalPages   | int    | 总页码
     * totalItems   | int    | 数据总量
     * items        | array  |当前数据
     * items[]['orderId']     | string | 订单id
     * items[]['sellerName']  | string | 店铺名
     * items[]['orderStatus'] | int    | 订单状态
     * items[]['orderAmount'] | int    | 实付
     * items[]['initFreight'] | int    | 原运费(分)
     * items[]['freight']     | int    | 运费(分)
     * items[]['digAvatar']   | string | 点赞头像
     * items[]['createdDate'] | date   | 订单日期
     * items[]['goodsList']   | array  | 商品列表
     * items[]['goodsList'][]['goodsName']    | string | 商品名称
     * items[]['goodsList'][]['price']        | int    | 商品价格(分)
     * items[]['goodsList'][]['quantity']     | int    | 商品数量
     * items[]['goodsList'][]['spec']         | string | 商品属性
     * items[]['goodsList'][]['goodsImage']   | string | 商品图片
     *
     * > 订单状态(orderStatus)
     *
     * 值      |状态说明
     * -------|----------
     * 0      | 未知（错误值）
     * 1      | 待付款
     * 2      | 待分享
     * 3      | 待发货
     * 4      | 待收货
     * 5      | 待评价
     * 6      | 已评价
     * 7      | 集赞失败,已退款
     * 8      | 已退款, 交易取消
     * 9      | 未付款, 交易取消
     *
     * @param int    $tab    订单筛选值
     * @param int    $page   第几页
     * @param int    $limit  分页大小
     * @param UidDTO $uidDTO uid dto
     *
     * @return array
     *
     * @author hehui<hehui@eelly.net>
     *
     * @requestExample({"tab":1, "page":2})
     *
     * @returnExample(
     * {
     *     "first": 1,
     *     "before": 1,
     *     "current": 1,
     *     "last": 23,
     *     "next": 2,
     *     "totalPages": 23,
     *     "totalItems": 45,
     *     "limit": 2,
     *     "items": [
     *         {
     *             "orderId": "160",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 2,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524555994,
     *             "orderStatus": 8,
     *             "createdDate": "2018-04-24",
     *             "goodsList": [
     *                 {
     *                     "ogId": "20000215",
     *                     "orderId": "160",
     *                     "goodsId": "1450168293",
     *                     "gsId": "195022196",
     *                     "price": "1",
     *                     "quantity": "2",
     *                     "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *                     "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *                     "goodsNumber": "2",
     *                     "spec": "颜色:如图色,尺码:均码",
     *                     "createdTime": "1524555994",
     *                     "updateTime": "2018-04-24 15:46:32"
     *                 }
     *             ]
     *         },
     *         {
     *             "orderId": "159",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 0,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524550065,
     *             "orderStatus": 7,
     *             "createdDate": "2018-04-24",
     *             "goodsList": [
     *                 {
     *                     "ogId": "20000214",
     *                     "orderId": "159",
     *                     "goodsId": "1450168293",
     *                     "gsId": "195022196",
     *                     "price": "1",
     *                     "quantity": "2",
     *                     "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *                     "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *                     "goodsNumber": "2",
     *                     "spec": "颜色:如图色,尺码:均码",
     *                     "createdTime": "1524550066",
     *                     "updateTime": "2018-04-24 14:07:43"
     *                 }
     *             ]
     *         }
     *     ]
     * }
     * )
     */
    public function listAppletOrder(int $tab = 0, int $page = 1, int $limit = 20, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/buyerOrder', 'listAppletOrder', true, $tab, $page, $limit, $uidDTO);
    }

    /**
     * 获取小程序订单列表(买家).
     *
     * > 订单筛选值(tab)
     *
     * 状态          | 状态值
     * ------------ | --------
     * 全部          | 0
     * 待付款        | 1
     * 待分享(已付款) | 2
     * 待发货        | 3
     * 待收货        | 4
     * 待评价(已收货) | 5
     *
     * > 返回数据说明
     *
     * key         | type    | value
     * ------------ |------  | --------
     * current      | int    | 当前页码
     * last         | int    | 下一页页码
     * totalPages   | int    | 总页码
     * totalItems   | int    | 数据总量
     * items        | array  |当前数据
     * items[]['orderId']     | string | 订单id
     * items[]['sellerName']  | string | 店铺名
     * items[]['orderStatus'] | int    | 订单状态
     * items[]['orderAmount'] | int    | 实付
     * items[]['initFreight'] | int    | 原运费(分)
     * items[]['freight']     | int    | 运费(分)
     * items[]['digAvatar']   | string | 点赞头像
     * items[]['createdDate'] | date   | 订单日期
     * items[]['goodsList']   | array  | 商品列表
     * items[]['goodsList'][]['goodsName']    | string | 商品名称
     * items[]['goodsList'][]['price']        | int    | 商品价格(分)
     * items[]['goodsList'][]['quantity']     | int    | 商品数量
     * items[]['goodsList'][]['spec']         | string | 商品属性
     * items[]['goodsList'][]['goodsImage']   | string | 商品图片
     *
     * > 订单状态(orderStatus)
     *
     * 值      |状态说明
     * -------|----------
     * 0      | 未知（错误值）
     * 1      | 待付款
     * 2      | 待分享
     * 3      | 待发货
     * 4      | 待收货
     * 5      | 待评价
     * 6      | 已评价
     * 7      | 集赞失败,已退款
     * 8      | 已退款, 交易取消
     * 9      | 未付款, 交易取消
     *
     * @param int    $tab    订单筛选值
     * @param int    $page   第几页
     * @param int    $limit  分页大小
     * @param UidDTO $uidDTO uid dto
     *
     * @return array
     *
     * @author hehui<hehui@eelly.net>
     *
     * @requestExample({"tab":1, "page":2})
     *
     * @returnExample(
     * {
     *     "first": 1,
     *     "before": 1,
     *     "current": 1,
     *     "last": 23,
     *     "next": 2,
     *     "totalPages": 23,
     *     "totalItems": 45,
     *     "limit": 2,
     *     "items": [
     *         {
     *             "orderId": "160",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 2,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524555994,
     *             "orderStatus": 8,
     *             "createdDate": "2018-04-24",
     *             "goodsList": [
     *                 {
     *                     "ogId": "20000215",
     *                     "orderId": "160",
     *                     "goodsId": "1450168293",
     *                     "gsId": "195022196",
     *                     "price": "1",
     *                     "quantity": "2",
     *                     "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *                     "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *                     "goodsNumber": "2",
     *                     "spec": "颜色:如图色,尺码:均码",
     *                     "createdTime": "1524555994",
     *                     "updateTime": "2018-04-24 15:46:32"
     *                 }
     *             ]
     *         },
     *         {
     *             "orderId": "159",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 0,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524550065,
     *             "orderStatus": 7,
     *             "createdDate": "2018-04-24",
     *             "goodsList": [
     *                 {
     *                     "ogId": "20000214",
     *                     "orderId": "159",
     *                     "goodsId": "1450168293",
     *                     "gsId": "195022196",
     *                     "price": "1",
     *                     "quantity": "2",
     *                     "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *                     "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *                     "goodsNumber": "2",
     *                     "spec": "颜色:如图色,尺码:均码",
     *                     "createdTime": "1524550066",
     *                     "updateTime": "2018-04-24 14:07:43"
     *                 }
     *             ]
     *         }
     *     ]
     * }
     * )
     */
    public function listAppletOrderAsync(int $tab = 0, int $page = 1, int $limit = 20, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/buyerOrder', 'listAppletOrder', false, $tab, $page, $limit, $uidDTO);
    }

    /**
     * 获取我的订单统计信息(买家).
     *
     * > 返回数据说明
     *
     * key                | type    | value
     * ------------------ | ------- | --------
     * needPay            | int     | 待付款
     * needShare          | int     | 集赞中 待分享
     * needShipping       | int     | 待发货
     * needReceiving      | int     | 待收货
     *
     * @param UidDTO|null $uidDTO uid dto(表示需要登录)
     *
     * @return array
     *
     * @returnExample(
     * {
     *     "needPay": 32,
     *     "needShare": 8,
     *     "needShipping": 0,
     *     "needReceiving": 0,
     *     "needRefund":2
     * }
     * )
     *
     * @author hehui<hehui@eelly.net>
     */
    public function myAppletOrderStats(UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/buyerOrder', 'myAppletOrderStats', true, $uidDTO);
    }

    /**
     * 获取我的订单统计信息(买家).
     *
     * > 返回数据说明
     *
     * key                | type    | value
     * ------------------ | ------- | --------
     * needPay            | int     | 待付款
     * needShare          | int     | 集赞中 待分享
     * needShipping       | int     | 待发货
     * needReceiving      | int     | 待收货
     *
     * @param UidDTO|null $uidDTO uid dto(表示需要登录)
     *
     * @return array
     *
     * @returnExample(
     * {
     *     "needPay": 32,
     *     "needShare": 8,
     *     "needShipping": 0,
     *     "needReceiving": 0,
     *     "needRefund":2
     * }
     * )
     *
     * @author hehui<hehui@eelly.net>
     */
    public function myAppletOrderStatsAsync(UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/buyerOrder', 'myAppletOrderStats', false, $uidDTO);
    }

    /**
     * 小程序订单详情(买家).
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * orderStatus     | int      | 订单状态
     * consignee       | string   | 收货人姓名
     * mobile          | string   | 手机
     * regionName      | string   | 省市区
     * address         | string   | 详细地址
     * remark          | string   | 买家留言
     * sellerName      | string   | 卖家名称
     * orderAmount     | int      | 实收(分)
     * initGoodsAmount | int      | 货款(分)
     * freight         | int      | 运费(分)
     * initFreight     | int      | 原运费(分)
     * discountAmount  | int      | 优惠金额(分)
     * changePrice     | int      | 改价
     * orderSn         | string   | 订单号
     * createdDatetime | Datetime | 下单日期时间
     * payDatetime     | Datetime | 支付日期时间
     * shipDatetime    | Datetime | 发货日期时间
     * orderfrom       | string   | 订单来源
     * invoiceName     | stirng   | 送货公司名称
     * logisticsName   | string   | 送货方式
     * goodsCount      | int       | 商品款数
     * productCount    | int       | 商品总件数
     * extension       | int       | 订单业务标识：0 普通订单  1 团购订单
     * expressStatus   | string    | 最新物流状态
     * expressTime     | Datetime  | 最新物流时间
     * countdown       | int       | 倒计时（秒），当orderStatus = 1 或 2 或 4 或 5
     * timeList                       | array     | 时间列表
     * timeList['createdTime']        | int       | 下单时间
     * timeList['payTime']            | int       | 付款时间
     * timeList['shareTime']          | int       | 集赞成功时间
     * timeList['shipTime']           | int       | 发货时间
     * timeList['receiveTime']        | int       | 收货时间
     * goodsList       | array     | 商品列表
     * goodsList[]['goodsName']    | string | 商品名称
     * goodsList[]['price']        | int    | 商品价格(分)
     * goodsList[]['quantity']     | int    | 商品数量
     * goodsList[]['spec']         | string | 商品属性
     * goodsList[]['goodsImage']   | string | 商品图片
     *
     * > 订单状态(orderStatus)
     *
     * 值      |状态说明
     * -------|----------
     * 0      | 未知（错误值）
     * 1      | 待付款
     * 2      | 待分享
     * 3      | 待发货
     * 4      | 待收货
     * 5      | 待评价
     * 6      | 已评价
     * 7      | 集赞失败,已退款
     * 8      | 已退款, 交易取消
     * 9      | 未付款, 交易取消
     *
     * @param int         $orderId 订单id
     * @param UidDTO|null $uidDTO  uid dto
     *
     * @return array
     *
     * @requestExample({"orderId":"160"})
     *
     * @returnExample(
     * {
     *     "orderId": "160",
     *     "orderSn": "1811370443",
     *     "sellerName": "莫琼小店",
     *     "osId": "26",
     *     "orderAmount": "2",
     *     "payTime": "1524556066",
     *     "shipTime": "0",
     *     "freight": "1",
     *     "createdTime": 1524555994,
     *     "remark": "",
     *     "fromFlag": "0",
     *     "likes": "2",
     *     "evaluation": null,
     *     "initGoodsAmount": "2",
     *     "discountAmount": "0",
     *     "initAmount": "0",
     *     "consignee": "蓝厨卫",
     *     "mobile": "11113131313",
     *     "regionName": "山西省 晋城市 沁水县",
     *     "address": "2222",
     *     "invoiceName": "韵达1",
     *     "logisticsName": "",
     *     "orderStatus": 8,
     *     "createdDatetime": "2018-04-24 07:46:34",
     *     "payDatetime": "2018-04-24 07:47:46",
     *     "shipDatetime": "1970-01-01 00:00:00",
     *     "changePrice": 1,
     *     "orderfrom": "未知",
     *     "goodsCount": 1,
     *     "productCount": 0,
     *     "goodsList": [
     *         {
     *             "ogId": "20000215",
     *             "orderId": "160",
     *             "goodsId": "1450168293",
     *             "gsId": "195022196",
     *             "price": "1",
     *             "quantity": "2",
     *             "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *             "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *             "goodsNumber": "2",
     *             "spec": "颜色:如图色,尺码:均码",
     *             "createdTime": "1524555994",
     *             "updateTime": "2018-04-24 15:46:32"
     *         }
     *     ],
     *     "expressStatus": "湖南省炎陵县公司快件已被 已签收 签收",
     *     "countdown": 14586655,
     *     "timeList": [{
     *         "createdTime": 1524555994,
     *         "payTime": "1524556066",
     *         "shareTime": 1524899478,
     *         "shipTime": 0,
     *         "receiveTime": 0
     *     }]
     * }
     * )
     *
     * @author hehui<hehui@eelly.net>
     */
    public function appletOrderDetail(int $orderId, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/buyerOrder', 'appletOrderDetail', true, $orderId, $uidDTO);
    }

    /**
     * 小程序订单详情(买家).
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * orderStatus     | int      | 订单状态
     * consignee       | string   | 收货人姓名
     * mobile          | string   | 手机
     * regionName      | string   | 省市区
     * address         | string   | 详细地址
     * remark          | string   | 买家留言
     * sellerName      | string   | 卖家名称
     * orderAmount     | int      | 实收(分)
     * initGoodsAmount | int      | 货款(分)
     * freight         | int      | 运费(分)
     * initFreight     | int      | 原运费(分)
     * discountAmount  | int      | 优惠金额(分)
     * changePrice     | int      | 改价
     * orderSn         | string   | 订单号
     * createdDatetime | Datetime | 下单日期时间
     * payDatetime     | Datetime | 支付日期时间
     * shipDatetime    | Datetime | 发货日期时间
     * orderfrom       | string   | 订单来源
     * invoiceName     | stirng   | 送货公司名称
     * logisticsName   | string   | 送货方式
     * goodsCount      | int       | 商品款数
     * productCount    | int       | 商品总件数
     * extension       | int       | 订单业务标识：0 普通订单  1 团购订单
     * expressStatus   | string    | 最新物流状态
     * expressTime     | Datetime  | 最新物流时间
     * countdown       | int       | 倒计时（秒），当orderStatus = 1 或 2 或 4 或 5
     * timeList                       | array     | 时间列表
     * timeList['createdTime']        | int       | 下单时间
     * timeList['payTime']            | int       | 付款时间
     * timeList['shareTime']          | int       | 集赞成功时间
     * timeList['shipTime']           | int       | 发货时间
     * timeList['receiveTime']        | int       | 收货时间
     * goodsList       | array     | 商品列表
     * goodsList[]['goodsName']    | string | 商品名称
     * goodsList[]['price']        | int    | 商品价格(分)
     * goodsList[]['quantity']     | int    | 商品数量
     * goodsList[]['spec']         | string | 商品属性
     * goodsList[]['goodsImage']   | string | 商品图片
     *
     * > 订单状态(orderStatus)
     *
     * 值      |状态说明
     * -------|----------
     * 0      | 未知（错误值）
     * 1      | 待付款
     * 2      | 待分享
     * 3      | 待发货
     * 4      | 待收货
     * 5      | 待评价
     * 6      | 已评价
     * 7      | 集赞失败,已退款
     * 8      | 已退款, 交易取消
     * 9      | 未付款, 交易取消
     *
     * @param int         $orderId 订单id
     * @param UidDTO|null $uidDTO  uid dto
     *
     * @return array
     *
     * @requestExample({"orderId":"160"})
     *
     * @returnExample(
     * {
     *     "orderId": "160",
     *     "orderSn": "1811370443",
     *     "sellerName": "莫琼小店",
     *     "osId": "26",
     *     "orderAmount": "2",
     *     "payTime": "1524556066",
     *     "shipTime": "0",
     *     "freight": "1",
     *     "createdTime": 1524555994,
     *     "remark": "",
     *     "fromFlag": "0",
     *     "likes": "2",
     *     "evaluation": null,
     *     "initGoodsAmount": "2",
     *     "discountAmount": "0",
     *     "initAmount": "0",
     *     "consignee": "蓝厨卫",
     *     "mobile": "11113131313",
     *     "regionName": "山西省 晋城市 沁水县",
     *     "address": "2222",
     *     "invoiceName": "韵达1",
     *     "logisticsName": "",
     *     "orderStatus": 8,
     *     "createdDatetime": "2018-04-24 07:46:34",
     *     "payDatetime": "2018-04-24 07:47:46",
     *     "shipDatetime": "1970-01-01 00:00:00",
     *     "changePrice": 1,
     *     "orderfrom": "未知",
     *     "goodsCount": 1,
     *     "productCount": 0,
     *     "goodsList": [
     *         {
     *             "ogId": "20000215",
     *             "orderId": "160",
     *             "goodsId": "1450168293",
     *             "gsId": "195022196",
     *             "price": "1",
     *             "quantity": "2",
     *             "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *             "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *             "goodsNumber": "2",
     *             "spec": "颜色:如图色,尺码:均码",
     *             "createdTime": "1524555994",
     *             "updateTime": "2018-04-24 15:46:32"
     *         }
     *     ],
     *     "expressStatus": "湖南省炎陵县公司快件已被 已签收 签收",
     *     "countdown": 14586655,
     *     "timeList": [{
     *         "createdTime": 1524555994,
     *         "payTime": "1524556066",
     *         "shareTime": 1524899478,
     *         "shipTime": 0,
     *         "receiveTime": 0
     *     }]
     * }
     * )
     *
     * @author hehui<hehui@eelly.net>
     */
    public function appletOrderDetailAsync(int $orderId, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/buyerOrder', 'appletOrderDetail', false, $orderId, $uidDTO);
    }

    /**
     * 确认收货.
     *
     * @param int $orderId 订单id
     * @param int $uid 用户id
     *
     * @return bool
     *
     * @author hehui<hehui@eelly.net>
     */
    public function confirmReceivedOrder(int $orderId, int $uid): bool
    {
        return EellyClient::request('order/buyerOrder', 'confirmReceivedOrder', true, $orderId, $uid);
    }

    /**
     * 确认收货.
     *
     * @param int $orderId 订单id
     * @param int $uid 用户id
     *
     * @return bool
     *
     * @author hehui<hehui@eelly.net>
     */
    public function confirmReceivedOrderAsync(int $orderId, int $uid)
    {
        return EellyClient::request('order/buyerOrder', 'confirmReceivedOrder', false, $orderId, $uid);
    }

    /**
     * 申请退货退款
     *
     * @param integer $type 退货退款类型 1:仅退款， 2:退货退款
     * @param integer $orderId 订单id
     * @param integer $remarkType 退款原因
     * @param integer $price 退款金额
     * @param string $desc 退款说明
     * @param string $certificate 退款凭证 图片，多图用#拼接
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefund(int $type, int $orderId, int $remarkType, int $price, string $desc = '-', string $certificate = '-'): bool
    {
        return EellyClient::request('order/buyerOrder', 'orderRefund', true, $type, $orderId, $remarkType, $price, $desc, $certificate);
    }

    /**
     * 申请退货退款
     *
     * @param integer $type 退货退款类型 1:仅退款， 2:退货退款
     * @param integer $orderId 订单id
     * @param integer $remarkType 退款原因
     * @param integer $price 退款金额
     * @param string $desc 退款说明
     * @param string $certificate 退款凭证 图片，多图用#拼接
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundAsync(int $type, int $orderId, int $remarkType, int $price, string $desc = '-', string $certificate = '-')
    {
        return EellyClient::request('order/buyerOrder', 'orderRefund', false, $type, $orderId, $remarkType, $price, $desc, $certificate);
    }

    /**
     * 退货退款详情
     * 
     * > from_os_id 和 to_os_id 状态说明 
     * 
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     * 
     * > remark_type 退货原因状态
     * 
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好 
     *  4      | 卖家超时未发货 
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * applyAmount      | int      | 申请的金额
     * applyFreight     | int      | 申请的运费 
     * type             | int      | 退货退款类型: 1 退款 2 退货 
     * remarkType       | string   | 退货退款原因
     * remark           | string   | 备注说明
     * certificate      | int      | 凭证
     * seller_id        | int      | 店铺id
     * finished_time    | int      | 退货退款完成时间
     * seller_name      | string   | 店铺名称
     * orderSn          | int      | 订单编号
     * firstTime        | int      | 第一次发起的退货退款时间戳
     * lastTime         | int      | 最后一次更新的时间
     * time             | int      | 倒计时的时间
     * statusContent    | string   | 详情文案信息
     * status           | int      | 文案状态 1:申请退款中,2:申请退货中,3:卖家拒绝退款，等待我处理,4:卖家同意退货，等待我退货,5:卖家拒绝退货，等待我处理,6:我已发货，等待卖家发货,7:退货退款成功
     * 
     * @param integer $orderId 订单id
     * @return array
     * 
     * @requestExample({"orderId":116})
     * @returnExample({
     *      "applyAmount":"10",
     *      "applyFreight":"1",
     *      "type":"2",
     *      "seller_id":"1761477",
     *      "seller_name":"广东省广州市萌STYLE时尚童装店批发服装店细心",
     *      "remarkType":"卖家超时未发货",
     *      "remark":"-",
     *      "statusContent":"退货退款成功",
     *      "status":"7",
     *      "certificate":"[]",
     *      "orderSn":"1810837219",
     *      "firstTime":"1529908563",
     *      "finished_time":"1529908563",
     *      "lastTime":"1529913120",
     *      "time":"9281"
     * })
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderDetail(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'orderDetail', true, $orderId);
    }

    /**
     * 退货退款详情
     * 
     * > from_os_id 和 to_os_id 状态说明 
     * 
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     * 
     * > remark_type 退货原因状态
     * 
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好 
     *  4      | 卖家超时未发货 
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * applyAmount      | int      | 申请的金额
     * applyFreight     | int      | 申请的运费 
     * type             | int      | 退货退款类型: 1 退款 2 退货 
     * remarkType       | string   | 退货退款原因
     * remark           | string   | 备注说明
     * certificate      | int      | 凭证
     * seller_id        | int      | 店铺id
     * finished_time    | int      | 退货退款完成时间
     * seller_name      | string   | 店铺名称
     * orderSn          | int      | 订单编号
     * firstTime        | int      | 第一次发起的退货退款时间戳
     * lastTime         | int      | 最后一次更新的时间
     * time             | int      | 倒计时的时间
     * statusContent    | string   | 详情文案信息
     * status           | int      | 文案状态 1:申请退款中,2:申请退货中,3:卖家拒绝退款，等待我处理,4:卖家同意退货，等待我退货,5:卖家拒绝退货，等待我处理,6:我已发货，等待卖家发货,7:退货退款成功
     * 
     * @param integer $orderId 订单id
     * @return array
     * 
     * @requestExample({"orderId":116})
     * @returnExample({
     *      "applyAmount":"10",
     *      "applyFreight":"1",
     *      "type":"2",
     *      "seller_id":"1761477",
     *      "seller_name":"广东省广州市萌STYLE时尚童装店批发服装店细心",
     *      "remarkType":"卖家超时未发货",
     *      "remark":"-",
     *      "statusContent":"退货退款成功",
     *      "status":"7",
     *      "certificate":"[]",
     *      "orderSn":"1810837219",
     *      "firstTime":"1529908563",
     *      "finished_time":"1529908563",
     *      "lastTime":"1529913120",
     *      "time":"9281"
     * })
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderDetailAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'orderDetail', false, $orderId);
    }

    /**
     * 协商记录
     * 
     * > from_os_id 和 to_os_id 状态说明 
     * 
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     * 
     * > remark_type 退货原因状态
     * 
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好 
     *  4      | 卖家超时未发货 
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     * 
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * order_id      | int      | 订单id
     * type          | int      | 操作类型 1:买家，2:卖家 
     * handle_id     | int      | 买家id
     * handle_name   | string   | 买家名称
     * from_os_id    | int      | 原先状态id
     * to_os_id      | int      | 至某种状态id
     * remark        | int      | 备注说明 这个说明是操作日志的说明
     * created_time  | int      | 此记录的时间戳
     * certificate                | array    | 凭证数据
     * certificate['order_id']     | int      | 订单id
     * certificate['os_id']        | int      | 订单状态
     * certificate['type']         | int      | 订单类型 1:退款 2:退货退款
     * certificate['refuseReason'] | string   |  卖家拒绝  退货／退款 的拒绝原因
     * certificate['phase']        | int      | 订单发货状态 1:未发货发起的退款 2:已发货发起的退款 3:已发货发起的退货退款
     * certificate['apply_amount'] | int      | 申请的退款金额
     * certificate['apply_freight']| int      | 申请的退款运费
     * certificate['certificate']  | array    | 图片凭证
     * certificate['remark_type']  | int      | 退货退款原因
     * certificate['remark']       | stirng   | 备注说明 这个remark是申请时的说明
     * certificate['created_time'] | stirng   | 退货退款发出的时间戳
     * address                    | array    | 退货地址
     * address - phone            | string   | 手机号
     * address - mobile           | string   | 手机号
     * address - region_name      | string   | 地区
     * address - address          | string   | 详细地址
     * address - consignee        | string   | 收件人姓名
     * 
     * @param integer $orderId 订单id
     * @return array
     * @requestExample({"orderId":116})
     * @returnExample([
     * {
     *      "order_id":"116",
     *      "type":"1",
     *      "handle_id":"2108403",
     *      "handle_name":"买家名称",
     *      "from_os_id":"0",
     *      "to_os_id":"16",
     *      "remark":"买家 买家名称 提交了 退货申请",
     *      "created_time":"2018-06-29 19:42:24",
     *      "certificate":[{
     *          "order_id":116,
     *          "os_id":16,
     *          "type":2,
     *          "phase":3,
     *          "apply_amount":100,
     *          "apply_freight":"1",
     *          "certificate":"null",
     *          "remark_type":4,
     *          "remark":"-",
     *          "created_time":"1529908563"
     *      }]
     * },
     * {
     *      "order_id":"116",
     *      "type":"1",
     *      "handle_id":"2108403",
     *      "handle_name":"买家名称",
     *      "from_os_id":"20",
     *      "to_os_id":"17",
     *      "remark":"买家 买家名称 提交了 退货申请",
     *      "created_time":"2018-06-29 19:42:24",
     *      "remark":"-",
     *      "address":[{
     *          "phone":116,
     *          "mobile":16,
     *          "region_name":2,
     *          "address":3,
     *          "consignee":100
     *      }]
     * }
     * ])
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundLog(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundLog', true, $orderId);
    }

    /**
     * 协商记录
     * 
     * > from_os_id 和 to_os_id 状态说明 
     * 
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     * 
     * > remark_type 退货原因状态
     * 
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好 
     *  4      | 卖家超时未发货 
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     * 
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * order_id      | int      | 订单id
     * type          | int      | 操作类型 1:买家，2:卖家 
     * handle_id     | int      | 买家id
     * handle_name   | string   | 买家名称
     * from_os_id    | int      | 原先状态id
     * to_os_id      | int      | 至某种状态id
     * remark        | int      | 备注说明 这个说明是操作日志的说明
     * created_time  | int      | 此记录的时间戳
     * certificate                | array    | 凭证数据
     * certificate['order_id']     | int      | 订单id
     * certificate['os_id']        | int      | 订单状态
     * certificate['type']         | int      | 订单类型 1:退款 2:退货退款
     * certificate['refuseReason'] | string   |  卖家拒绝  退货／退款 的拒绝原因
     * certificate['phase']        | int      | 订单发货状态 1:未发货发起的退款 2:已发货发起的退款 3:已发货发起的退货退款
     * certificate['apply_amount'] | int      | 申请的退款金额
     * certificate['apply_freight']| int      | 申请的退款运费
     * certificate['certificate']  | array    | 图片凭证
     * certificate['remark_type']  | int      | 退货退款原因
     * certificate['remark']       | stirng   | 备注说明 这个remark是申请时的说明
     * certificate['created_time'] | stirng   | 退货退款发出的时间戳
     * address                    | array    | 退货地址
     * address - phone            | string   | 手机号
     * address - mobile           | string   | 手机号
     * address - region_name      | string   | 地区
     * address - address          | string   | 详细地址
     * address - consignee        | string   | 收件人姓名
     * 
     * @param integer $orderId 订单id
     * @return array
     * @requestExample({"orderId":116})
     * @returnExample([
     * {
     *      "order_id":"116",
     *      "type":"1",
     *      "handle_id":"2108403",
     *      "handle_name":"买家名称",
     *      "from_os_id":"0",
     *      "to_os_id":"16",
     *      "remark":"买家 买家名称 提交了 退货申请",
     *      "created_time":"2018-06-29 19:42:24",
     *      "certificate":[{
     *          "order_id":116,
     *          "os_id":16,
     *          "type":2,
     *          "phase":3,
     *          "apply_amount":100,
     *          "apply_freight":"1",
     *          "certificate":"null",
     *          "remark_type":4,
     *          "remark":"-",
     *          "created_time":"1529908563"
     *      }]
     * },
     * {
     *      "order_id":"116",
     *      "type":"1",
     *      "handle_id":"2108403",
     *      "handle_name":"买家名称",
     *      "from_os_id":"20",
     *      "to_os_id":"17",
     *      "remark":"买家 买家名称 提交了 退货申请",
     *      "created_time":"2018-06-29 19:42:24",
     *      "remark":"-",
     *      "address":[{
     *          "phone":116,
     *          "mobile":16,
     *          "region_name":2,
     *          "address":3,
     *          "consignee":100
     *      }]
     * }
     * ])
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundLogAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundLog', false, $orderId);
    }

    /**
     * 撤销退款申请
     *
     * @param integer $orderId 订单id
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function cancelOrderRefund(int $orderId): bool
    {
        return EellyClient::request('order/buyerOrder', 'cancelOrderRefund', true, $orderId);
    }

    /**
     * 撤销退款申请
     *
     * @param integer $orderId 订单id
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function cancelOrderRefundAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'cancelOrderRefund', false, $orderId);
    }

    /**
     * 退货
     * 
     * @param integer $orderId 订单id
     * @param string $invoiceInfo 收件人信息 json格式
     * @param string $invoiceCode 送货编码 快递公司拼音
     * @param string $invoiceName 快递公司
     * @param string $invoiceNo 订单编号
     * @return boolean
     * @requestExample(
     * {
     *      "orderId":"116",
     *      "invoiceInfo":'{"consignee":"收件人姓名", "gbCode":"地区编号", "regionName":"广东省 广州市 越秀区","address":"白云大道北泰兴大厦","zipcode":"500001","mobile":"15267987854"}',
     *      "invoiceCode":"shunfeng",
     *      "invoiceName":"顺丰",
     *      "invoiceNo":"123123"
     * }
     * )
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundInvoice(int $orderId, string $invoiceInfo, string $invoiceCode, string $invoiceName, string $invoiceNo): bool
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundInvoice', true, $orderId, $invoiceInfo, $invoiceCode, $invoiceName, $invoiceNo);
    }

    /**
     * 退货
     * 
     * @param integer $orderId 订单id
     * @param string $invoiceInfo 收件人信息 json格式
     * @param string $invoiceCode 送货编码 快递公司拼音
     * @param string $invoiceName 快递公司
     * @param string $invoiceNo 订单编号
     * @return boolean
     * @requestExample(
     * {
     *      "orderId":"116",
     *      "invoiceInfo":'{"consignee":"收件人姓名", "gbCode":"地区编号", "regionName":"广东省 广州市 越秀区","address":"白云大道北泰兴大厦","zipcode":"500001","mobile":"15267987854"}',
     *      "invoiceCode":"shunfeng",
     *      "invoiceName":"顺丰",
     *      "invoiceNo":"123123"
     * }
     * )
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundInvoiceAsync(int $orderId, string $invoiceInfo, string $invoiceCode, string $invoiceName, string $invoiceNo)
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundInvoice', false, $orderId, $invoiceInfo, $invoiceCode, $invoiceName, $invoiceNo);
    }

    /**
     * 重新申请退货退款接口
     * 
     * > from_os_id 和 to_os_id 状态说明 
     * 
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     * 
     * > remark_type 退货原因状态
     * 
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好 
     *  4      | 卖家超时未发货 
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     * 
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * order_id      | int      | 订单id
     * apply_amount  | int       | 申请退款金额
     * apply_freight | int       | 申请运费金额
     * type          | int      | 退货退款类型: 1 退款 2 退货
     * remark_type   | int      | 退货原因
     * remark        | int      | 备注说明
     * phase         | int       | 订单状态 1:未发货发起的退款，2:已发货发起的退款 3:已发货发起的退货退款
     * os_id         | int       | 订单状态
     * certificate   | array       | 凭证数据 只有type为2时才有有效数据
     * 
     * @param integer $orderId 订单id
     * @return array
     * @requestExample({"orderId":"116"})
     * @returnExample({
     *      "order_id":"116",
     *      "apply_amount":"10",
     *      "apply_freight":"1",
     *      "type":"2",
     *      "remark_type":"4",
     *      "remark":"-",
     *      "phase":"3",
     *      "os_id":"26",
     *      "certificate":"[]"
     * })
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundLogEdit(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundLogEdit', true, $orderId);
    }

    /**
     * 重新申请退货退款接口
     * 
     * > from_os_id 和 to_os_id 状态说明 
     * 
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     * 
     * > remark_type 退货原因状态
     * 
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好 
     *  4      | 卖家超时未发货 
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     * 
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * order_id      | int      | 订单id
     * apply_amount  | int       | 申请退款金额
     * apply_freight | int       | 申请运费金额
     * type          | int      | 退货退款类型: 1 退款 2 退货
     * remark_type   | int      | 退货原因
     * remark        | int      | 备注说明
     * phase         | int       | 订单状态 1:未发货发起的退款，2:已发货发起的退款 3:已发货发起的退货退款
     * os_id         | int       | 订单状态
     * certificate   | array       | 凭证数据 只有type为2时才有有效数据
     * 
     * @param integer $orderId 订单id
     * @return array
     * @requestExample({"orderId":"116"})
     * @returnExample({
     *      "order_id":"116",
     *      "apply_amount":"10",
     *      "apply_freight":"1",
     *      "type":"2",
     *      "remark_type":"4",
     *      "remark":"-",
     *      "phase":"3",
     *      "os_id":"26",
     *      "certificate":"[]"
     * })
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundLogEditAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundLogEdit', false, $orderId);
    }

    /**
     * 修改退货信息
     *
     * @param integer $oiId 退货id
     * @param integer $orderId 订单id
     * @param string $invoiceCode 送货编号 快递公司对应的拼音
     * @param string $invoiceName 送货公司的名称
     * @param string $invoiceNo 送货单号
     * @return boolean
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function editOrderRefundInvoice(int $oiId, int $orderId, string $invoiceCode, string $invoiceName, string $invoiceNo): bool
    {
        return EellyClient::request('order/buyerOrder', 'editOrderRefundInvoice', true, $oiId, $orderId, $invoiceCode, $invoiceName, $invoiceNo);
    }

    /**
     * 修改退货信息
     *
     * @param integer $oiId 退货id
     * @param integer $orderId 订单id
     * @param string $invoiceCode 送货编号 快递公司对应的拼音
     * @param string $invoiceName 送货公司的名称
     * @param string $invoiceNo 送货单号
     * @return boolean
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function editOrderRefundInvoiceAsync(int $oiId, int $orderId, string $invoiceCode, string $invoiceName, string $invoiceNo)
    {
        return EellyClient::request('order/buyerOrder', 'editOrderRefundInvoice', false, $oiId, $orderId, $invoiceCode, $invoiceName, $invoiceNo);
    }

    /**
     * 获取退货信息
     * 
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * oi_id      | int      | 退货id
     * order_id      | int      | 订单id
     * type  | int       | 物流类型：1 发货物流 2 退货物流
     * consignee | string       | 收货人姓名
     * gb_code          | int      | 地区ID
     * region_name   | string      | 地区名称
     * address        | string      | 收货详细地址'
     * zipcode         | string       | 邮编
     * phone         | string       | 手机号码
     * mobile   | string       | 手机号码
     * invoice_code   | string       | 送货编码：快递公司对应的拼音
     * invoice_name   | string       | 送货公司名称
     * invoice_no   | string       | 送货单号
     * status   | int       | 物流状态：0 未查到 1 配送中 2 已送达
     *
     * @param integer $orderId 订单id
     * @return array
     * @requestExample({"orderId":"5000100"})
     * @returnExample({
     *      "oi_id":"285",
     *      "order_id":"116",
     *      "type":"2",
     *      "consignee":"张三",
     *      "gb_code":"440105",
     *      "region_name":"广东省 广州市 海珠区",
     *      "address":"新港中路397号",
     *      "zipcode":"0",
     *      "phone":"0",
     *      "mobile":"20",
     *      "sl_id":"1",
     *      "logistics_name":"yiyiyiyi - 货运 - 运费到付",
     *      "invoice_code":"shkd",
     *      "invoice_name":"顺丰快递",
     *      "invoice_no":"12312312321123123",
     *      "status":"0",
     *      "sign_time":"0",
     *      "remark":"{}",
     *      "created_time":"1525750592",
     *      "update_time":"2018-07-04 18:00:18"
     * })
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function getOrderRefundInvoice(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'getOrderRefundInvoice', true, $orderId);
    }

    /**
     * 获取退货信息
     * 
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * oi_id      | int      | 退货id
     * order_id      | int      | 订单id
     * type  | int       | 物流类型：1 发货物流 2 退货物流
     * consignee | string       | 收货人姓名
     * gb_code          | int      | 地区ID
     * region_name   | string      | 地区名称
     * address        | string      | 收货详细地址'
     * zipcode         | string       | 邮编
     * phone         | string       | 手机号码
     * mobile   | string       | 手机号码
     * invoice_code   | string       | 送货编码：快递公司对应的拼音
     * invoice_name   | string       | 送货公司名称
     * invoice_no   | string       | 送货单号
     * status   | int       | 物流状态：0 未查到 1 配送中 2 已送达
     *
     * @param integer $orderId 订单id
     * @return array
     * @requestExample({"orderId":"5000100"})
     * @returnExample({
     *      "oi_id":"285",
     *      "order_id":"116",
     *      "type":"2",
     *      "consignee":"张三",
     *      "gb_code":"440105",
     *      "region_name":"广东省 广州市 海珠区",
     *      "address":"新港中路397号",
     *      "zipcode":"0",
     *      "phone":"0",
     *      "mobile":"20",
     *      "sl_id":"1",
     *      "logistics_name":"yiyiyiyi - 货运 - 运费到付",
     *      "invoice_code":"shkd",
     *      "invoice_name":"顺丰快递",
     *      "invoice_no":"12312312321123123",
     *      "status":"0",
     *      "sign_time":"0",
     *      "remark":"{}",
     *      "created_time":"1525750592",
     *      "update_time":"2018-07-04 18:00:18"
     * })
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function getOrderRefundInvoiceAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'getOrderRefundInvoice', false, $orderId);
    }

    /**
     * 返回最多退款金额 和 运费
     *
     * @param integer $orderId 订单id
     * @return array
     *
     * @requestExample({"orderId":"5000100"})
     * @returnExample({"returnAmount":1000, "freight":0})
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundMoney(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundMoney', true, $orderId);
    }

    /**
     * 返回最多退款金额 和 运费
     *
     * @param integer $orderId 订单id
     * @return array
     *
     * @requestExample({"orderId":"5000100"})
     * @returnExample({"returnAmount":1000, "freight":0})
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundMoneyAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundMoney', false, $orderId);
    }

    /**
     * @return self
     */
    public static function getInstance(): self
    {
        static $instance;
        if (null === $instance) {
            $instance = new self();
        }

        return $instance;
    }
}