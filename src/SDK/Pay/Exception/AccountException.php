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

namespace Eelly\SDK\Pay\Exception;

use Eelly\Exception\LogicException;

/**
 * 会员资金账户报错.
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 *
 * @since  2017年09月21日
 */
class AccountException extends LogicException
{
    /**
     *错误信息.
     */
    public const PARAMETER_ERROR = '参数有误';

    /**
     * 权限不够
     */
    public const REQUEST_FORBIDDEN = '无权操作';
}
