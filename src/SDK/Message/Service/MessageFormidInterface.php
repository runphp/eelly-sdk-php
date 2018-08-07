<?php
declare(strict_types=1);
/**
 * PHP version 5.5
 *
 * @copyright  Copyright (c) 2012-2015 EELLY Inc. (http://www.eelly.com)
 * @link       http://www.eelly.com
 * @license    衣联网版权所有
 */

namespace Eelly\SDK\Message\Service;

/**
 * 微信小程序formId记录.
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
interface MessageFormidInterface
{
    /**
     * 发送订单取消通知消息.
     *
     * @param int $orderId 订单ID
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.19
     */
    public function sendCancelOrder(int $orderId): bool;


    /**
     * 添加小程序表单id.
     *
     * @param string $formId 小程序表单id
     *
     * @return bool
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年08月02日
     */
    public function addFormId(array $data): bool;

    /**
     * 发送订单支付成功通知消息.
     *
     * @param int $orderId 订单ID
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.21
     */
    public function sendSuccessOrder(int $orderId): bool;

    /**
     * 发送订单发货通知.
     *
     * @param int $orderId 订单id
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.30
     */
    public function sendOrderDelivery(int $orderId): bool;

    /**
     * 发送领取优惠卷红包信息.
     *
     * @param  array $data 微信数据
     * @param  string $fromFlag 订单生成来源标识（单选）：wechat|wechat_blty|wechat_lr
     * @param  int $userId 用户id
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018.05.21
     */
    public function sendReceiveRedPackage(array $data, string $fromFlag, int $userId): bool;

}