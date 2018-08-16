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
use Eelly\SDK\Order\Service\AppletInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Applet implements AppletInterface
{
    /**
     * 通过店铺ID获取订单数量和支付数量和支付金额.
     *
     * @param array $storeIds
     *
     * @return array
     *
     * @requestExample({
     *     "storeIds":[148086,1762483]
     * })
     *
     * @returnExample({
     *    "148086": {
     *        "total": "245",
     *        "totalAmount": "34569",
     *        "payTotal": "80",
     *        "sellerId": "148086"
     *    },
     *    "1762483": {
     *        "total": "26",
     *        "totalAmount": "1202",
     *        "payTotal": "3",
     *        "sellerId": "1762483"
     *    }
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年08月09日
     */
    public function getOrderNumData(array $storeIds): array
    {
        return EellyClient::request('order/applet', 'getOrderNumData', true, $storeIds);
    }

    /**
     * 通过店铺ID获取订单数量和支付数量和支付金额.
     *
     * @param array $storeIds
     *
     * @return array
     *
     * @requestExample({
     *     "storeIds":[148086,1762483]
     * })
     *
     * @returnExample({
     *    "148086": {
     *        "total": "245",
     *        "totalAmount": "34569",
     *        "payTotal": "80",
     *        "sellerId": "148086"
     *    },
     *    "1762483": {
     *        "total": "26",
     *        "totalAmount": "1202",
     *        "payTotal": "3",
     *        "sellerId": "1762483"
     *    }
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年08月09日
     */
    public function getOrderNumDataAsync(array $storeIds)
    {
        return EellyClient::request('order/applet', 'getOrderNumData', false, $storeIds);
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