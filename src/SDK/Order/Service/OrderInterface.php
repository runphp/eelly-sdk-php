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

namespace Eelly\SDK\Order\Service;

use Eelly\DTO\UidDTO;

/**
 * 订单.
 *
 * @author wangjiang<wangjiang@eelly.net>
 */
interface OrderInterface
{
    /**
     * 新增订单
     * 新增订单信息.
     *
     * @param array             $orderData                  订单数据
     * @param int               $orderData["0"]["storeId"]  店铺id
     * @param array             $orderData["0"]["goodsIds"] 商品数据
     * @param int               $addrId                     用户地址id
     * @param \Eelly\DTO\UidDTO $user                       登录用户信息
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return bool 新增结果
     * @requestExample({
     *     "orderData":[
     *         {
     *             "storeId":1,
     *             "goodsIds":[1, 2, 3]
     *         }
     *     ],
     *     "addrId":3
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function addOrder(array $orderData, int $addrId, UidDTO $user = null): bool;

    /**
     * 修改订单
     * 修改订单信息.
     *
     * @param array             $orderData                订单数据
     * @param int               $orderData["orderId"]     订单id
     * @param int               $orderData["updateType"]  修改类型 1修改订单金额 2修改订单运费
     * @param int               $orderData["updateValue"] 修改的值
     * @param \Eelly\DTO\UidDTO $user                     登录用户信息
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return bool 修改结果
     * @requestExample({
     *     "orderData":{
     *         "orderId":1,
     *         "updateType":1,
     *         "updateValue":12
     *     }
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function updateOrder(array $orderData, UidDTO $user = null): bool;

    /**
     * 删除订单
     * 删除订单.
     *
     * @param int               $orderId 订单id
     * @param \Eelly\DTO\UidDTO $user    登录用户信息
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return bool 删除结果
     * @requestExample({
     *     "orderId":1
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function deleteOrder(int $orderId, UidDTO $user = null): bool;

    /**
     * 获取订单信息
     * 获取订单信息.
     *
     * @param int $orderId 订单id
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return array 订单信息
     * @requestExample({
     *     "orderId":1
     * })
     * @returnExample({
     *     "orderId":1,
     *     "orderSn":"xxxxxxx",
     *     "orderAmount":123,
     *     "freight":123,
     *     "commission":0,
     *     "discountAmount":0,
     *     "logisticsName":"配送方式",
     *     "createdTime":"1970-01-01 01:01:01",
     *     "sellerInfo":{
     *         "storeName":"店铺名称",
     *         "sellerName":"卖家名称",
     *         "phone":"13xxxxxxxx"
     *     },
     *     "buyerInfo":{
     *         "nickname":"买家昵称",
     *         "consignee":"收货人",
     *         "address":"收货地址",
     *         "phone":"13xxxxxxxx"
     *     },
     *     "goodsInfo":[
     *         {
     *             "goodsId":1,
     *             "goodsImage":"http://image.eelly.test/abc.jpg",
     *             "goodsName":"商品名称",
     *             "goodsNumber":"货号",
     *             "singlePrice":"123",
     *             "specInfo":[
     *                 {
     *                     "color":"颜色",
     *                     "size":"尺码",
     *                     "price":123,
     *                     "quantity":1
     *                 }
     *             ],
     *             "goodsCount":2,
     *             "totalPrice":10.00
     *         }
     *     ]
     * })
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function getOrderInfo(int $orderId): array;

    /**
     * 校验是否能否能快速支付.
     *
     * @param int $orderId 订单ID
     *
     * @return bool 能返回true,不能返回false
     * @requestExample({"orderId":5000001})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年01月05日
     * @Validation(
     * @OperatorValidator(0, {message:"非法的订单id",operator:[gt,0]})
     * )
     */
    public function checkIsFast(int $orderId): bool;

