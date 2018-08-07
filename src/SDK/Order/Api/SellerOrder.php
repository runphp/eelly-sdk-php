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
use Eelly\SDK\Order\Service\SellerOrderInterface;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class SellerOrder implements SellerOrderInterface
{
    /**
     * 我的小程序订单.
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
     * items[]['ordern']      | string | 订单编号
     * items[]['buyerName']   | string | 买家名
     * items[]['orderStatus'] | int    | 订单状态
     * items[]['orderAmount'] | int    | 实付(分)
     * items[]initGoodsAmount | int    | 原货款(分)
     * items[]initFreight     | int    | 原运款(分)
     * items[]['freight']     | int    | 运费(分)
     * items[]['createdDate'] | date | 订单日期
     * items[]['ifMerge']     | bool | 是否有可合并订单
     * items[]['productCount']| int  | 商品总件数
     * items[]['ifRefund']    | int  | 订单是否申请过退货退款 (1:有 0:没有)
     * items[]['goodsList']   | array | 商品列表
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
     * 11     | 买家申请退款
     * 12     | 买家申请退货退款
     * 13     | 等待买家退货
     * 14     | 等待我收退货
     * 15     | 我已拒绝退款
     * 16     | 我已拒绝退货
     *
     * @param int    $tab    订单筛选值  (0: 全部, 1: 待付款, 2: 待成团, 3: 待发货, 4: 待收货, 5: 待评价 6:退货退款)
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
     *             "orderSn": "1811370443",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 2,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524555994,
     *             "orderStatus": 8,
     *             "createdDate": "2018-04-24",
     *             "ifMerge": true,
     *             "productCount": 100,
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
     *             "orderSn": "1811370443",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 0,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524550065,
     *             "orderStatus": 7,
     *             "createdDate": "2018-04-24",
     *             "ifMerge": true,
     *             "productCount": 100,
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
    public function myAppletOrders(int $tab = 0, int $page = 1, int $limit = 20, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/sellerOrder', 'myAppletOrders', true, $tab, $page, $limit, $uidDTO);
    }

    /**
     * 我的小程序订单.
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
     * items[]['ordern']      | string | 订单编号
     * items[]['buyerName']   | string | 买家名
     * items[]['orderStatus'] | int    | 订单状态
     * items[]['orderAmount'] | int    | 实付(分)
     * items[]initGoodsAmount | int    | 原货款(分)
     * items[]initFreight     | int    | 原运款(分)
     * items[]['freight']     | int    | 运费(分)
     * items[]['createdDate'] | date | 订单日期
     * items[]['ifMerge']     | bool | 是否有可合并订单
     * items[]['productCount']| int  | 商品总件数
     * items[]['ifRefund']    | int  | 订单是否申请过退货退款 (1:有 0:没有)
     * items[]['goodsList']   | array | 商品列表
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
     * 11     | 买家申请退款
     * 12     | 买家申请退货退款
     * 13     | 等待买家退货
     * 14     | 等待我收退货
     * 15     | 我已拒绝退款
     * 16     | 我已拒绝退货
     *
     * @param int    $tab    订单筛选值  (0: 全部, 1: 待付款, 2: 待成团, 3: 待发货, 4: 待收货, 5: 待评价 6:退货退款)
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
     *             "orderSn": "1811370443",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 2,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524555994,
     *             "orderStatus": 8,
     *             "createdDate": "2018-04-24",
     *             "ifMerge": true,
     *             "productCount": 100,
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
     *             "orderSn": "1811370443",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 0,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524550065,
     *             "orderStatus": 7,
     *             "createdDate": "2018-04-24",
     *             "ifMerge": true,
     *             "productCount": 100,
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
    public function myAppletOrdersAsync(int $tab = 0, int $page = 1, int $limit = 20, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/sellerOrder', 'myAppletOrders', false, $tab, $page, $limit, $uidDTO);
    }

    /**
     * 搜索订单.
     *
     * > 返回数据参考[小程序订单列表](/order/sellerOrder/myAppletOrders)
     * 
     * @see myAppletOrders
     *
     * @param string $keywords 搜索的关键词
     * @param int    $tab    订单筛选值  (0: 全部, 1: 待付款, 2: 待成团, 3: 待发货, 4: 待收货, 5: 待评价)
     * @param int    $page   第几页
     * @param int    $limit  分页大小
     * @param UidDTO $uidDTO uid dto
     * @return array
     *
     * @author hehui<hehui@eelly.net>
     */
    public function searchMyAppletOrders(string $keywords, int $tab = 0, int $page = 1, int $limit = 20, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/sellerOrder', 'searchMyAppletOrders', true, $keywords, $tab, $page, $limit, $uidDTO);
    }

    /**
     * 搜索订单.
     *
     * > 返回数据参考[小程序订单列表](/order/sellerOrder/myAppletOrders)
     * 
     * @see myAppletOrders
     *
     * @param string $keywords 搜索的关键词
     * @param int    $tab    订单筛选值  (0: 全部, 1: 待付款, 2: 待成团, 3: 待发货, 4: 待收货, 5: 待评价)
     * @param int    $page   第几页
     * @param int    $limit  分页大小
     * @param UidDTO $uidDTO uid dto
     * @return array
     *
     * @author hehui<hehui@eelly.net>
     */
    public function searchMyAppletOrdersAsync(string $keywords, int $tab = 0, int $page = 1, int $limit = 20, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/sellerOrder', 'searchMyAppletOrders', false, $keywords, $tab, $page, $limit, $uidDTO);
    }

    /**
     * 获取我的订单统计信息(卖家).
     *
     * > 返回数据说明
     *
     * key                | type    | value
     * ------------------ | ------- | --------
     * all                | int     | 所有
     * needPay            | int     | 待付款
     * needShare          | int     | 待成团
     * needShipping       | int     | 待发货
     * needReceiving      | int     | 待收货
     * needReview         | int     | 待评价
     *
     * @param UidDTO|null $uidDTO uid dto(表示需要登录)
     *
     * @return array
     *
     * @returnExample(
     * {
     *     "all": "3",
     *     "needPay": 0,
     *     "needShare": 1,
     *     "needShipping": 1,
     *     "needReceiving": 0,
     *     "needReview": 0,
     *     "needRefund":2
     * }
     * )
     *
     * @author hehui<hehui@eelly.net>
     */
    public function myAppletOrderStats(UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/sellerOrder', 'myAppletOrderStats', true, $uidDTO);
    }

    /**
     * 获取我的订单统计信息(卖家).
     *
     * > 返回数据说明
     *
     * key                | type    | value
     * ------------------ | ------- | --------
     * all                | int     | 所有
     * needPay            | int     | 待付款
     * needShare          | int     | 待成团
     * needShipping       | int     | 待发货
     * needReceiving      | int     | 待收货
     * needReview         | int     | 待评价
     *
     * @param UidDTO|null $uidDTO uid dto(表示需要登录)
     *
     * @return array
     *
     * @returnExample(
     * {
     *     "all": "3",
     *     "needPay": 0,
     *     "needShare": 1,
     *     "needShipping": 1,
     *     "needReceiving": 0,
     *     "needReview": 0,
     *     "needRefund":2
     * }
     * )
     *
     * @author hehui<hehui@eelly.net>
     */
    public function myAppletOrderStatsAsync(UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/sellerOrder', 'myAppletOrderStats', false, $uidDTO);
    }

    /**
     * 小程序订单详情(卖家).
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
     * buyerName       | string   | 买家名称
     * orderAmount     | int      | 实收(分)
     * initGoodsAmount | int      | 原货款(分)
     * initFreight     | int      | 原运费(分)
     * freight         | int      | 运费(分)
     * discountAmount  | int      | 优惠金额(分)
     * changePrice     | int      | 改价(分)
     * orderSn         | string   | 订单号
     * createdDatetime | Datetime | 下单日期时间
     * payDatetime     | Datetime | 支付日期时间
     * shipDatetime    | Datetime | 发货日期时间
     * orderfrom       | string   | 订单来源
     * goodsCount      | int       | 商品款数
     * productCount    | int       | 商品总件数
     * extension       | int       | 订单业务标识：0 普通订单  1 团购订单
     * ifMerge         | bool      | 是否有可合并订单
     * ifRefund        | int       | 订单是否申请过退货退款 (1:有 0:没有)
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
     * 11     | 买家申请退款
     * 12     | 买家申请退货退款
     * 13     | 等待买家退货
     * 14     | 等待我收退货
     * 15     | 我已拒绝退款
     * 16     | 我已拒绝退货
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
     *     "buyerName": "juju12",
     *     "osId": "26",
     *     "orderAmount": "2",
     *     "payTime": "1524556066",
     *     "shipTime": "0",
     *     "freight": "1",
     *     "createdTime": 1524555994,
     *     "remark": "",
     *     "fromFlag": "0",
     *     "extension": "0",
     *     "likes": "2",
     *     "evaluation": null,
     *     "initGoodsAmount": "2",
     *     "discountAmount": "0",
     *     "initAmount": "0",
     *     "consignee": "蓝厨卫",
     *     "mobile": "11113131313",
     *     "regionName": "山西省 晋城市 沁水县",
     *     "address": "2222",
     *     "orderStatus": 8,
     *     "createdDatetime": "2018-04-24 07:46:34",
     *     "payDatetime": "2018-04-24 07:47:46",
     *     "shipDatetime": "1970-01-01 00:00:00",
     *     "changePrice": 1,
     *     "orderfrom": "未知",
     *     "goodsCount": 1,
     *     "productCount": 0,
     *     "ifMerge": true,
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
     *     ]
     * }
     * )
     *
     * @author hehui<hehui@eelly.net>
     */
    public function appletOrderDetail(int $orderId, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/sellerOrder', 'appletOrderDetail', true, $orderId, $uidDTO);
    }

    /**
     * 小程序订单详情(卖家).
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
     * buyerName       | string   | 买家名称
     * orderAmount     | int      | 实收(分)
     * initGoodsAmount | int      | 原货款(分)
     * initFreight     | int      | 原运费(分)
     * freight         | int      | 运费(分)
     * discountAmount  | int      | 优惠金额(分)
     * changePrice     | int      | 改价(分)
     * orderSn         | string   | 订单号
     * createdDatetime | Datetime | 下单日期时间
     * payDatetime     | Datetime | 支付日期时间
     * shipDatetime    | Datetime | 发货日期时间
     * orderfrom       | string   | 订单来源
     * goodsCount      | int       | 商品款数
     * productCount    | int       | 商品总件数
     * extension       | int       | 订单业务标识：0 普通订单  1 团购订单
     * ifMerge         | bool      | 是否有可合并订单
     * ifRefund        | int       | 订单是否申请过退货退款 (1:有 0:没有)
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
     * 11     | 买家申请退款
     * 12     | 买家申请退货退款
     * 13     | 等待买家退货
     * 14     | 等待我收退货
     * 15     | 我已拒绝退款
     * 16     | 我已拒绝退货
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
     *     "buyerName": "juju12",
     *     "osId": "26",
     *     "orderAmount": "2",
     *     "payTime": "1524556066",
     *     "shipTime": "0",
     *     "freight": "1",
     *     "createdTime": 1524555994,
     *     "remark": "",
     *     "fromFlag": "0",
     *     "extension": "0",
     *     "likes": "2",
     *     "evaluation": null,
     *     "initGoodsAmount": "2",
     *     "discountAmount": "0",
     *     "initAmount": "0",
     *     "consignee": "蓝厨卫",
     *     "mobile": "11113131313",
     *     "regionName": "山西省 晋城市 沁水县",
     *     "address": "2222",
     *     "orderStatus": 8,
     *     "createdDatetime": "2018-04-24 07:46:34",
     *     "payDatetime": "2018-04-24 07:47:46",
     *     "shipDatetime": "1970-01-01 00:00:00",
     *     "changePrice": 1,
     *     "orderfrom": "未知",
     *     "goodsCount": 1,
     *     "productCount": 0,
     *     "ifMerge": true,
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
     *     ]
     * }
     * )
     *
     * @author hehui<hehui@eelly.net>
     */
    public function appletOrderDetailAsync(int $orderId, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/sellerOrder', 'appletOrderDetail', false, $orderId, $uidDTO);
    }

    /**
     * 修改小程序订单价格.
     *
     * @param int         $orderId 订单id
     * @param int         $price   修改货款金额(分)
     * @param int         $freight 修改运费金额(分)
     * @param UidDTO|null $uidDTO  uid dto
     *
     * @return bool
     *
     * @author hehui<hehui@eelly.net>
     *
     * @requestExample({"orderId": 160, "price": 5000, "freight": 250})
     *
     * @returnExample(true)
     */
    public function changeAppletOrderPrice(int $orderId, int $price, int $freight, UidDTO $uidDTO = null): bool
    {
        return EellyClient::request('order/sellerOrder', 'changeAppletOrderPrice', true, $orderId, $price, $freight, $uidDTO);
    }

    /**
     * 修改小程序订单价格.
     *
     * @param int         $orderId 订单id
     * @param int         $price   修改货款金额(分)
     * @param int         $freight 修改运费金额(分)
     * @param UidDTO|null $uidDTO  uid dto
     *
     * @return bool
     *
     * @author hehui<hehui@eelly.net>
     *
     * @requestExample({"orderId": 160, "price": 5000, "freight": 250})
     *
     * @returnExample(true)
     */
    public function changeAppletOrderPriceAsync(int $orderId, int $price, int $freight, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/sellerOrder', 'changeAppletOrderPrice', false, $orderId, $price, $freight, $uidDTO);
    }

    /**
     * 获取合并订单列表.
     *
     * 通过订单id获取可合并的订单列表
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * [ ]orderId           |  int      | 订单id
     * [ ]orderStatus       |  int      | 订单状态
     * [ ]orderAmount       |  int      | 实收(分)
     * [ ]goodsList         | array     | 商品列表
     * [ ]goodsCount        | int       | 商品款数
     * [ ]productCount      | int       | 商品总件数
     * [ ]goodsList[]['goodsName']    | string | 商品名称
     * [ ]goodsList[]['price']        | int    | 商品价格(分)
     * [ ]goodsList[]['quantity']     | int    | 商品数量
     * [ ]goodsList[]['spec']         | string | 商品属性
     * [ ]goodsList[]['goodsImage']   | string | 商品图片
     *
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
     * 11     | 买家申请退款
     * 12     | 买家申请退货退款
     * 13     | 等待买家退货
     * 14     | 等待我收退货
     * 15     | 我已拒绝退款
     * 16     | 我已拒绝退货
     *
     * @param int         $orderId 订单id
     * @param UidDTO|null $uidDTO  uid dto
     *
     * @return array 订单列表
     *
     * @author hehui<hehui@eelly.net>
     *
     * @requestExample({"orderId": 160})
     *
     * @returnExample(
     * [
     *     {
     *         "orderId": "158",
     *         "orderSn": "1811323254",
     *         "refType": "0",
     *         "fromFlag": "0",
     *         "extension": "0",
     *         "batchNumber": "0",
     *         "chunkNumber": "0",
     *         "sellerId": "1762254",
     *         "sellerName": "莫琼小店",
     *         "buyerId": "148086",
     *         "buyerName": "juju12",
     *         "osId": "2",
     *         "payTime": "0",
     *         "shipTime": "0",
     *         "delayTime": "0",
     *         "frozenTime": "0",
     *         "finishedTime": "0",
     *         "orderAmount": "2",
     *         "freight": "1",
     *         "commission": "0",
     *         "returnFlag": "0",
     *         "evaluateFlag": "0",
     *         "deleteFlag": "0",
     *         "remark": "",
     *         "createdTime": 1524550060,
     *         "updateTime": "2018-04-27 22:58:41",
     *         "goodsList": [
     *             {
     *                 "ogId": "20000213",
     *                 "orderId": "158",
     *                 "goodsId": "1450168293",
     *                 "gsId": "195022196",
     *                 "price": "1",
     *                 "quantity": "2",
     *                 "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *                 "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *                 "goodsNumber": "2",
     *                 "spec": "颜色:如图色,尺码:均码",
     *                 "createdTime": "1524550060",
     *                 "updateTime": "2018-04-24 14:07:38"
     *             }
     *         ],
     *         "orderStatus": 2,
     *         "createdDate": "2018-04-24",
     *         "goodsCount": 1,
     *         "productCount": 2
     *     },
     *     {
     *         "orderId": "159",
     *         "orderSn": "1811345794",
     *         "refType": "0",
     *         "fromFlag": "0",
     *         "extension": "0",
     *         "batchNumber": "0",
     *         "chunkNumber": "0",
     *         "sellerId": "1762254",
     *         "sellerName": "莫琼小店",
     *         "buyerId": "148086",
     *         "buyerName": "juju12",
     *         "osId": "2",
     *         "payTime": "1524550141",
     *         "shipTime": "0",
     *         "delayTime": "0",
     *         "frozenTime": "0",
     *         "finishedTime": "0",
     *         "orderAmount": "2",
     *         "freight": "1",
     *         "commission": "0",
     *         "returnFlag": "0",
     *         "evaluateFlag": "0",
     *         "deleteFlag": "0",
     *         "remark": "",
     *         "createdTime": 1524550065,
     *         "updateTime": "2018-04-27 22:58:43",
     *         "goodsList": [
     *             {
     *                 "ogId": "20000214",
     *                 "orderId": "159",
     *                 "goodsId": "1450168293",
     *                 "gsId": "195022196",
     *                 "price": "1",
     *                 "quantity": "2",
     *                 "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *                 "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *                 "goodsNumber": "2",
     *                 "spec": "颜色:如图色,尺码:均码",
     *                 "createdTime": "1524550066",
     *                 "updateTime": "2018-04-24 14:07:43"
     *             }
     *         ],
     *         "orderStatus": 2,
     *         "createdDate": "2018-04-24",
     *         "goodsCount": 1,
     *         "productCount": 2
     *     }
     * ]
     * )
     */
    public function myAppletMergerOrders(int $orderId, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/sellerOrder', 'myAppletMergerOrders', true, $orderId, $uidDTO);
    }

    /**
     * 获取合并订单列表.
     *
     * 通过订单id获取可合并的订单列表
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * [ ]orderId           |  int      | 订单id
     * [ ]orderStatus       |  int      | 订单状态
     * [ ]orderAmount       |  int      | 实收(分)
     * [ ]goodsList         | array     | 商品列表
     * [ ]goodsCount        | int       | 商品款数
     * [ ]productCount      | int       | 商品总件数
     * [ ]goodsList[]['goodsName']    | string | 商品名称
     * [ ]goodsList[]['price']        | int    | 商品价格(分)
     * [ ]goodsList[]['quantity']     | int    | 商品数量
     * [ ]goodsList[]['spec']         | string | 商品属性
     * [ ]goodsList[]['goodsImage']   | string | 商品图片
     *
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
     * 11     | 买家申请退款
     * 12     | 买家申请退货退款
     * 13     | 等待买家退货
     * 14     | 等待我收退货
     * 15     | 我已拒绝退款
     * 16     | 我已拒绝退货
     *
     * @param int         $orderId 订单id
     * @param UidDTO|null $uidDTO  uid dto
     *
     * @return array 订单列表
     *
     * @author hehui<hehui@eelly.net>
     *
     * @requestExample({"orderId": 160})
     *
     * @returnExample(
     * [
     *     {
     *         "orderId": "158",
     *         "orderSn": "1811323254",
     *         "refType": "0",
     *         "fromFlag": "0",
     *         "extension": "0",
     *         "batchNumber": "0",
     *         "chunkNumber": "0",
     *         "sellerId": "1762254",
     *         "sellerName": "莫琼小店",
     *         "buyerId": "148086",
     *         "buyerName": "juju12",
     *         "osId": "2",
     *         "payTime": "0",
     *         "shipTime": "0",
     *         "delayTime": "0",
     *         "frozenTime": "0",
     *         "finishedTime": "0",
     *         "orderAmount": "2",
     *         "freight": "1",
     *         "commission": "0",
     *         "returnFlag": "0",
     *         "evaluateFlag": "0",
     *         "deleteFlag": "0",
     *         "remark": "",
     *         "createdTime": 1524550060,
     *         "updateTime": "2018-04-27 22:58:41",
     *         "goodsList": [
     *             {
     *                 "ogId": "20000213",
     *                 "orderId": "158",
     *                 "goodsId": "1450168293",
     *                 "gsId": "195022196",
     *                 "price": "1",
     *                 "quantity": "2",
     *                 "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *                 "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *                 "goodsNumber": "2",
     *                 "spec": "颜色:如图色,尺码:均码",
     *                 "createdTime": "1524550060",
     *                 "updateTime": "2018-04-24 14:07:38"
     *             }
     *         ],
     *         "orderStatus": 2,
     *         "createdDate": "2018-04-24",
     *         "goodsCount": 1,
     *         "productCount": 2
     *     },
     *     {
     *         "orderId": "159",
     *         "orderSn": "1811345794",
     *         "refType": "0",
     *         "fromFlag": "0",
     *         "extension": "0",
     *         "batchNumber": "0",
     *         "chunkNumber": "0",
     *         "sellerId": "1762254",
     *         "sellerName": "莫琼小店",
     *         "buyerId": "148086",
     *         "buyerName": "juju12",
     *         "osId": "2",
     *         "payTime": "1524550141",
     *         "shipTime": "0",
     *         "delayTime": "0",
     *         "frozenTime": "0",
     *         "finishedTime": "0",
     *         "orderAmount": "2",
     *         "freight": "1",
     *         "commission": "0",
     *         "returnFlag": "0",
     *         "evaluateFlag": "0",
     *         "deleteFlag": "0",
     *         "remark": "",
     *         "createdTime": 1524550065,
     *         "updateTime": "2018-04-27 22:58:43",
     *         "goodsList": [
     *             {
     *                 "ogId": "20000214",
     *                 "orderId": "159",
     *                 "goodsId": "1450168293",
     *                 "gsId": "195022196",
     *                 "price": "1",
     *                 "quantity": "2",
     *                 "goodsName": "【莫琼小店】 2018新款 针织衫\/毛衣  包邮",
     *                 "goodsImage": "https:\/\/img03.eelly.test\/G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *                 "goodsNumber": "2",
     *                 "spec": "颜色:如图色,尺码:均码",
     *                 "createdTime": "1524550066",
     *                 "updateTime": "2018-04-24 14:07:43"
     *             }
     *         ],
     *         "orderStatus": 2,
     *         "createdDate": "2018-04-24",
     *         "goodsCount": 1,
     *         "productCount": 2
     *     }
     * ]
     * )
     */
    public function myAppletMergerOrdersAsync(int $orderId, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/sellerOrder', 'myAppletMergerOrders', false, $orderId, $uidDTO);
    }

    /**             
     * 添加物流信息.
     * 
     * @param string $invoiceCode  送货编码：快递公司对应的拼音
     * @param string $invoiceName  送货公司名称
     * @param string $invoiceNo   送货单号
     * @param array $orderIds   订单id列表
     * @param UidDTO|null $uidDTO    uid dto
     * @return bool
     * @author hehui<hehui@eelly.net>
     */
    public function updateLogisticsInfo(string $invoiceCode, string $invoiceName, string $invoiceNo, array $orderIds, UidDTO $uidDTO = null): bool
    {
        return EellyClient::request('order/sellerOrder', 'updateLogisticsInfo', true, $invoiceCode, $invoiceName, $invoiceNo, $orderIds, $uidDTO);
    }

    /**             
     * 添加物流信息.
     * 
     * @param string $invoiceCode  送货编码：快递公司对应的拼音
     * @param string $invoiceName  送货公司名称
     * @param string $invoiceNo   送货单号
     * @param array $orderIds   订单id列表
     * @param UidDTO|null $uidDTO    uid dto
     * @return bool
     * @author hehui<hehui@eelly.net>
     */
    public function updateLogisticsInfoAsync(string $invoiceCode, string $invoiceName, string $invoiceNo, array $orderIds, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/sellerOrder', 'updateLogisticsInfo', false, $invoiceCode, $invoiceName, $invoiceNo, $orderIds, $uidDTO);
    }

    /**
     * 获取直播时间段的订单数据.
     * 
     * 
     * @param int $startTime 直播开始时间戳
     * @param int $endTime直播结束时间戳
     * @param int $sellerId 卖家id
     * @param int $type 类型 ( 1 待付款 2 已付款 )
     * @return array
     * @author hehui<hehui@eelly.net>
     */
    public function listLiveOrdersByTimes(int $startTime, int $endTime, int $sellerId, int $type): array
    {
        return EellyClient::request('order/sellerOrder', 'listLiveOrdersByTimes', true, $startTime, $endTime, $sellerId, $type);
    }

    /**
     * 获取直播时间段的订单数据.
     * 
     * 
     * @param int $startTime 直播开始时间戳
     * @param int $endTime直播结束时间戳
     * @param int $sellerId 卖家id
     * @param int $type 类型 ( 1 待付款 2 已付款 )
     * @return array
     * @author hehui<hehui@eelly.net>
     */
    public function listLiveOrdersByTimesAsync(int $startTime, int $endTime, int $sellerId, int $type)
    {
        return EellyClient::request('order/sellerOrder', 'listLiveOrdersByTimes', false, $startTime, $endTime, $sellerId, $type);
    }

    /**
     * 获取店铺列表某种状态下的订单数量
     *
     * @param int    $tab    订单筛选值  (0: 全部, 1: 待付款, 2: 待成团, 3: 待发货, 4: 待收货, 5: 待评价)
     * @param int    $page   第几页
     * @param int    $limit  分页大小
     *
     * @return array
     * @requestExample({"tab":1, "page":2, "limit":10})
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
     *     "items":[{"sellerId":148086,"num":10}, {"sellerId":2108400,"num":1}]
     * })
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.05.16
     */
    public function listStoreOrdersNum(int $tab = 0, int $page = 1, int $limit = 20): array
    {
        return EellyClient::request('order/sellerOrder', 'listStoreOrdersNum', true, $tab, $page, $limit);
    }

    /**
     * 获取店铺列表某种状态下的订单数量
     *
     * @param int    $tab    订单筛选值  (0: 全部, 1: 待付款, 2: 待成团, 3: 待发货, 4: 待收货, 5: 待评价)
     * @param int    $page   第几页
     * @param int    $limit  分页大小
     *
     * @return array
     * @requestExample({"tab":1, "page":2, "limit":10})
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
     *     "items":[{"sellerId":148086,"num":10}, {"sellerId":2108400,"num":1}]
     * })
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.05.16
     */
    public function listStoreOrdersNumAsync(int $tab = 0, int $page = 1, int $limit = 20)
    {
        return EellyClient::request('order/sellerOrder', 'listStoreOrdersNum', false, $tab, $page, $limit);
    }

    /**
     * 获取没有发送待付款订单消息的订单
     *
     * @param int    $page   第几页
     * @param int    $limit  分页大小
     *
     * @return array
     * @requestExample({"tab":1, "page":2, "limit":10})
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
     *     "items":[{"orderId":5000214,"createdTime":1526292190,"goodsName":"test","buyerId":148086}, {"orderId":5000215,"createdTime":1526292190,"goodsName":"demo","buyerId":148086}]
     * })
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.05.18
     */
    public function listPendingPaymentOrderMessage(int $page, int $limit): array
    {
        return EellyClient::request('order/sellerOrder', 'listPendingPaymentOrderMessage', true, $page, $limit);
    }

    /**
     * 获取没有发送待付款订单消息的订单
     *
     * @param int    $page   第几页
     * @param int    $limit  分页大小
     *
     * @return array
     * @requestExample({"tab":1, "page":2, "limit":10})
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
     *     "items":[{"orderId":5000214,"createdTime":1526292190,"goodsName":"test","buyerId":148086}, {"orderId":5000215,"createdTime":1526292190,"goodsName":"demo","buyerId":148086}]
     * })
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.05.18
     */
    public function listPendingPaymentOrderMessageAsync(int $page, int $limit)
    {
        return EellyClient::request('order/sellerOrder', 'listPendingPaymentOrderMessage', false, $page, $limit);
    }

    /**
     * 根据传过来的订单ID，返回要发送消息相关数据
     *
     * @param int $orderId  订单id
     * @return array
     * @requestExample({"orderId":1})
     * @returnExample({"orderId":1,"orderSn":"1813401984","payTime":1526381614,"goodsName":"test","orderAmount":100,"buyerId":148086,"shipTime":1526381614,"invoiceName":"EMS"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.05.19
     */
    public function getOrderMessageInfo(int $orderId): array
    {
        return EellyClient::request('order/sellerOrder', 'getOrderMessageInfo', true, $orderId);
    }

    /**
     * 根据传过来的订单ID，返回要发送消息相关数据
     *
     * @param int $orderId  订单id
     * @return array
     * @requestExample({"orderId":1})
     * @returnExample({"orderId":1,"orderSn":"1813401984","payTime":1526381614,"goodsName":"test","orderAmount":100,"buyerId":148086,"shipTime":1526381614,"invoiceName":"EMS"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.05.19
     */
    public function getOrderMessageInfoAsync(int $orderId)
    {
        return EellyClient::request('order/sellerOrder', 'getOrderMessageInfo', false, $orderId);
    }

    /**
     * 我的小程序订单.
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
     * items[]['ordern']      | string | 订单编号
     * items[]['buyerName']   | string | 买家名
     * items[]['orderStatus'] | int    | 订单状态
     * items[]['orderAmount'] | int    | 实付(分)
     * items[]initGoodsAmount | int    | 原货款(分)
     * items[]initFreight     | int    | 原运款(分)
     * items[]['freight']     | int    | 运费(分)
     * items[]['createdDate'] | date | 订单日期
     * items[]['ifMerge']     | bool | 是否有可合并订单
     * items[]['productCount']| int  | 商品总件数
     * items[]['ifRefund']    | int  | 订单是否申请过退货退款 (1:有 0:没有)
     * items[]['goodsList']   | array | 商品列表
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
     * 11     | 买家申请退款
     * 12     | 买家申请退货退款
     * 13     | 等待买家退货
     * 14     | 等待我收退货
     * 15     | 我已拒绝退款
     * 16     | 我已拒绝退货
     *
     * @param int    $tab    订单筛选值  (0: 全部, 1: 待付款, 2: 待成团, 3: 待发货, 4: 待收货, 5: 待评价 6:退货退款)
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
     *             "orderSn": "1811370443",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 2,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524555994,
     *             "orderStatus": 8,
     *             "createdDate": "2018-04-24",
     *             "ifMerge": true,
     *             "productCount": 100,
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
     *             "orderSn": "1811370443",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 0,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524550065,
     *             "orderStatus": 7,
     *             "createdDate": "2018-04-24",
     *             "ifMerge": true,
     *             "productCount": 100,
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
    public function searchMyAppletWaybillOrders(string $keywords = '', int $tab = 0, int $page = 1, int $limit = 20, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/sellerOrder', 'searchMyAppletWaybillOrders', true, $keywords, $tab, $page, $limit, $uidDTO);
    }

    /**
     * 我的小程序订单.
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
     * items[]['ordern']      | string | 订单编号
     * items[]['buyerName']   | string | 买家名
     * items[]['orderStatus'] | int    | 订单状态
     * items[]['orderAmount'] | int    | 实付(分)
     * items[]initGoodsAmount | int    | 原货款(分)
     * items[]initFreight     | int    | 原运款(分)
     * items[]['freight']     | int    | 运费(分)
     * items[]['createdDate'] | date | 订单日期
     * items[]['ifMerge']     | bool | 是否有可合并订单
     * items[]['productCount']| int  | 商品总件数
     * items[]['ifRefund']    | int  | 订单是否申请过退货退款 (1:有 0:没有)
     * items[]['goodsList']   | array | 商品列表
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
     * 11     | 买家申请退款
     * 12     | 买家申请退货退款
     * 13     | 等待买家退货
     * 14     | 等待我收退货
     * 15     | 我已拒绝退款
     * 16     | 我已拒绝退货
     *
     * @param int    $tab    订单筛选值  (0: 全部, 1: 待付款, 2: 待成团, 3: 待发货, 4: 待收货, 5: 待评价 6:退货退款)
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
     *             "orderSn": "1811370443",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 2,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524555994,
     *             "orderStatus": 8,
     *             "createdDate": "2018-04-24",
     *             "ifMerge": true,
     *             "productCount": 100,
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
     *             "orderSn": "1811370443",
     *             "sellerName": "莫琼小店",
     *             "osId": "26",
     *             "likes": 0,
     *             "evaluation": null,
     *             "orderAmount": "2",
     *             "freight": "1",
     *             "createdTime": 1524550065,
     *             "orderStatus": 7,
     *             "createdDate": "2018-04-24",
     *             "ifMerge": true,
     *             "productCount": 100,
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
    public function searchMyAppletWaybillOrdersAsync(string $keywords = '', int $tab = 0, int $page = 1, int $limit = 20, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/sellerOrder', 'searchMyAppletWaybillOrders', false, $keywords, $tab, $page, $limit, $uidDTO);
    }

    /**
     * 获取等待结算订单金额(等待结算：包含等待卖家发货、等待买家收货、集赞中待分享、集赞成功等待发货、退货退款中)
     * 
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * sum | int  |  等待结算订单金额 
     * 
     * @param int $storeId 店铺id
     * @return int
     * 
     * @author wechan
     * @since 2018年
     */
    public function getWaitingSettlementOrderMoney(int $storeId): array
    {
        return EellyClient::request('order/sellerOrder', 'getWaitingSettlementOrderMoney', true, $storeId);
    }

    /**
     * 获取等待结算订单金额(等待结算：包含等待卖家发货、等待买家收货、集赞中待分享、集赞成功等待发货、退货退款中)
     * 
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * sum | int  |  等待结算订单金额 
     * 
     * @param int $storeId 店铺id
     * @return int
     * 
     * @author wechan
     * @since 2018年
     */
    public function getWaitingSettlementOrderMoneyAsync(int $storeId)
    {
        return EellyClient::request('order/sellerOrder', 'getWaitingSettlementOrderMoney', false, $storeId);
    }

    /**
     * 统计卖家小程序订单数
     * 
     * > 返回数据说明
     * @returnExample(1)
     * 
     * @param int $storeId 店铺id
     * @return int
     * 
     * @author wechan
     * @since 2018年
     */
    public function getappletOrderCount(int $storeId): int
    {
        return EellyClient::request('order/sellerOrder', 'getappletOrderCount', true, $storeId);
    }

    /**
     * 统计卖家小程序订单数
     * 
     * > 返回数据说明
     * @returnExample(1)
     * 
     * @param int $storeId 店铺id
     * @return int
     * 
     * @author wechan
     * @since 2018年
     */
    public function getappletOrderCountAsync(int $storeId)
    {
        return EellyClient::request('order/sellerOrder', 'getappletOrderCount', false, $storeId);
    }

    /**
     * 根据订单id，获取订单相关信息.
     *
     * @param int $orderId 订单id
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return array
     * @requestExample({"orderId":5000214})
     * @returnExample({"orderId":5000214,"orderSn":1813399100,"sellerId":148086,"buyerId":1762254,"buyerName":"test","orderAmount":1400,"created_time":1526292190})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.28
     */
    public function getOrderData(int $orderId): array
    {
        return EellyClient::request('order/sellerOrder', 'getOrderData', true, $orderId);
    }

    /**
     * 根据订单id，获取订单相关信息.
     *
     * @param int $orderId 订单id
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return array
     * @requestExample({"orderId":5000214})
     * @returnExample({"orderId":5000214,"orderSn":1813399100,"sellerId":148086,"buyerId":1762254,"buyerName":"test","orderAmount":1400,"created_time":1526292190})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.28
     */
    public function getOrderDataAsync(int $orderId)
    {
        return EellyClient::request('order/sellerOrder', 'getOrderData', false, $orderId);
    }

    /**
     * 退货退款详情页
     *
     * @param int $orderId 订单id
     * @return array
     * @throws \Eelly\SDK\Order\Exception\OrderException
     * @requestExample({"orderId":5000020})
     * @returnExample({"orderId":"5000020","orderSn":"1812374549","buyerId":"2108403","buyerName":"\u5927\u5e08\u5085\u58eb\u5927\u592b\uff08yl_jn003778\uff09","applyAmount":"11","applyFreight":"0","refundType":"\u4ec5\u9000\u6b3e","refundReason":"\u5176\u4ed6","remark":"","certificate":"","createdTime":"1525780044","refundStatus":"\u7533\u8bf7\u9000\u6b3e\u4e2d","firstTime":"2018-05-08 19:47","newTime":"2018-06-06 13:38"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.06.22
     */
    public function orderRefundDetail(int $orderId): array
    {
        return EellyClient::request('order/sellerOrder', 'orderRefundDetail', true, $orderId);
    }

    /**
     * 退货退款详情页
     *
     * @param int $orderId 订单id
     * @return array
     * @throws \Eelly\SDK\Order\Exception\OrderException
     * @requestExample({"orderId":5000020})
     * @returnExample({"orderId":"5000020","orderSn":"1812374549","buyerId":"2108403","buyerName":"\u5927\u5e08\u5085\u58eb\u5927\u592b\uff08yl_jn003778\uff09","applyAmount":"11","applyFreight":"0","refundType":"\u4ec5\u9000\u6b3e","refundReason":"\u5176\u4ed6","remark":"","certificate":"","createdTime":"1525780044","refundStatus":"\u7533\u8bf7\u9000\u6b3e\u4e2d","firstTime":"2018-05-08 19:47","newTime":"2018-06-06 13:38"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.06.22
     */
    public function orderRefundDetailAsync(int $orderId)
    {
        return EellyClient::request('order/sellerOrder', 'orderRefundDetail', false, $orderId);
    }

    /**
     * 获取退款页面相关数据
     *
     * @param int $orderId 订单id
     * @return array
     * @throws \Eelly\SDK\Order\Exception\OrderException
     * @requestExample({"orderId":5000020})
     * @returnExample({"orderAmount":"400","freight":"1","applyAmount":"11"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.06.27
     */
    public function getRefundMoneyInfo(int $orderId): array
    {
        return EellyClient::request('order/sellerOrder', 'getRefundMoneyInfo', true, $orderId);
    }

    /**
     * 获取退款页面相关数据
     *
     * @param int $orderId 订单id
     * @return array
     * @throws \Eelly\SDK\Order\Exception\OrderException
     * @requestExample({"orderId":5000020})
     * @returnExample({"orderAmount":"400","freight":"1","applyAmount":"11"})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.06.27
     */
    public function getRefundMoneyInfoAsync(int $orderId)
    {
        return EellyClient::request('order/sellerOrder', 'getRefundMoneyInfo', false, $orderId);
    }

    /**
     * 卖家取消订单
     *
     * @param integer $orderId 订单id
     * @return boolean
     * 
     * @requestExample({"orderId":5000999})
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.7.3
     */
    public function cancelOrder(int $orderId): bool
    {
        return EellyClient::request('order/sellerOrder', 'cancelOrder', true, $orderId);
    }

    /**
     * 卖家取消订单
     *
     * @param integer $orderId 订单id
     * @return boolean
     * 
     * @requestExample({"orderId":5000999})
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.7.3
     */
    public function cancelOrderAsync(int $orderId)
    {
        return EellyClient::request('order/sellerOrder', 'cancelOrder', false, $orderId);
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