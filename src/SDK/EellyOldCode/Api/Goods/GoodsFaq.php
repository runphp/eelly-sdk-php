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
 * Class GoodsFaq.
 *
 * var/eelly-old-code/modules/Goods/Service/GoodsFaqService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class GoodsFaq
{
    /**
     * @param $goodsIds
     * @param bool $isapp
     *
     * @return mixed
     */
    public function statisticsFaq($goodsIds, $isapp = false)
    {
        return EellyClient::request('eellyOldCode/goods/goodsFaq', __FUNCTION__, true, $goodsIds, $isapp);
    }
}
