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
 * Class Cate.
 *
 * var/eelly-old-code/modules/Sem/Service/CateService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class Cate
{
    /**
     * @param int $type
     *
     * @return mixed
     */
    public function getCategory($type = 0)
    {
        return EellyClient::request('eellyOldCode/sem/cate', __FUNCTION__, true, $type);
    }
}
