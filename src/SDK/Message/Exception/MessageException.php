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

namespace Eelly\SDK\Message\Exception;

use Eelly\Exception\LogicException;

/**
 * @author hehui<hehui@eelly.net>
 */
class MessageException extends LogicException
{
    public const PARAMETER_ERROR = '参数有误';

    public const DATA_NOT_EXIT = '记录不存在';

    public const DATA_INSERT_FAIL = '插入失败';

    public const DATA_UPDATE_FAIL = '更新失败';

    public const DATA_DELETE_FAIL = '删除失败';

    public const DATA_ALREADER_EXIT = '该数据已经存在';

    public const  NO_PERMISSIONS = '没有该权限操作';

    public const TEMPLETE_NO_START = '模板还没启用，请先启用';

    public const TEMPLETE_PARAMETER_INCORRECT = '模板匹配参数不正确,请按模板参数填写';

    public const  UNKNOW_ERROR = '验证码已经失效';

    public const  CODE_NOT_EXIT = '验证码不存在';

    public const CODE_ERROR = '验证码错误';

    public const PHONE_ERROR = '手机格式不对';

    public const SEND_FREQUENCTY = '请勿频繁发送验证码';

    public const TEMPLATE_NOT_EXIT = '模版不存在';

    public const SEND_CONTENT_FREQUENCTY = '内容发送太频繁，请稍后再试';
}
