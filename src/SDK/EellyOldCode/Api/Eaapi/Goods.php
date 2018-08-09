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

namespace Eelly\SDK\EellyOldCode\Api\Eaapi;

use Eelly\SDK\EellyClient;

/**
 * Class Goods.
 *
 * var/eelly-old-code/modules/Eaapi/Service/GoodsService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class Goods
{
    public function getGoodsPv($goodsIds, $sDate, $eDate)
    {
        return EellyClient::request('eellyOldCode/eaapi/goods', __FUNCTION__, true, $goodsIds, $sDate, $eDate);
    }
}
