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

namespace Eelly\SDK\Live\Service;

use Eelly\DTO\UidDTO;

/**
 * 直播间活动接口.
 *
 * @author wechan
 */
interface LiveActivityInterface
{
    /**
     * 设置活动列表页.
     *
     * ## 返回数据说明
     *
     * 字段|类型|说明
     * ------------------|-------|--------------
     * latId             |int    |直播活动类型ID
     * title             |string |标题
     * required          |string |任务要求
     * colorRequire      |string |带颜色字体
     * awardType         |array  |奖品类型
     * awardTypeSelected |int    |选中类型
     * status            |int    |活动状态，1开启，0表示关闭
     * awardNumber       |int    |奖励人数
     *
     * @param int         $liveId 直播ID
     * @param UidDTO|null $uidDTO
     *
     * @return array
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月26日
     * @requestExample({"liveId":1})
     * @returnExample([
     *   {
     *       "latId": 1,
     *       "title": "直播间引流活动 ①",
     *       "required": "分享我的直播速度最快的前N名用户",
     *       "colorRequire": "速度最快",
     *       "awardType": [
     *           {
     *               "awardId": 1,
     *               "name": "送店铺商品"
     *           },
     *           {
     *               "awardId": 2,
     *               "name": "直播时主播公布"
     *           }
     *       ],
     *       "awardTypeSelected": 1,
     *       "status": 0,
     *       "awardNumber": 2
     *   },
     *   {
     *       "latId": 2,
     *       "title": "直播间引流活动 ②",
     *       "required": "分享我的直播次数最多的前N名用户",
     *       "colorRequire": "次数最多",
     *       "awardType": [
     *           {
     *               "awardId": 1,
     *               "name": "送店铺商品"
     *           },
     *           {
     *               "awardId": 2,
     *               "name": "直播时主播公布"
     *           }
     *       ],
     *       "awardTypeSelected": 1,
     *       "status": 0,
     *       "awardNumber": 2
     *   },
     *   {
     *      "latId": 3,
     *       "title": "直播间引流活动 ③",
     *       "required": "分享我的直播带来新观众最多的前N名用户",
     *       "colorRequire": "新观众最多",
     *       "awardType": [
     *           {
     *               "awardId": 1,
     *               "name": "送店铺商品"
     *           },
     *           {
     *               "awardId": 2,
     *               "name": "直播时主播公布"
     *           }
     *       ],
     *       "awardTypeSelected": 1,
     *       "status": 0,
     *       "awardNumber": 2
     *   }
     *])
     */
    public function liveActivitySettingPage(int $liveId, UidDTO $uidDTO = null): array;

    /**
     * 活动设置更新.
     *
     * @param array $data                  活动设置参数
     * @param int   $data[]['latId']       直播活动类型ID
     * @param int   $data[]['liveId']      直播id
     * @param int   $data[]['awardType']   奖励类型：1 送店铺商品 2 直播时主播公布
     * @param int   $data[]['status']      状态：0 关闭 1 已开启
     * @param int   $data[]['awardNumber'] 奖励人数
     *
     * @return bool
     * @returnExample([
     *   {
     *     "latId": 1,
     *     "liveId": 1,
     *     "awardType": 1,
     *     "awardNumber": 10,
     *     "status": 1
     *   },
     *   {
     *     "latId": 2,
     *     "liveId": 1,
     *     "awardType": 2,
     *     "awardNumber": 20,
     *     "status": 1
     *   },
     *   {
     *     "latId": 3,
     *     "liveId": 1,
     *     "awardType": 2,
     *     "awardNumber": 30,
     *     "status": 0
     *   }
     *])
     * @returnExample(true)
     *
     * @author hehui
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月25日
     */
    public function setLiveActivitySettingStatus(array $data, UidDTO $uidDTO = null): bool;

    /**
     * 直播间福利活动页.
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * title            |   string   |   直播活动标题
     * awardTypeName    |   array    |   奖励类型名称
     * awardNumber      |   int      |   奖励人数
     * plusTime         |   int      |   倒计时时间
     * startTime        |   int      |   开始时间
     * endTime          |   int      |   开始时间
     * hasActivity      |   int      |   是否有发布过活动 0.否 1.是
     * lasId            |   int      |   直播活动设置ID
     * latId            |   int      |   直播活动类型ID
     * 
     * @param int $liveId 直播ID
     *
     * @author wechan
     *
     * @since 2018年5月25日
     */
    public function getLiveActivityList(int $liveId, UidDTO $uidDTO = null):array;
    
    /**
     * 发布直播活动.
     *
     * @param int   $liveId             直播ID
     * @param array $params             请求参数
     * @param array $params['lasId']    直播活动设置ID
     * @param array $params['plusTime'] 倒计时时间（秒）
     *
     * @return int 新发布的活动id
     *
     * @requestExample({
     *     "liveId": 123,
     *     "params": {
     *         "lasId": 4,
     *         "plusTime": 60
     *     }
     * })
     * 
     * @returnExample(13)
     *
     * @author hehui<hehui@eelly.net>
     */
    public function setLiveActivity(int $liveId, array $params): int;

    /**
     * 直播活动奖励页.
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * title            |   string   |   直播活动标题
     * awardTypeName    |   array    |   奖励类型名称
     * awardNumber      |   int      |   奖励人数
     * status           |   int      |   状态: 0.已结束 1.进行中 2.即将开始
     * latId            |   int      |   平台级直播活动类型id 1.分享直播最快 2.分享最多 3分享有效最多
     * count            |   int      |   统计次数 latId 1.为0  2.我分享的人数 3.我带来的人数
     *
     * @param int $liveId 直播ID
     *
     * @author wechan
     *
     * @since 2018年5月25日
     */
    public function getLiveActivityDoor(int $liveId, UidDTO $uidDTO = null): array;

    /**
     * 厂家发送活动10秒倒计时消息给店家.
     *
     * @param int $laId  活动id
     *
     * @return bool
     *
     * @requestExample({"laId":123})
     *
     * @returnExample(true)
     *
     * @author hehui<hehui@eelly.net>
     */
    public function sendLiveActivityCountdownMsg(int $laId): bool;
}
