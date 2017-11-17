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
 * 凭证类型异常处理类
 *
 * @author wechan<liweiquan@eelly.net>
 *
 * @since  2017年11月14日
 */
class VoucherTypeException extends LogicException
{
    public const VOUCHER_CODE_EXIT = '凭证代码已存在!';
}
