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

namespace Eelly\DTO;

/**
 * Class UserDTO.
 */
class UserDTO extends UidDTO
{
    /**
     * 用户名.
     *
     * @var string
     */
    public $username;

    /**
     * 手机号.
     *
     * @var string
     */
    public $mobile;

    /**
     * 用户头像.
     *
     * @var string
     */
    public $avatar;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return UserDTO
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     *
     * @return UserDTO
     */
    public function setMobile(string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }
}
