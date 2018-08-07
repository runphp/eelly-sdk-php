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

use Eelly\DTO\UserDTO;
use Eelly\SDK\EellyClient;
use Eelly\SDK\User\Service\OauthUserInterface;

class OauthUser implements OauthUserInterface
{
    /**
     * {@inheritdoc}
     */
    public function getUserByPassword(string $username, string $password): UserDTO
    {
        return EellyClient::request('user/oauthUser', __FUNCTION__, true, $username, $password);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByUid(int $uid): UserDTO
    {
        return EellyClient::request('user/oauthUser', __FUNCTION__, true, $uid);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByQQAccessToken(string $accessToken): UserDTO
    {
        return EellyClient::request('user/oauthUser', __FUNCTION__, true, $accessToken);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByWechatCode(string $clientId, string $code): UserDTO
    {
        return EellyClient::request('user/oauthUser', __FUNCTION__, true, $clientId, $code);
    }
}
