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

namespace Eelly\SDK\User\DTO;

use Eelly\DTO\AbstractDTO;

/**
 * UserBindDTO.
 *
 * @author zhangzeqiang<zhangzeqiang@eelly.net>
 */
class UserBindDTO extends AbstractDTO
{
    /**
     * 绑定ID，自增主键.
     *
     * @var int
     */
    public $ubId;

    /**
     * 用户ID.
     *
     * @var int
     */
    public $userId;

    /**
     * 绑定类型：1 微信绑定 2 QQ绑定
     *
     * @var int
     */
    public $type;

    /**
     * 第三方平台union_id.
     *
     * @var string
     */
    public $unionId;

    /**
     * 第三方平台open_id.
     *
     * @var string
     */
    public $openId;

    /**
     * 微信公众平台ID,对应mobile.mobile_wechat表appid字段.
     *
     * @var string
     */
    public $appId;

    /**
     * 绑定状态：1 绑定状态 2 解绑状态
     *
     * @var int
     */
    public $status;

    /**
     * 添加时间.
     *
     * @var int
     */
    public $createdTime;

    /**
     * 修改时间.
     *
     * @var unknown
     */
    public $updateIime;
}
