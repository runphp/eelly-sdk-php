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

namespace Eelly\SDK\Log\Service;

use Eelly\SDK\Log\DTO\GoodsHandleDTO;

/**
 * @author eellytools<localhost.shell@gmail.com>
 */
interface GoodsHandleInterface
{
    /**
     * 获取一条商品操作日志.
     *
     * @param int $goodsHandleId 商品操作日志ID
     *
     * @throws \Eelly\SDK\Log\Exception\GoodsHandleException
     *
     * @return GoodsHandleDTO
     * @requestExample({goodsHandleId:1})
     * @returnExample({"lghId":1,"type":"1", "goodsId":"1","name":"商品名称","adminId":"1","remark":{'handle_page':'index.html',"createdTime":"2017-09-02 17:45:21"}})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年09月04日
     */
    public function getGoodsHandle(int $goodsHandleId): GoodsHandleDTO;

    /**
     * 商品操作日志.
     *
     * @param int    $data ['type'] 商品操作类型
     * @param int    $data ['goodsId'] 商品ID
     * @param string $data ['name'] 商品名
     * @param int    $data ['adminId'] 管理员ID
     * @param string $data ['adminName'] 管理员名
     * @param string $data ['remark']  备注 json 格式保存为了以后查询方便
     * @param array  $data 日志数据
     *
     * @throws \Eelly\SDK\Log\Exception\GoodsHandleException
     *
     * @return bool true|false
     * @requestExample({"data":{"type":"1", "goodsId":"商品ID不能为空","adminId":"1","remark":{'handle_page':'index.html'} }})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年08月26日
     */
    public function addGoodsHandle(array $data): bool;

    /**
     * @author eellytools<localhost.shell@gmail.com>
     */
    //public function updateGoodsHandle(int $GoodsHandleId, array $data): bool;

    /**
     * @author eellytools<localhost.shell@gmail.com>
     */
    //public function deleteGoodsHandle(int $GoodsHandleId): bool;

    /**
     * 分页获取操作信息.
     *
     * @param int    $type        类型
     * @param int    $goodsId     商品id
     * @param string $name        商品名
     * @param int    $adminId     管理员ID
     * @param string $adminName   管理员名称
     * @param int    $currentPage 第几页
     * @param int    $limit       条数
     *
     * @throws \Eelly\SDK\Log\Exception\GoodsHandleException
     *
     * @return array
     * @requestExample({"type":"1", "goodsId":"1","name":"商品名","adminId":1,"adminName":"admin"} )
     * @returnExample({"type":"1", "goodsId":"商品ID不能为空","adminId":"1","remark":{'handle_page':'index.html'} })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年09月04日
     */
    public function listGoodsHandlePage(int $type = 0, int $goodsId = 0, string $name = '', int $adminId = 0, string $adminName = '', int $currentPage = 1, int $limit = 10): array;
}