    /**
     * 更新订单标识.
     *
     * @param int $orderId   订单ID
     * @param int $extension 订单标识：0 普通订单 1 分销订单 2 包销订单(买家) 4 自营订单 8 云店订单 16 厂+订单 32 省邮区订单 64 包销期订单(卖家) 128 即时到帐订单（支付成功立即结算卖家）
     *
     * @return bool
     * @requestExample({"orderId":5000001,"extension":128})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年01月05日
     * @Validation(
     * @OperatorValidator(0, {message:"非法的订单id",operator:[gt,0]}),
     * @OperatorValidator(1, {message:"非法的订单标识",operator:[gte,0]})
     * )
     */
    public function updateOrderExtension(int $orderId, int $extension = 0): bool;

    /**
     * 添加询价下单记录.
     *
     * @param array  $data               询价下单数据
     * @param int    $data['refType']    订单类型标识：0 店铺商品订单 1 询价商品订单
     * @param int    $data['sellerId']   卖家id
     * @param string $data['sellerName'] 卖家名称
     * @param int    $data['buyerId']    买家id
     * @param string $data['buyerName']  买家名称
     * @param int    $data['extension']  订单标识：0 普通订单 1 分销订单 2 包销订单(买家) 4 自营订单 8 云店订单 16 厂+订单 32 省邮区订单 64 包销期订单(卖家) 128 即时到帐订单（支付成功立即结算卖家）
     * @param int    $data['freight']    订单运费
     * @param int    $data['fromFlag']   订单来源
     * @param string $data['remark']     备注
     *
     * @return bool
     *
     * @requestExample({
     *     "refType":3,
     *     "sellerId":148086,
     *     "sellerName":"molimoq",
     *     "buyerId":1234,
     *     "buyerName":"buyer",
     *     "extension" :0,
     *     "freight" : 10,
     *     "fromFlag":3,
     *     "remark":""
     * })
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.01.08
     */
    public function addEnquiryOrder(array $data): int;

    /**
     * 获取物流信息.
     *
     * @param string $trackingNo 物流好
     * @param string $express    物流公司
     *
     * @return bool
     * @requestExample({"trackingNo":"1202516745301","express":"auto"})
     * @returnExample({{
     *  "number": "1202237859178",
     *  "type": "YUNDA",
     *  "name": "韵达",
     *  "letter": "Y",
     *  "tel": "95546",
     * "list": [{
     *     "time": "2017-01-07 16:05:38",
     *    "status": "湖南省炎陵县公司快件已被 已签收 签收"
     *  },
     *  {
     *  "time": "2017-01-07 16:02:43",
     *  "status": "湖南省炎陵县公司快件已被 已签收 签收"
     *  }],
     * "deliverystatus": "3",
     * "issign": "1"
     * }})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年04月09日
     * @Validation(
     * @PresenceOf(0, {message:"非法的物流号"})
     * )
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ---------------|-------|--------------
     * number         |string |订单号
     * type           |string |要查询的快递公司代码
     * name           |string |物流公司名称
     * letter         |string |
     * tel            |string |电话号码
     * list           |array  |物流动态
     * list["time"]   |string |动态时间
     * list["status"] |string |动态状态
     * deliverystatus |string |快递单当前的状态
     * 0：在途，即货物处于运输过程中；
     * 1：揽件，货物已由快递公司揽收并且产生了第一条跟踪信息；
     * 2：疑难，货物寄送过程出了问题；
     * 3：签收，收件人已签收；
     * 4：退签，即货物由于用户拒签、超区等原因退回，而且发件人已经签收；
     * 5：派件，即快递正在进行同城派件；
     * 6：退回，货物正处于退回发件人的途中；
     * issign         |string |
     */
    public function getExpressByTrackingNo(string $trackingNo, string $express = 'auto'): array;

