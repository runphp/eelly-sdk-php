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

namespace Eelly\SDK\User\Service;

use Eelly\DTO\UidDTO;

/**
 * 用户登陆.
 *
 * @author eellytools<localhost.shell@gmail.com>
 */
interface LoginInterface
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
    public function addHistory(string $domain, UidDTO $user = null):bool; 

    /**
     * 获取登陆历史
     *
     * @param UidDTO $user 登陆的用户id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function getHistory(UidDTO $user = null):array;

}
