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
use Eelly\SDK\Live\Service\QuestionInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Question implements QuestionInterface
{
    /**
     * 获取一条视频直播问题.
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------|-------|--------------
     * lqId        |int    |播问题ID，自增主键
     * content     |string |问题内容
     * status      |int    |状态：0 未启用 1 启用
     * sort        |int    |人工排序
     * createdTime |int    |添加时间
     * updateTime  |string |修改时间
     *
     * @param int $lqId 直播问题ID
     * @return array
     * @requestExample({1})
     * @returnExample({"lqId":1,"content":"主播，店里几件起批啊？","status":1,"sort":255,"createdTime":0,"updateTime":"2018-01-23 15:20:04"})
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     * @Validation(
     *  @OperatorValidator(0,{message:"非法直播问题ID",operator:["gt",0]})
     *)
     */
    public function getQuestion(int $lqId): array
    {
        return EellyClient::request('live/question', 'getQuestion', true, $lqId);
    }

    /**
     * 获取一条视频直播问题.
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------|-------|--------------
     * lqId        |int    |播问题ID，自增主键
     * content     |string |问题内容
     * status      |int    |状态：0 未启用 1 启用
     * sort        |int    |人工排序
     * createdTime |int    |添加时间
     * updateTime  |string |修改时间
     *
     * @param int $lqId 直播问题ID
     * @return array
     * @requestExample({1})
     * @returnExample({"lqId":1,"content":"主播，店里几件起批啊？","status":1,"sort":255,"createdTime":0,"updateTime":"2018-01-23 15:20:04"})
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     * @Validation(
     *  @OperatorValidator(0,{message:"非法直播问题ID",operator:["gt",0]})
     *)
     */
    public function getQuestionAsync(int $lqId)
    {
        return EellyClient::request('live/question', 'getQuestion', false, $lqId);
    }

    /**
     * 添加视频直播问题数据.
     *
     * @param array $data 条件的数据
     * @param string $data["content"] 问题内容
     * @param int $data["status"] 状态：0 未启用 1 启用
     * @param int $data["sort"] 人工排序
     * @return bool
     * @requestExample({"data":["content":"拿多少货能包邮呢？有优惠不？","status":1,"sort":255]})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     */
    public function addQuestion(array $data): bool
    {
        return EellyClient::request('live/question', 'addQuestion', true, $data);
    }

    /**
     * 添加视频直播问题数据.
     *
     * @param array $data 条件的数据
     * @param string $data["content"] 问题内容
     * @param int $data["status"] 状态：0 未启用 1 启用
     * @param int $data["sort"] 人工排序
     * @return bool
     * @requestExample({"data":["content":"拿多少货能包邮呢？有优惠不？","status":1,"sort":255]})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     */
    public function addQuestionAsync(array $data)
    {
        return EellyClient::request('live/question', 'addQuestion', false, $data);
    }

    /**
     * 更新直播问题.
     *
     * @param int $lqId 直播问题ID，自增主键
     * @param array $data 更新数据
     * @param string $data["content"] 更新内容
     * @return bool
     * @requestExample({"lqId":1,"data":["content":"主播，店里几件起批啊？"]})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     */
    public function updateQuestion(int $lqId, array $data): bool
    {
        return EellyClient::request('live/question', 'updateQuestion', true, $lqId, $data);
    }

    /**
     * 更新直播问题.
     *
     * @param int $lqId 直播问题ID，自增主键
     * @param array $data 更新数据
     * @param string $data["content"] 更新内容
     * @return bool
     * @requestExample({"lqId":1,"data":["content":"主播，店里几件起批啊？"]})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     */
    public function updateQuestionAsync(int $lqId, array $data)
    {
        return EellyClient::request('live/question', 'updateQuestion', false, $lqId, $data);
    }

    /**
     * 批量更新排序.
     *
     * @param array $sort [1=>4,2=>8]
     * @return bool
     * @requestExample({"sort":["1":4,"2":8]})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     * @Validation(
     *  @PresenceOf(0,{message : "数据不能为空"})
     *)
     */
    public function updateSort(array $sort): bool
    {
        return EellyClient::request('live/question', 'updateSort', true, $sort);
    }

    /**
     * 批量更新排序.
     *
     * @param array $sort [1=>4,2=>8]
     * @return bool
     * @requestExample({"sort":["1":4,"2":8]})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     * @Validation(
     *  @PresenceOf(0,{message : "数据不能为空"})
     *)
     */
    public function updateSortAsync(array $sort)
    {
        return EellyClient::request('live/question', 'updateSort', false, $sort);
    }

    /**
     * 删除直播问题.
     *
     * @param int $lqId 直播问题ID，自增主键
     * @return bool
     * @requestExample({1})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     * @Validation(
     *  @OperatorValidator(0,{message:"非法直播问题ID",operator:["gt",0]})
     *)
     */
    public function deleteQuestion(int $lqId): bool
    {
        return EellyClient::request('live/question', 'deleteQuestion', true, $lqId);
    }

    /**
     * 删除直播问题.
     *
     * @param int $lqId 直播问题ID，自增主键
     * @return bool
     * @requestExample({1})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     * @Validation(
     *  @OperatorValidator(0,{message:"非法直播问题ID",operator:["gt",0]})
     *)
     */
    public function deleteQuestionAsync(int $lqId)
    {
        return EellyClient::request('live/question', 'deleteQuestion', false, $lqId);
    }

    /**
     * 直播问题列表.
     *
     * @param array $condition 查询条件
     * @param array $condition ["inStatus"] 查询状态
     * @param int $currentPage 第几页
     * @param int $limit 每页条数
     * @param string $order 排序
     * @return array
     * @requestExample({"inStatus":[0,1]})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     */
    public function listQuestionPage(array $condition = [], int $currentPage = 1, int $limit = 10, string $order = 'base'): array
    {
        return EellyClient::request('live/question', 'listQuestionPage', true, $condition, $currentPage, $limit, $order);
    }

    /**
     * 直播问题列表.
     *
     * @param array $condition 查询条件
     * @param array $condition ["inStatus"] 查询状态
     * @param int $currentPage 第几页
     * @param int $limit 每页条数
     * @param string $order 排序
     * @return array
     * @requestExample({"inStatus":[0,1]})
     * @returnExample(true)
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年01月23日
     */
    public function listQuestionPageAsync(array $condition = [], int $currentPage = 1, int $limit = 10, string $order = 'base')
    {
        return EellyClient::request('live/question', 'listQuestionPage', false, $condition, $currentPage, $limit, $order);
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