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

namespace Eelly\SDK\EellyOldCode\Api\BusinessCircle;

use Eelly\SDK\EellyClient;

/**
 * Class BusinessCircle.
 *
 * var/eelly-old-code/modules/BusinessCircle/Service/BusinessCircleService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class BusinessCircle
{
    /**
     * @param array $param
     *
     * @return mixed
     */
    public function factoryBusinessCircle2(array $param)
    {
        return EellyClient::request('eellyOldCode/businessCircle/businessCircle', __FUNCTION__, true, $param);
    }
}
