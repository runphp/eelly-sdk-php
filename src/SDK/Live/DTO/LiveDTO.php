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

namespace Eelly\SDK\Live\DTO;

use Eelly\DTO\AbstractDTO;

/**
 * LiveDTO.
 *
 * @author zhangyingdi<zhangyingdi@eelly.net>
 *
 * @since  2018.01.24
 */
class LiveDTO extends AbstractDTO
{
    /**
     * 直播信息，自增主键.
     *
     * @var int
     */
    public $liveId;

    /**
     * 用户ID.
     *
     * @var int
     */
    public $userId;

    /**
     * 店铺ID.
     *
     * @var int
     */
    public $storeId;

    /**
     * 直播标题.
     *
     * @var string
     */
    public $title;

    /**
     * 直播封面.
     *
     * @var string
     */
    public $image;

    /**
     * 地区.
     *
     * @var int
     */
    public $region;

    /**
     * 推流URL：用户前端播放引用.
     *
     * @var string
     */
    public $pushUrl;

    /**
     * 分享渠道：1 微信 2 朋友圈 4 QQ好友 8 QQ空间.
     *
     * @var int
     */
    public $share;

    /**
     * 预计视频开始时间.
     *
     * @var int
     */
    public $scheduleTime;

    /**
     * 视频开始时间.
     *
     * @var int
     */
    public $startTime;

    /**
     * 视频结束时间.
     *
     * @var int
     */
    public $endTime;

    /**
     * 状态：0.直播未开始,1.直播中-进行中,12.直播中-暂停,13.直播中-异常暂停,2.正常结束,3.强制中止.
     *
     * @var int
     */
    public $status;

    /**
     * 排序.
     *
     * @var int
     */
    public $sort;

    /**
     * 直播展示标志.
     *
     * @var int
     */
    public $showFlag;
    /**
     * 添加时间.
     *
     * @var int
     */
    public $createdTime;
}
