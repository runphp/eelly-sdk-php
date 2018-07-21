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

/**
 * @author eellytools<localhost.shell@gmail.com>
 */
interface GoodsInterface
{
    /**
     * 根据订单id获取订单商品信息
     * 
     * @param array $orderIds
     * @return array
     * 
     * @requestExample({"orderId":[161]})
     * @returnExample({"161":{"orderId":"161","orderSn":"1811635308","refType":"0","fromFlag":"0","extension":"0","batchNumber":"0","chunkNumber":"0","sellerId":"148086","sellerName":"\u83ab\u743c\u5c0f\u5e97","buyerId":"148086","buyerName":"juju12","osId":"1","payTime":"0","shipTime":"0","delayTime":"0","frozenTime":"0","finishedTime":"0","orderAmount":"2","freight":"1","commission":"0","returnFlag":"0","evaluateFlag":"0","deleteFlag":"0","remark":"","createdTime":"1524830823","updateTime":"2018-04-27 22:53:26","orderGoods":[{"ogId":"20000216","orderId":"161","goodsId":"1450168293","gsId":"195022196","price":"1","quantity":"2","goodsName":"\u3010\u83ab\u743c\u5c0f\u5e97\u3011 2018\u65b0\u6b3e \u9488\u7ec7\u886b\/\u6bdb\u8863  \u5305\u90ae","goodsImage":"G02\/M00\/00\/03\/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg","goodsNumber":"2","spec":"\u989c\u8272:\u5982\u56fe\u8272,\u5c3a\u7801:\u5747\u7801","createdTime":"1524830823","updateTime":"2018-04-27 20:06:57"}]}})
     * 
     * @author wechan
     * @since 2018年05月02日
     */
    public function getOrderGoodsByIds(array $orderIds): array;
    
    /**
     * 获取订单点赞信息(最新提交的XX笔订单)
     * 
     * @param int $goodsId 商品id
     * @return array
     * 
     * @requestExample({"goodsId":1450168344})
     * @returnExample([{
     *      "msg": "朋友帮他点赞成功了",
     *      "spellingTypeMsg": "集赞成功",
     *      "spellingType": "1",
     *      "buyerId": "148086"
     *  }])
     * 
     * @author wechan
     * @since 2018年05月02日
     */
    public function getGoodsLikeInfo(int $goodsId): array;
    
    /**
     * 获取商品下单总件数(取消订单和退款退货订单不减数).
     *
     * @param array $goodsIds 商品id
     * @return array
     * 
     * @requestExample({"$goodsIds":[1450168344, 4452]})
     * @returnExample({
     *      "148086":{
     *          "quantityCounts":22,
     *          "goodsId":1450168344
     *     },
     *     "4452":{
     *          "quantityCounts":189,
     *          "goodsId":4452
     *     }
     * })
     *
     * @author wechan
     * @since  2018年05月07日
     */
    public function countGoodsOrderGoodsQuantity(array $goodsIds): array;
    
    /**
     * 根据商品获取订单点赞数
     * 
     * @param array $goodsId 商品id
     * @return int
     * 
     * @requestExample({"$goodsIds":1450168344})
     * @returnExample(4)
     * 
     * @author wechan
     * @since  2018年05月10日
     */
    public function countGoodsOrderGoodsLike(int $goodsId): int;


    /**
     * 根据订单id 获取订单的商品数据
     *
     * @param int $orderId 订单id
     * @return array
     *
     * @requestExample({"orderId":50001701})
     * @returnExample({"goods_id":"5578933","gs_id":"32090860","quantity":"1"})
     *
     * @author sunanzhi
     * @since 2018.7.20
     */
    public function getOrderGoods(int $orderId): array;
}
