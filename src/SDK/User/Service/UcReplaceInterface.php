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

/**
 * uc的一些替代接口.
 *
 * @author hehui<hehui@eelly.net>
 */
interface UcReplaceInterface
{
    /**
     * 通过用户名获取用户id.
     *
     * 用户不存在返回0
     *
     * @param string $username 用户名
     *
     * @return int
     */
    public function getUserIdByUsername(string $username): int;

    /**
     * 通过微信unionid获取用户id.
     *
     * 用户不存在返回0
     *
     * @param string $unionid 微信unionid
     *
     * @return int
     */
    public function getUserIdByWechatUnionid(string $unionid): int;

    /**
     * 通过QQ openid获取用户id.
     *
     * 用户不存在返回0
     *
     * @param string $openid QQ openid
     *
     * @return int
     */
    public function getUserIdByQQOpenid(string $openid): int;

    /**
     * 更新用户密码.
     *
     * @param int    $userId   用户id
     * @param string $password 密码
     *
     * @return bool
     */
    public function updatePassword(int $userId, string $password): bool;

    /**
     * 是否设置密码.
     *
     * @param int $userId 用户id
     *
     * @return bool
     */
    public function hasPassword(int $userId): bool;

    /**
     * 检查密码.
     *
     * @param int    $userId
     * @param string $password
     *
     * @return bool
     */
    public function checkPassword(int $userId, string $password): bool;

    /**
     * 获取用户绑定信息.
     *
     * @param int $userId 用户id
     * @param int $type   类型: 1. 微信 2. 腾讯QQ
     *
     * @return array
     */
    public function getUserBind(int $userId, int $type): array;

    /**
     * 更新用户绑定信息.
     *
     * @param int    $userId 用户id
     * @param int    $type   类型: 1. 微信 2. 腾讯QQ
     * @param string $strid  微信unionid 或 QQ openid
     *
     * @return bool
     */
    public function updateUserBind(int $userId, int $type, string $strid): bool;
}
