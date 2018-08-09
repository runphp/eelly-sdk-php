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

namespace Eelly\SDK\EellyOldCode\Api\Order;

use Eelly\SDK\EellyClient;

/**
 * Class OrderGoodsCountInfo.
 *
 * var/eelly-old-code/modules/Order/Service/OrderGoodsCountInfoService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class OrderGoodsCountInfo
{
    /**
     * @param array $goodsId
     *
     * @return mixed
     */
    public function getCountInfoByGoodId(array $goodsId)
    {
        return EellyClient::request('eellyOldCode/order/orderGoodsCountInfo', __FUNCTION__, true, $goodsId);
    }
}
