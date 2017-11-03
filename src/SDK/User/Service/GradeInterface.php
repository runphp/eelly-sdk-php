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

use Eelly\SDK\User\DTO\GradeDTO;
use Eelly\SDK\User\Exception\GradeException;

/**
 * 用户等级.
 *
 * @author eellytools<localhost.shell@gmail.com>
 */
interface GradeInterface
{
    /**
     * 获取用户等级信息.
     *
     * @param int $gradeId 等级ID
     *                     ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------|-------|--------------
     * ugId        |int    | 等级ID
     * name        |string | 等级名称
     * score       |int    | 等级对应分数
     * privilege   |string | 等级对应的特权
     * status      |int    | 等级状态：0 有效 4 删除
     * createdTime |string | 添加时间
     * updateTime  |string | 修改时间
     *
     * @throws
     *
     * @return GradeDTO
     * @requestExample({"gradeId":1})
     * @returnExample({"ugId":1,"name":"test","score":100,"privilege":"xxx","status":0,"createdTime":"1506582745","updateTime":"2017-09-28
     *     15:12:59"})
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     *
     * @since  2017/9/28
     */
    public function getGrade(int $gradeId): GradeDTO;

    /**
     * 添加用户等级.
     *
     * @param array  $data
     * @param string $data["name"]      等级名称
     * @param int    $data["score"]     等级对应分数
     * @param string $data["privilege"] 等级对应的特权
     * @param int    $data["status"]    等级状态：0 有效 4 删除
     *
     * @return bool
     * @requestExample({"data":{"name":"test","score":100,"privilege":"xxx","status":0}})
     * @returnExample(true)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     *
     * @since  2017/9/28
     */
    public function addGrade(array $data): bool;

    /**
     * 更新等级信息.
     *
     * @param int    $gradeId           等级ID
     * @param array  $data
     * @param string $data["name"]      等级名称
     * @param int    $data["score"]     等级对应分数
     * @param string $data["privilege"] 等级对应的特权
     * @param int    $data["status"]    等级状态：0 有效 4 删除
     *
     * @throws GradeException
     *
     * @return bool
     * @requestExample({"gradeId":1,"data":{"name":"test","score":100,"privilege":"xxx","status":0}})
     * @returnExample(true)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     *
     * @since  2017/9/28
     */
    public function updateGrade(int $gradeId, array $data): bool;

    /**
     * 删除等级信息.
     *
     * @param int $gradeId 等级ID
     *
     * @throws GradeException
     *
     * @return bool
     * @requestExample({"greadeId":1})
     * @returnExample(true)
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     *
     * @since  2017/9/28
     */
    public function deleteGrade(int $gradeId): bool;

    /**
     * 用户等级列表.
     *
     * @param array $condition
     * @param int   $condition["status"] 等级状态：0 有效 4 删除
     * @param int   $currentPage
     * @param int   $limit
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------|-------|--------------
     * ugId        |int    |
     * name        |string |
     * score       |int    |
     * privilege   |string |
     * status      |int    |
     * createdTime |string |
     * updateTime  |string |
     *
     * @throws GradeException
     *
     * @return array
     * @requestExample({"condition":{"status":1},"currentPage":1,"limit":10})
     * @returnExample([{"ugId":1,"name":"test","score":100,"privilege":"xxx","status":0,"createdTime":"1506582745","updateTime":"2017-09-28
     *     15:12:59"}])
     *
     * @author zhangzeqiang<zhangzeqiang@eelly.net>
     *
     * @since  2017/9/28
     */
    public function listGradePage(array $condition = [], int $currentPage = 1, int $limit = 10): array;
}
