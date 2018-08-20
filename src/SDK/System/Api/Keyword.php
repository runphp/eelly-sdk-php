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

namespace Eelly\SDK\System\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\System\Service\KeywordInterface;
use Eelly\SDK\System\DTO\KeyWordDTO;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Keyword implements KeywordInterface
{
    /**
     * 获取敏感词.
     *
     * @param int $wordId 敏感词id
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return KeyWordDTO
     * @requestExample([1])
     * @returnExample({"word": "敏感词示例","fwId": "1","type": "1","adminId": "1","adminName": "admin","createdTime": "1503716527"})
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since   2017-8-26
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function getWord(int $wordId): KeyWordDTO
    {
        return EellyClient::request('system/keyword', 'getWord', true, $wordId);
    }

    /**
     * 获取敏感词.
     *
     * @param int $wordId 敏感词id
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return KeyWordDTO
     * @requestExample([1])
     * @returnExample({"word": "敏感词示例","fwId": "1","type": "1","adminId": "1","adminName": "admin","createdTime": "1503716527"})
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since   2017-8-26
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function getWordAsync(int $wordId)
    {
        return EellyClient::request('system/keyword', 'getWord', false, $wordId);
    }

    /**
     * 添加敏感词.
     *
     * @param array  $data           敏感词内容
     * @param string $data['word']   敏感词名称
     * @param int    $data['type']   敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $data['mode']   处理方式：（1：警告  2：屏蔽  3：替换）
     * @param string $data['reword'] 替换词
     * @param UidDTO $user           用户登录信息
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([{"word":"敏感词示例","type":"1","mode":"3","reword":"我是替换词"}])
     * @returnExample(true)
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2017-8-26
     */
    public function addWord(array $data, UidDTO $user = null): bool
    {
        return EellyClient::request('system/keyword', 'addWord', true, $data, $user);
    }

    /**
     * 添加敏感词.
     *
     * @param array  $data           敏感词内容
     * @param string $data['word']   敏感词名称
     * @param int    $data['type']   敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $data['mode']   处理方式：（1：警告  2：屏蔽  3：替换）
     * @param string $data['reword'] 替换词
     * @param UidDTO $user           用户登录信息
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([{"word":"敏感词示例","type":"1","mode":"3","reword":"我是替换词"}])
     * @returnExample(true)
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2017-8-26
     */
    public function addWordAsync(array $data, UidDTO $user = null)
    {
        return EellyClient::request('system/keyword', 'addWord', false, $data, $user);
    }

    /**
     * 添加敏感词.
     *
     * @param array  $data           敏感词内容
     * @param string $data['word']   敏感词名称
     * @param int    $data['type']   敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $data['mode']   处理方式：（1：警告  2：屏蔽  3：替换）
     * @param string $data['reword'] 替换词
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([{"word":"敏感词示例","type":"1","mode":"3","reword":"我是替换词"}])
     * @returnExample(true)
     *
     * @author zhangyangxun
     * @since 2018.07.31
     */
    public function addWordManage(array $data): bool
    {
        return EellyClient::request('system/keyword', 'addWordManage', true, $data);
    }

    /**
     * 添加敏感词.
     *
     * @param array  $data           敏感词内容
     * @param string $data['word']   敏感词名称
     * @param int    $data['type']   敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $data['mode']   处理方式：（1：警告  2：屏蔽  3：替换）
     * @param string $data['reword'] 替换词
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([{"word":"敏感词示例","type":"1","mode":"3","reword":"我是替换词"}])
     * @returnExample(true)
     *
     * @author zhangyangxun
     * @since 2018.07.31
     */
    public function addWordManageAsync(array $data)
    {
        return EellyClient::request('system/keyword', 'addWordManage', false, $data);
    }

    /**
     * 修改敏感词.
     *
     * @param int 敏感词id
     * @param array  $data           敏感词内容
     * @param string $data['word']   敏感词名称
     * @param int    $data['type']   敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $data['mode']   处理方式：（1：警告  2：屏蔽  3：替换）
     * @param string $data['reword'] 替换词
     * @param UidDTO $user           用户登录信息
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([1,{"word": "敏感词示例","type": "1","mode":"3","reword":"我是替换词"}])
     * @returnExample(true)
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2016-08-26
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function updateWord(int $wordId, array $data, UidDTO $user = null): bool
    {
        return EellyClient::request('system/keyword', 'updateWord', true, $wordId, $data, $user);
    }

    /**
     * 修改敏感词.
     *
     * @param int 敏感词id
     * @param array  $data           敏感词内容
     * @param string $data['word']   敏感词名称
     * @param int    $data['type']   敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $data['mode']   处理方式：（1：警告  2：屏蔽  3：替换）
     * @param string $data['reword'] 替换词
     * @param UidDTO $user           用户登录信息
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([1,{"word": "敏感词示例","type": "1","mode":"3","reword":"我是替换词"}])
     * @returnExample(true)
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2016-08-26
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function updateWordAsync(int $wordId, array $data, UidDTO $user = null)
    {
        return EellyClient::request('system/keyword', 'updateWord', false, $wordId, $data, $user);
    }

    /**
     * 修改敏感词.
     *
     * @param int 敏感词id
     * @param array  $data           敏感词内容
     * @param string $data['word']   敏感词名称
     * @param int    $data['type']   敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $data['mode']   处理方式：（1：警告  2：屏蔽  3：替换）
     * @param string $data['reword'] 替换词
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([1,{"word": "敏感词示例","type": "1","mode":"3","reword":"我是替换词"}])
     * @returnExample(true)
     *
     * @author zhangyangxun
     *
     * @since 2018.07.31
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function updateWordManage(int $wordId, array $data): bool
    {
        return EellyClient::request('system/keyword', 'updateWordManage', true, $wordId, $data);
    }

    /**
     * 修改敏感词.
     *
     * @param int 敏感词id
     * @param array  $data           敏感词内容
     * @param string $data['word']   敏感词名称
     * @param int    $data['type']   敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $data['mode']   处理方式：（1：警告  2：屏蔽  3：替换）
     * @param string $data['reword'] 替换词
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([1,{"word": "敏感词示例","type": "1","mode":"3","reword":"我是替换词"}])
     * @returnExample(true)
     *
     * @author zhangyangxun
     *
     * @since 2018.07.31
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function updateWordManageAsync(int $wordId, array $data)
    {
        return EellyClient::request('system/keyword', 'updateWordManage', false, $wordId, $data);
    }

    /**
     * 删除敏感词.
     *
     * @param int 敏感词id
     * @param UidDTO $user 用户登录信息
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([1])
     * @returnExample(true)
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2017-08-26
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function deleteWord(int $wordId, UidDTO $user = null): bool
    {
        return EellyClient::request('system/keyword', 'deleteWord', true, $wordId, $user);
    }

    /**
     * 删除敏感词.
     *
     * @param int 敏感词id
     * @param UidDTO $user 用户登录信息
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([1])
     * @returnExample(true)
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2017-08-26
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function deleteWordAsync(int $wordId, UidDTO $user = null)
    {
        return EellyClient::request('system/keyword', 'deleteWord', false, $wordId, $user);
    }

    /**
     * 删除敏感词.
     *
     * @param int 敏感词id
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([1])
     * @returnExample(true)
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2017-08-26
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function deleteWordManage(int $wordId): bool
    {
        return EellyClient::request('system/keyword', 'deleteWordManage', true, $wordId);
    }

    /**
     * 删除敏感词.
     *
     * @param int 敏感词id
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return bool
     * @requestExample([1])
     * @returnExample(true)
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2017-08-26
     * @Validation(
     *   @OperatorValidator(0,{message:"非法的敏感词id",operator:["gt",0]})
     * )
     */
    public function deleteWordManageAsync(int $wordId)
    {
        return EellyClient::request('system/keyword', 'deleteWordManage', false, $wordId);
    }

    /**
     * 分页获取敏感词.
     *
     * @param array  $condition         敏感词条件
     * @param string $condition['word'] 敏感词名称
     * @param int    $condition['type'] 敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $limit             分页条数
     * @param int    $currentPage       页码
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return array 返回分页结果
     * @requestExample(["condition": [{"word": "敏感词示例","type": "1","mode":"1","reword":"替换词"}],"limit": "10","currentPage": "1"])
     * @returnExample(["items": [{"fw_id": "1", "type": "1","word": "敏感词示例","mode":"3","reword":"替换词","admin_id": "1","admin_name": "admin","created_time": "1503716527","update_time": "2017-08-26 03:52:15"}],"page": {"first": 1,"before": 1,"current": 1,"last": 1,"next": 1,"total_pages": 1,"total_items": 1,"limit": 10}])
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2017-08-26
     * @Validation(
     *   @OperatorValidator(1,{message:"非法的数据条数",operator:["gt",0]}),
     *   @OperatorValidator(2,{message:"非法的页码",operator:["gt",0]})
     * )
     */
    public function listWordPage(array $condition = [], int $currentPage = 1, int $limit = 10): array
    {
        return EellyClient::request('system/keyword', 'listWordPage', true, $condition, $currentPage, $limit);
    }

    /**
     * 分页获取敏感词.
     *
     * @param array  $condition         敏感词条件
     * @param string $condition['word'] 敏感词名称
     * @param int    $condition['type'] 敏感词类型／1 商品标题 2 店主咨询 4 商品评论 ……
     * @param int    $limit             分页条数
     * @param int    $currentPage       页码
     *
     * @throws \Eelly\SDK\System\Exception\SystemException
     *
     * @return array 返回分页结果
     * @requestExample(["condition": [{"word": "敏感词示例","type": "1","mode":"1","reword":"替换词"}],"limit": "10","currentPage": "1"])
     * @returnExample(["items": [{"fw_id": "1", "type": "1","word": "敏感词示例","mode":"3","reword":"替换词","admin_id": "1","admin_name": "admin","created_time": "1503716527","update_time": "2017-08-26 03:52:15"}],"page": {"first": 1,"before": 1,"current": 1,"last": 1,"next": 1,"total_pages": 1,"total_items": 1,"limit": 10}])
     *
     * @author zhoujiansheng<zhoujiansheng@eelly.net>
     *
     * @since 2017-08-26
     * @Validation(
     *   @OperatorValidator(1,{message:"非法的数据条数",operator:["gt",0]}),
     *   @OperatorValidator(2,{message:"非法的页码",operator:["gt",0]})
     * )
     */
    public function listWordPageAsync(array $condition = [], int $currentPage = 1, int $limit = 10)
    {
        return EellyClient::request('system/keyword', 'listWordPage', false, $condition, $currentPage, $limit);
    }

    /**
     * 获取敏感词数据下载链接
     *
     * @param array  $data 请求参数
     * @param string $data[0]['db_name'] ecm_filter_word_0(1,2,4,8), 0 全部范围 1 商品名称 2 店主咨询 4 商品评论 8 IM聊天
     * @return array
     *
     * @requestExample([{"db_name": "ecm_filter_word_0"}, {"db_name": "ecm_filter_word_1"}])
     * @returnExample([{"url": "https://data.eelly.com/download/file/data/016023cc58bba3fa257c99a405ae94db.zip", "db_name": "ecm_filter_word_0"},{"url": "https://data.eelly.com/download/file/data/7d5c4e790c7d63d48382767fd19ee35f.zip", "db_name": "ecm_filter_word_1"}])
     *
     * @author 张扬熏<542207975@qq.com>
     * @since 2018.07.30
     */
    public function getSqliteFile(array $data): array
    {
        return EellyClient::request('system/keyword', 'getSqliteFile', true, $data);
    }

    /**
     * 获取敏感词数据下载链接
     *
     * @param array  $data 请求参数
     * @param string $data[0]['db_name'] ecm_filter_word_0(1,2,4,8), 0 全部范围 1 商品名称 2 店主咨询 4 商品评论 8 IM聊天
     * @return array
     *
     * @requestExample([{"db_name": "ecm_filter_word_0"}, {"db_name": "ecm_filter_word_1"}])
     * @returnExample([{"url": "https://data.eelly.com/download/file/data/016023cc58bba3fa257c99a405ae94db.zip", "db_name": "ecm_filter_word_0"},{"url": "https://data.eelly.com/download/file/data/7d5c4e790c7d63d48382767fd19ee35f.zip", "db_name": "ecm_filter_word_1"}])
     *
     * @author 张扬熏<542207975@qq.com>
     * @since 2018.07.30
     */
    public function getSqliteFileAsync(array $data)
    {
        return EellyClient::request('system/keyword', 'getSqliteFile', false, $data);
    }

    /**
     * 存储敏感聊天记录
     *
     * @param array  $data              敏感词记录内容
     * @param string $data['ip']        发送人IP
     * @param string $data【'deviceNo'] 设备号
     * @param string $data['content']   聊天内容
     * @param int    $data['time']      聊天时间
     * @param UidDTO|null $user
     * @return bool
     *
     * @requestExample({"ip": "127.0.0.1", "device_no": "e31nxd2d009a", "content": "敏感词", "time": 1532929978})
     * @returnExample(true)
     *
     * @author 张扬熏<542207975@qq.com>
     * @since 2018.07.30
     */
    public function saveIllegalLog(array $data, UidDTO $user = null): bool
    {
        return EellyClient::request('system/keyword', 'saveIllegalLog', true, $data, $user);
    }

    /**
     * 存储敏感聊天记录
     *
     * @param array  $data              敏感词记录内容
     * @param string $data['ip']        发送人IP
     * @param string $data【'deviceNo'] 设备号
     * @param string $data['content']   聊天内容
     * @param int    $data['time']      聊天时间
     * @param UidDTO|null $user
     * @return bool
     *
     * @requestExample({"ip": "127.0.0.1", "device_no": "e31nxd2d009a", "content": "敏感词", "time": 1532929978})
     * @returnExample(true)
     *
     * @author 张扬熏<542207975@qq.com>
     * @since 2018.07.30
     */
    public function saveIllegalLogAsync(array $data, UidDTO $user = null)
    {
        return EellyClient::request('system/keyword', 'saveIllegalLog', false, $data, $user);
    }

    /**
     * 生成敏感词sqlite文件
     *
     * @param int $type  敏感词类型：1 商品标题 2 店主咨询 4 商品评论 8 IM聊天
     * @return array  压缩包链接
     *
     * @requestExample({"type": 1})
     * @returnExample({"url": "https://data.eelly.com/download/file/data/54bed14356bc0fdba5d86d1be25f30ab.zip"})
     *
     * @author 张扬熏<542207975@qq.com>
     * @since 2018.07.30
     */
    public function createSqliteDb(int $type): array
    {
        return EellyClient::request('system/keyword', 'createSqliteDb', true, $type);
    }

    /**
     * 生成敏感词sqlite文件
     *
     * @param int $type  敏感词类型：1 商品标题 2 店主咨询 4 商品评论 8 IM聊天
     * @return array  压缩包链接
     *
     * @requestExample({"type": 1})
     * @returnExample({"url": "https://data.eelly.com/download/file/data/54bed14356bc0fdba5d86d1be25f30ab.zip"})
     *
     * @author 张扬熏<542207975@qq.com>
     * @since 2018.07.30
     */
    public function createSqliteDbAsync(int $type)
    {
        return EellyClient::request('system/keyword', 'createSqliteDb', false, $type);
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