    /**
     * 新增订单和发起支付.
     *
     * @param array $orderData 订单信息
     * @param array $userInfo 用户信息
     * @param array $memoInfo 额外信息
     * @requestExample({
     * "orderData":[
     * {
     * "storeId":1,
     * "goodsIds":[1, 2]
     * }
     * ],
     * "addrId":3
     * })
     * @returnExample(true)
     * @return array
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年04月19日
     */
    public function addMallOrderAndPay(array $orderData, array $userInfo, array $memoInfo = []): array;


    /**
     * 校验订单是否完成.
     *
     * @param array $orderSns 订单号
     * @param string $billNo 交易号
     * @return array
     * @requestExample({"orderSns":[1810833729,1810818814],"billNo":"1711114252646cvAcu"})
     * @returnExample([1,2,3])
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年04月19日
     */
    public function checkOrderIsPayed(array $orderSns, string $billNo = ''): array;

    /**
     * 回调订单支付.
     *
     * @param string $billNo 衣联交易号
     * @requestExample({"billNo":"1711114177786cvA2s"})
     * @returnExample(true)
     * @return bool
     *
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月05日
     * @Validation(
     * @PresenceOf(0,{message:"数据不能为空"})
     * )
     */
    public function setOrderPay(string $billNo): bool ;

    /**
     * 需要自动结算货款.
     *
     * @return array
     * @requestExample()
     * @returnExample([{"orderId":"116","orderSn":"1810837219","sellerId":"1762613","buyerId":"2108403","payTime":"1524130597","orderAmount":"19800","freight":"1","commission":"0","applyAmount":null,"returnAmount":null,"applyFreight":null,"returnFreight":null}])
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年05月05日
     */
    public function getNeedConfirmedList(): array;

    /**
     * 自动确认成功.
     *
     * @param int $orderId 订单ID
     *
     * @return bool
     * @requestExample({"orderId":116})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月05日
     */
    public function operateFinishOrder(int $orderId): bool;

    /**
     * 订单存在的情况下发起的支付.
     *
     * @param array $orderSns 多个订单Id
     * @param string $openId 微信唯一标识
     * @return array
     * @requestExample({"orderSns":[1810802172,1810892762]})
     * @returnExample({"platform":"wechatPayJs","billNo":"1804206f3430600Gbl","data":{"appId":"wx4570a3e7921ad847","package":"prepay_id=wx20092504076787ea261301530251393671","nonceStr":"ce40cc6e4eb37b4c6a5aed1af2bb0274","timeStamp":"1524187504","signType":"MD5","paySign":"079FC612EDF4E4D589334F41F15616C2"},"orderSn":[1810802172,1810892762]})
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年04月20日
     */
    public function orderGoPay(array $orderSns, $type = 'wxSmall', $openId = ''): array;

    /**
     * 根据订单id，获取订单相关信息
     *
     * @param int $orderId 订单id
     * @return array
     * @throws \Eelly\SDK\Order\Exception\OrderException
     * @requestExample({"orderId":5000214})
     * @returnExample({"orderId":5000214,"orderSn":1813399100,"sellerId":148086,"buyerId":1762254,"buyerName":"test","orderAmount":1400,"created_time":1526292190})
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.05.15
     */
    public function getOrderData(int $orderId):array;

    /**
     * 根据传过来的订单ID跟值，更新消息通知标识的值
     *
     * @param int $orderId 订单id
     * @param int $noticeFlag 消息通知标识的值
     * @return bool
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.05.18
     */
    public function updateOrderNoticeFlag(int $orderId, int $noticeFlag):bool;

