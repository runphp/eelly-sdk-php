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

namespace Eelly\SDK\EellyOldCode\Api\Goods;

use Eelly\SDK\EellyClient;

/**
 * Class Goods.
 *
 * var/eelly-old-code/modules/Goods/Service/GoodsService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class Goods
{
    /**
     * @param $goodsId
     * @param int $userId
     *
     * @return mixed
     */
    public function getWapGoodsInfo($goodsId, $userId = 0)
    {
        return EellyClient::request('eellyOldCode/goods/goods', __FUNCTION__, true, $goodsId, $userId);
    }

    /**
     * @param $goodsId
     * @param $userId
     * @param int $limit
     *
     * @return mixed
     */
    public function getOtherGoods($goodsId, $userId, $limit = 100)
    {
        return EellyClient::request('eellyOldCode/goods/goods', __FUNCTION__, true, $goodsId, $userId, $limit);
    }

    /**
     * @param $userId
     * @param array $goodsIds
     *
     * @return mixed
     */
    public function goodsIndexPermissionNew($userId, array $goodsIds)
    {
        return EellyClient::request('eellyOldCode/goods/goods', __FUNCTION__, true, $userId, $goodsIds);
    }

    /**
     * @param $searchParams
     * @param string $type
     * 
     * @return mixed
     */
    public function buyerSearchGoods($searchParams, $type = 'app')
    {
        return EellyClient::request('eellyOldCode/goods/goods', __FUNCTION__, true, $searchParams, $type);
    }
}
