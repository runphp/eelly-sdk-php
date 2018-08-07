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

namespace Eelly\SDK\User\Exception;

use Eelly\Exception\LogicException;

/**
 * User模块异常类.
 *
 * @author zhangzeqiang<zhangzeqiang@eelly.net>
 *
 * @since 2017-09-28
 */
class UserException extends LogicException
{
    public const OVERTAKE_ERROR = '收货地址不能超过10';
    public const TYPE_ERROR = '参数类型错误';
    public const BIND_PHONE_ERROR = '手机号码已被其他用户绑定';
    public const BIND_USERNAME_ERROR = '用户名已被其他用户占用';
    public const NO_BIND_PHONE_ERROR = '请先绑定手机号码';
    public const NO_REGISTER_PHONE_ERROR = '该手机号没有注册账号，无法收取验证码';
    public const CAPTCHA_OFTEN_ERROR = '申请验证码频繁';
    public const PHONE_DIFFERENT_ERROR = '输入的手机号码与原手机号码不符';
    public const REQUEST_ERROR = '请求有误';
    public const CAPTCHA_VERIFY_ERROR = '验证码校验错误';
}
