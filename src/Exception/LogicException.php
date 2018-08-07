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

namespace Eelly\Exception;

use Throwable;

/**
 * 逻辑异常.
 *
 * @author hehui<hehui@eelly.net>
 */
class LogicException extends \LogicException
{
    public const PARAMETER_ERROR = '参数有误';

    public const PARAMETER_EMPTY = '参数不能为空';

    public const DATA_NOT_EXIT = '记录不存在';

    public const DATA_ALREADER_EXIT = '该数据已经存在';

    public const DATA_INSERT_FAIL = '插入失败';

    public const DATA_UPDATE_FAIL = '更新失败';

    public const DATA_DELETE_FAIL = '删除失败';

    public const NO_PERMISSIONS = '没有该权限操作';

    public const PARAMETER_VALIDATION_ERROR = '校验传入参数错误';
    
    public const INVALID_ACCESS_TOKEN = 'access_token不存在或已被用户删除';

    /**
     * @var array
     */
    private $context;

    /**
     * @param string    $message  错误信息
     * @param array     $context  上下文信息
     * @param int       $code     错误编号
     * @param Throwable $previous 上级异常
     */
    public function __construct(string $message = '', array $context = null, $code = null, Throwable $previous = null)
    {
        parent::__construct($message, (int) $code, $previous);
        // default context
        if (null === $context) {
            $context = [
                'code' => $this->getCode(),
                'line' => $this->getLine(),
                'file' => $this->getFile(),
            ];
        }
        $this->context = $context;
    }

    /**
     * 获取上下文信息.
     *
     * @return array
     */
    public function getContext()
    {
        return $this->context;
    }
}
