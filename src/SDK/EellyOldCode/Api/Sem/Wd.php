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

namespace Eelly\SDK\EellyOldCode\Api\Sem;

use Eelly\SDK\EellyClient;

/**
 * Class Wd.
 *
 * var/eelly-old-code/modules/Sem/Service/WdService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class Wd
{
    /**
     * @param $wdId
     * @param $model
     *
     * @return mixed
     */
    public function getCikuInfoById($wdId, $model)
    {
        return EellyClient::request('eellyOldCode/sem/wd', __FUNCTION__, true, $wdId, $model);
    }
}
