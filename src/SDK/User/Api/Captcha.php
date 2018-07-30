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

namespace Eelly\SDK\User\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\User\Service\CaptchaInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Captcha implements CaptchaInterface
{
    /**
     * 创建验证码.
     *
     * @param string|null $cacheKey 验证码缓存key
     * @param string|null $phrase   验证码字符
     * @param int         $lifetime 有效期
     * @param int         $length   验证码长度
     * @param string      $charset  验证码字符集
     *
     * @return array
     */
    public function build(string $cacheKey = null, string $phrase = null, int $lifetime = 3600, int $length = 5, string $charset = 'abcdefghijklmnpqrstuvwxyz123456789'): array
    {
        return EellyClient::request('user/captcha', 'build', true, $cacheKey, $phrase, $lifetime, $length, $charset);
    }

    /**
     * 创建验证码.
     *
     * @param string|null $cacheKey 验证码缓存key
     * @param string|null $phrase   验证码字符
     * @param int         $lifetime 有效期
     * @param int         $length   验证码长度
     * @param string      $charset  验证码字符集
     *
     * @return array
     */
    public function buildAsync(string $cacheKey = null, string $phrase = null, int $lifetime = 3600, int $length = 5, string $charset = 'abcdefghijklmnpqrstuvwxyz123456789')
    {
        return EellyClient::request('user/captcha', 'build', false, $cacheKey, $phrase, $lifetime, $length, $charset);
    }

    /**
     * 检查验证码.
     *
     * @param string $cacheKey 验证码缓存key
     * @param string $value    验证码
     *
     * @return bool
     */
    public function check(string $cacheKey, string $value): bool
    {
        return EellyClient::request('user/captcha', 'check', true, $cacheKey, $value);
    }

    /**
     * 检查验证码.
     *
     * @param string $cacheKey 验证码缓存key
     * @param string $value    验证码
     *
     * @return bool
     */
    public function checkAsync(string $cacheKey, string $value)
    {
        return EellyClient::request('user/captcha', 'check', false, $cacheKey, $value);
    }

    /**
     * @return self
     */
    public static function getInstance(): self
    {
        static $instance;
        if (null === $instance) {
            $instance = new self();
        }

        return $instance;
    }
}