    /**
     * 获取管理后台的数据列表.
     *
     * @param array $data 查询条件
     * @param int $page  第几页
     * @param int $limit 查询条数
     * @param string $orderBy
     * @return array
     * @requestExample({"data":["storeId":148086,"extension":1]})
     * @returnExample({
     *   "items": [
     *       {
     *           "orderId": "5000205",
     *           "orderSn": "1813016929",
     *           "extension": "0",
     *           "batchNumber": "0",
     *           "chunkNumber": "0",
     *           "sellerId": "148086",
     *           "sellerName": "莫琼小店",
     *           "buyerId": "2108403",
     *           "buyerName": "yl_jn003778(yl_jn003778)",
     *           "osId": "15",
     *           "payTime": "0",
     *           "shipTime": "0",
     *           "delayTime": "0",
     *           "frozenTime": "0",
     *           "finishedTime": "0",
     *           "orderAmount": "4800",
     *           "freight": "1800",
     *           "commission": "0",
     *           "returnFlag": "0",
     *           "evaluateFlag": "0",
     *           "deleteFlag": "0",
     *           "fromFlag": "3",
     *           "createdTime": "1526024934",
     *           "updateTime": "2018-05-15 20:28:59"
     *       },
     *       {
     *           "orderId": "5000204",
     *           "orderSn": "1813035805",
     *           "extension": "0",
     *           "batchNumber": "0",
     *           "chunkNumber": "0",
     *           "sellerId": "148086",
     *           "sellerName": "莫琼小店",
     *           "buyerId": "2108403",
     *           "buyerName": "yl_jn003778(yl_jn003778)",
     *           "osId": "15",
     *           "payTime": "0",
     *           "shipTime": "0",
     *           "delayTime": "259200",
     *           "frozenTime": "0",
     *           "finishedTime": "0",
     *           "orderAmount": "3800",
     *           "freight": "1100",
     *           "commission": "0",
     *           "returnFlag": "0",
     *           "evaluateFlag": "0",
     *           "deleteFlag": "0",
     *           "fromFlag": "3",
     *           "createdTime": "1526024871",
     *           "updateTime": "2018-05-15 20:28:59"
     *       }
     *   ],
     *   "page": {
     *       "totalPages": 54,
     *       "totalItems": 107,
     *       "current": 1,
     *       "limit": 2
     *   }
     * })
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年05月15日
     */
    public function getManageOrder(array $data, int $page = 1, int $limit = 10, string $orderBy = 'created_time DESC'): array;

    /**
     * 获取管理后台统计数据.
     * @param array $data 查询条件
     * @return array
     * @requestExample({"data":["storeId":148086,"extension":1]})
     * @returnExample({
     *   "total": "36808",
     *   "totalAmount": "716691664",
     *   "totalGoods": "896767",
     *   "totalReturnAmount": "554528",
     *   "spillCount": "0",
     *   "spillAmount": "0",
     *   "spillGoods": "0",
     *   "spillReturnAmount": "0"
     * })
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年05月15日
     */
    public function getManageOrderStat(array $data): array;

