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

namespace Eelly\SDK\Live\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Live\Service\LiveStoreSettingsInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class LiveStoreSettings implements LiveStoreSettingsInterface
{
    /**
     * 获取店铺的直播展示标志.
     *
     * @param int $storeId 店铺ID
     *
     * @return int
     * @requestExample({"storeId":148086})
     * @returnExample({15})
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年07月09日
     */
    public function getShowFlagByStoreId(int $storeId): int
    {
        return EellyClient::request('live/liveStoreSettings', 'getShowFlagByStoreId', true, $storeId);
    }

    /**
     * 获取店铺的直播展示标志.
     *
     * @param int $storeId 店铺ID
     *
     * @return int
     * @requestExample({"storeId":148086})
     * @returnExample({15})
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年07月09日
     */
    public function getShowFlagByStoreIdAsync(int $storeId)
    {
        return EellyClient::request('live/liveStoreSettings', 'getShowFlagByStoreId', false, $storeId);
    }

    /**
     * 修改展示场次.
     *
     * @param array $liveIds  直播ID
     * @param int   $showFlag 修改为的值
     * @param int   $type     1表示修改直播，其他都是修改店铺下的所有直播
     *
     * @return bool
     *
     * @requestExample({liveIds":[148086,148087],"showFlag":15,"type":1})
     * @returnExample({true})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年07月11日
     *
     * @Validation(
     *    @PresenceOf(0,{message : "直播数据不能为空"})
     * )
     */
    public function updateShowFlagData(array $liveIds, int $showFlag = 15, int $type = 1): bool
    {
        return EellyClient::request('live/liveStoreSettings', 'updateShowFlagData', true, $liveIds, $showFlag, $type);
    }

    /**
     * 修改展示场次.
     *
     * @param array $liveIds  直播ID
     * @param int   $showFlag 修改为的值
     * @param int   $type     1表示修改直播，其他都是修改店铺下的所有直播
     *
     * @return bool
     *
     * @requestExample({liveIds":[148086,148087],"showFlag":15,"type":1})
     * @returnExample({true})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年07月11日
     *
     * @Validation(
     *    @PresenceOf(0,{message : "直播数据不能为空"})
     * )
     */
    public function updateShowFlagDataAsync(array $liveIds, int $showFlag = 15, int $type = 1)
    {
        return EellyClient::request('live/liveStoreSettings', 'updateShowFlagData', false, $liveIds, $showFlag, $type);
    }

    /**
     * 获取店铺的.
     *
     * @param int   $showFlag 修改为的值
     *
     * @return bool
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @requestExample({"showFlag":15})
     * @returnExample({156298,2140195})
     *
     * @since 2018年07月11日
     *
     * @Validation(
     *    @OperatorValidator(0,{message:"展示类型不能为空",operator:["gt",0]})
     * )
     */
    public function getStoreIds(int $showFlag = 15): array
    {
        return EellyClient::request('live/liveStoreSettings', 'getStoreIds', true, $showFlag);
    }

    /**
     * 获取店铺的.
     *
     * @param int   $showFlag 修改为的值
     *
     * @return bool
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @requestExample({"showFlag":15})
     * @returnExample({156298,2140195})
     *
     * @since 2018年07月11日
     *
     * @Validation(
     *    @OperatorValidator(0,{message:"展示类型不能为空",operator:["gt",0]})
     * )
     */
    public function getStoreIdsAsync(int $showFlag = 15)
    {
        return EellyClient::request('live/liveStoreSettings', 'getStoreIds', false, $showFlag);
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