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

namespace Eelly\SDK\Message\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Message\Service\MessageFormidInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class MessageFormid implements MessageFormidInterface
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
    public function sendCancelOrder(int $orderId): bool
    {
        return EellyClient::request('message/messageFormid', 'sendCancelOrder', true, $orderId);
    }

    /**
     * 发送订单取消通知消息.
     *
     * @param int $orderId 订单ID
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.19
     */
    public function sendCancelOrderAsync(int $orderId)
    {
        return EellyClient::request('message/messageFormid', 'sendCancelOrder', false, $orderId);
    }

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
    public function addFormId(array $data): bool
    {
        return EellyClient::request('message/messageFormid', 'addFormId', true, $data);
    }

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
    public function addFormIdAsync(array $data)
    {
        return EellyClient::request('message/messageFormid', 'addFormId', false, $data);
    }

    /**
     * 发送订单支付成功通知消息.
     *
     * @param int $orderId 订单ID
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.21
     */
    public function sendSuccessOrder(int $orderId): bool
    {
        return EellyClient::request('message/messageFormid', 'sendSuccessOrder', true, $orderId);
    }

    /**
     * 发送订单支付成功通知消息.
     *
     * @param int $orderId 订单ID
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.21
     */
    public function sendSuccessOrderAsync(int $orderId)
    {
        return EellyClient::request('message/messageFormid', 'sendSuccessOrder', false, $orderId);
    }

    /**
     * 发送订单发货通知.
     *
     * @param int $orderId 订单id
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.30
     */
    public function sendOrderDelivery(int $orderId): bool
    {
        return EellyClient::request('message/messageFormid', 'sendOrderDelivery', true, $orderId);
    }

    /**
     * 发送订单发货通知.
     *
     * @param int $orderId 订单id
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.30
     */
    public function sendOrderDeliveryAsync(int $orderId)
    {
        return EellyClient::request('message/messageFormid', 'sendOrderDelivery', false, $orderId);
    }

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
    public function sendReceiveRedPackage(array $data, string $fromFlag, int $userId): bool
    {
        return EellyClient::request('message/messageFormid', 'sendReceiveRedPackage', true, $data, $fromFlag, $userId);
    }

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
    public function sendReceiveRedPackageAsync(array $data, string $fromFlag, int $userId)
    {
        return EellyClient::request('message/messageFormid', 'sendReceiveRedPackage', false, $data, $fromFlag, $userId);
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