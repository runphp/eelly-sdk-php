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
use Eelly\SDK\User\Service\LoginInterface;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Login implements LoginInterface
{
    /**
     * 添加登陆历史
     *
     * @param string $domain 登陆平台 例：www.account.com www.eelly.com www.manage.com etc
     * @param UidDTO $user 登陆的用户id
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.7.23
     */
    public function addHistory(string $domain, UidDTO $user = null): bool
    {
        return EellyClient::request('user/login', 'addHistory', true, $domain, $user);
    }

    /**
     * 添加登陆历史
     *
     * @param string $domain 登陆平台 例：www.account.com www.eelly.com www.manage.com etc
     * @param UidDTO $user 登陆的用户id
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.7.23
     */
    public function addHistoryAsync(string $domain, UidDTO $user = null)
    {
        return EellyClient::request('user/login', 'addHistory', false, $domain, $user);
    }

    /**
     * 获取登陆历史
     *
     * @param UidDTO $user 登陆的用户id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function getHistory(UidDTO $user = null): array
    {
        return EellyClient::request('user/login', 'getHistory', true, $user);
    }

    /**
     * 获取登陆历史
     *
     * @param UidDTO $user 登陆的用户id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function getHistoryAsync(UidDTO $user = null)
    {
        return EellyClient::request('user/login', 'getHistory', false, $user);
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