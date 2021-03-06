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

namespace Eelly\SDK\Goods\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Goods\Service\DescriptionInterface;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Description implements DescriptionInterface
{
    /**
     * 新增商品描述
     * 新增商品描述信息.
     *
     * @param int               $goodsId                       商品id
     * @param array             $descrData                     描述数据
     * @param int               $descrData["0"]["type"]        描述类型 1 pc 2 手机
     * @param string            $descrData["0"]["description"] 描述内容
     * @param \Eelly\DTO\UidDTO $user                          登录用户信息
     *
     * @throws \Eelly\SDK\Goods\Exception\GoodsException
     *
     * @return bool 新增结果
     * @requestExample({
     *     "goodsId":1,
     *     "descrData":[
     *         {
     *             "type":1,
     *             "description":"描述信息"
     *         }
     *     ]
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月17日
     */
    public function addDescription(int $goodsId, array $descrData, UidDTO $user = null): bool
    {
        return EellyClient::request('goods/description', __FUNCTION__, true, $goodsId, $descrData, $user);
    }

    /**
     * 新增商品描述
     * 新增商品描述信息.
     *
     * @param int               $goodsId                       商品id
     * @param array             $descrData                     描述数据
     * @param int               $descrData["0"]["type"]        描述类型 1 pc 2 手机
     * @param string            $descrData["0"]["description"] 描述内容
     * @param \Eelly\DTO\UidDTO $user                          登录用户信息
     *
     * @throws \Eelly\SDK\Goods\Exception\GoodsException
     *
     * @return bool 新增结果
     * @requestExample({
     *     "goodsId":1,
     *     "descrData":[
     *         {
     *             "type":1,
     *             "description":"描述信息"
     *         }
     *     ]
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月17日
     */
    public function addDescriptionAsync(int $goodsId, array $descrData, UidDTO $user = null)
    {
        return EellyClient::request('goods/description', __FUNCTION__, false, $goodsId, $descrData, $user);
    }

    /**
     * 修改商品描述
     * 修改商品描述信息.
     *
     * @param int               $goodsId                  商品id
     * @param array             $descrData                描述数据
     * @param int               $descrData["type"]        描述类型 1 pc 2 手机
     * @param string            $descrData["description"] 描述内容
     * @param \Eelly\DTO\UidDTO $user                     登录用户信息
     *
     * @throws \Eelly\SDK\Goods\Exception\GoodsException
     *
     * @return bool 修改结果
     * @requestExample({
     *     "goodsId":1,
     *     "descrData":{
     *         "type":2,
     *         "description":"描述信息"
     *     }
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月17日
     */
    public function updateDescription(int $goodsId, array $descrData, UidDTO $user = null): bool
    {
        return EellyClient::request('goods/description', __FUNCTION__, true, $goodsId, $descrData, $user);
    }

    /**
     * 修改商品描述
     * 修改商品描述信息.
     *
     * @param int               $goodsId                  商品id
     * @param array             $descrData                描述数据
     * @param int               $descrData["type"]        描述类型 1 pc 2 手机
     * @param string            $descrData["description"] 描述内容
     * @param \Eelly\DTO\UidDTO $user                     登录用户信息
     *
     * @throws \Eelly\SDK\Goods\Exception\GoodsException
     *
     * @return bool 修改结果
     * @requestExample({
     *     "goodsId":1,
     *     "descrData":{
     *         "type":2,
     *         "description":"描述信息"
     *     }
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月17日
     */
    public function updateDescriptionAsync(int $goodsId, array $descrData, UidDTO $user = null)
    {
        return EellyClient::request('goods/description', __FUNCTION__, false, $goodsId, $descrData, $user);
    }

    /**
     * 删除商品描述
     * 删除商品描述信息.
     *
     * @param int               $goodsId 商品id
     * @param \Eelly\DTO\UidDTO $user    登录用户信息
     *
     * @throws \Eelly\SDK\Goods\Exception\GoodsException
     *
     * @return bool 删除结果
     * @requestExample({
     *     "goodsId":1
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月17日
     */
    public function deleteDescription(int $goodsId, UidDTO $user = null): bool
    {
        return EellyClient::request('goods/description', __FUNCTION__, true, $goodsId, $user);
    }

    /**
     * 删除商品描述
     * 删除商品描述信息.
     *
     * @param int               $goodsId 商品id
     * @param \Eelly\DTO\UidDTO $user    登录用户信息
     *
     * @throws \Eelly\SDK\Goods\Exception\GoodsException
     *
     * @return bool 删除结果
     * @requestExample({
     *     "goodsId":1
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月17日
     */
    public function deleteDescriptionAsync(int $goodsId, UidDTO $user = null)
    {
        return EellyClient::request('goods/description', __FUNCTION__, false, $goodsId, $user);
    }

    /**
     * 获取商品描述
     * 获取商品描述信息.
     *
     * @param int $goodsId 商品id
     *
     * @throws \Eelly\SDK\Goods\Exception\GoodsException
     *
     * @return array 描述信息
     * @requestExample({
     *     "goodsId":1
     * })
     * @returnExample({
     *     "goodsName":"商品名称",
     *     "pcDescription":"pc描述",
     *     "mobileDescription":"手机描述",
     *     "createdTime":"1970-01-01 01:01:01"
     * })
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月17日
     */
    public function getDescription(int $goodsId): array
    {
        return EellyClient::request('goods/description', __FUNCTION__, true, $goodsId);
    }

    /**
     * 获取商品描述
     * 获取商品描述信息.
     *
     * @param int $goodsId 商品id
     *
     * @throws \Eelly\SDK\Goods\Exception\GoodsException
     *
     * @return array 描述信息
     * @requestExample({
     *     "goodsId":1
     * })
     * @returnExample({
     *     "goodsName":"商品名称",
     *     "pcDescription":"pc描述",
     *     "mobileDescription":"手机描述",
     *     "createdTime":"1970-01-01 01:01:01"
     * })
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月17日
     */
    public function getDescriptionAsync(int $goodsId)
    {
        return EellyClient::request('goods/description', __FUNCTION__, false, $goodsId);
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