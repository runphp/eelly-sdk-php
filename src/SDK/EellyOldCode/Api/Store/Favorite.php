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

namespace Eelly\SDK\EellyOldCode\Api\Store;

/**
 * Class Favorite.
 *
 * var/eelly-old-code/modules/Store/Service/FavoriteService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class Favorite
{
    /**
     * @param $userId
     * @param array $storeIds
     *
     * @return mixed
     */
    public function isCollectByUserId($userId, array $storeIds)
    {
        return \Eelly\SDK\EellyClient::request('eellyOldCode/store/favorite', __FUNCTION__, true, $userId, $storeId);
    }
}