    /**
     * 获取订单详情.
     *
     * @param int $orderId 订单ID
     * @return array
     * @requestExample({"orderId":161})
     * @returnExample({
     *  "orderId": "161",
     *  "orderSn": "1811635308",
     *  "orderAmount": "2",
     *  "remark": "",
     *  "createdTime": "1524830823",
     *  "payTime": "0",
     *  "buyerId": "2108403",
     *  "freight": "1",
     *  "osId": "15",
     *  "extension": "0",
     *  "finishedTime": "0",
     *  "buyerName": "juju12",
     *  "sellerName": "莫琼小店",
     *  "regionName": "山西省 晋城市 沁水县",
     *  "address": "2222",
     *  "invoiceNo": "",
     *  "consignee": "蓝厨卫",
     *  "mobile": "11113131313",
     *  "invoiceName": "",
     *  "returnAmount": null,
     *  "likeTime": "1524899508",
     *  "goodsList": [
     *      {
     *          "ogId": "20000216",
     *          "orderId": "161",
     *          "goodsId": "1450168344",
     *          "gsId": "195022196",
     *          "price": "1",
     *          "quantity": "2",
     *          "goodsName": "【莫琼小店】 2018新款 针织衫/毛衣  包邮",
     *          "goodsImage": "https://img01.eelly.test/G02/M00/00/03/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *          "goodsNumber": "2",
     *          "spec": "颜色:如图色,尺码:均码",
     *          "createdTime": "1524830823",
     *          "updateTime": "2018-05-02 15:17:18"
     *      },
     *      {
     *          "ogId": "20000472",
     *          "orderId": "161",
     *          "goodsId": "1450168344",
     *          "gsId": "195022196",
     *          "price": "1",
     *          "quantity": "2",
     *          "goodsName": "【莫琼小店】 2018新款 针织衫/毛衣  包邮",
     *          "goodsImage": "https://img01.eelly.test/G02/M00/00/03/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *          "goodsNumber": "2",
     *          "spec": "颜色:如图色,尺码:均码",
     *          "createdTime": "1524830823",
     *          "updateTime": "2018-05-02 15:17:18"
     *      },
     *      {
     *          "ogId": "20000473",
     *          "orderId": "161",
     *          "goodsId": "1450168344",
     *          "gsId": "195022196",
     *          "price": "1",
     *          "quantity": "2",
     *          "goodsName": "【莫琼小店】 2018新款 针织衫/毛衣  包邮",
     *          "goodsImage": "https://img01.eelly.test/G02/M00/00/03/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *          "goodsNumber": "2",
     *          "spec": "颜色:如图色,尺码:均码",
     *          "createdTime": "1524830823",
     *          "updateTime": "2018-05-02 15:17:18"
     *      }
     *  ],
     *"orderLog": [
     *  {
     *      "olId": "428",
     *      "orderId": "161",
     *      "type": "0",
     *      "handleId": "0",
     *      "handleName": "系统管理员",
     *      "fromOsId": "2",
     *      "toOsId": "15",
     *      "remark": "买家24小时内未支付",
     *      "createdTime": "1525851517",
     *      "updateTime": "2018-05-09 15:38:32"
     *  },
     *  {
     *      "olId": "162",
     *      "orderId": "161",
     *      "type": "0",
     *      "handleId": "0",
     *      "handleName": "",
     *      "fromOsId": "0",
     *      "toOsId": "1",
     *      "remark": "新下单",
     *      "createdTime": "1524830823",
     *      "updateTime": "2018-04-27 20:06:57"
     *  }
     * ]
     *})
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年05月17日
     */
    public function getManageOderInfo(int $orderId): array;

    /**
     * 获取店铺的成交订单数，下单就算成交一笔，取消的订单也算入成交数,由商城迁移过来的.
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * --------------------|-------|--------------
     * 148086              |array  |列表下标
     * 148086["sellerId"]  |string |店铺ID
     * 148086["addNum"]    |string |下单数
     * 148086["addAmount"] |string |下单金额
     * 148086["payAmount"] |string |支付金额
     * 148086["payNum"]    |string |支付数
     *
     *
     * @param array $storeIds  店铺id数组
     * @param int   $startTime 开始时间
     * @param int   $endTime   结束时间
     *
     * @requestExample({"storeIds":[148086],'startTime':1514739600,'endTime':1527746679})
     * @returnExample({
     *   "148086": {
     *       "sellerId": "148086",
     *       "addNum": "236",
     *       "addAmount": "2889732",
     *       "payAmount": "14359",
     *       "payNum": "77"
     *   }
     *})
     * @return array
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since  2018年05月31日
     */
    public function getOrderCountsByStoreId(array $storeIds, int $startTime = 0, int $endTime = 0): array;

    /**
     * 获取各卖家未发货订单数量
     *
     * @param int $page  当前页数
     * @param int $limit 每页数量
     * @return array
     *
     * @requestExample({"page": 1, "limit": 1000})
     * @returnExample({
     *     "148086": {"orderCount": 8, "sellerId": 148086}
     * })
     *
     * @author zhangyangxun
     * @since 2018-08-08
     */
    public function getUnshippedInfo(int $page = 1, int $limit = 10): array;
}
