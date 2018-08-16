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
use Eelly\SDK\User\Service\UcReplaceInterface;

class UcReplace implements UcReplaceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getUserIdByUsername(string $username): int
    {
        return EellyClient::request('user/ucReplace', __FUNCTION__, true, $username);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserIdByWechatUnionid(string $unionid): int
    {
        return EellyClient::request('user/ucReplace', __FUNCTION__, true, $unionid);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserIdByQQOpenid(string $openid): int
    {
        return EellyClient::request('user/ucReplace', __FUNCTION__, true, $openid);
    }

    /**
     * {@inheritdoc}
     */
    public function updatePassword(int $userId, string $password): bool
    {
        return EellyClient::request('user/ucReplace', __FUNCTION__, true, $userId, $password);
    }

    /**
     * {@inheritdoc}
     */
    public function hasPassword(int $userId): bool
    {
        return EellyClient::request('user/ucReplace', __FUNCTION__, true, $userId);
    }

    /**
     * {@inheritdoc}
     */
    public function checkPassword(int $userId, string $password): bool
    {
        return EellyClient::request('user/ucReplace', __FUNCTION__, true, $userId, $password);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserBind(int $userId, int $type): array
    {
        return EellyClient::request('user/ucReplace', __FUNCTION__, true, $userId, $type);
    }

    /**
     * {@inheritdoc}
     */
    public function updateUserBind(int $userId, int $type, string $strid): bool
    {
        return EellyClient::request('user/ucReplace', __FUNCTION__, true, $userId, $type, $strid);
    }
}
