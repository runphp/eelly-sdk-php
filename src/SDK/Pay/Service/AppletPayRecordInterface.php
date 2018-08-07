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

namespace Eelly\SDK\Pay\Service;

/**
 * 会员核心交易数据
 *
 * @author wechan
 */
interface AppletPayRecordInterface
{
    /**
     * 获取卖家账户收支明细列表.
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * prId          | int    | 交易ID
     * type          | int    | 明细类型:0.支出 1.收入
     * money         | int    | 金额
     * time          | int    | 时间戳
     * handleStatus  | int    | 处理状态 0.未完成 1.已完成
     *
     * @param int $storeId 店铺id
     * @param int $type 1.今日收入列表 2.累计收入列表 3.累计支出列表 4.累计收入支出列表(全部)
     * @param int $page 分页
     * @return array
     *
     * @author wechan
     * @since  2018年05月19日
     */
    public function getSellerPayRecordsList(int $storeId, int $type, int $page = 1): array;
    
    
    /**
     * 获取卖家账户收支明细详情.
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * billNo          | string    | 流水号
     * payType         | string    | 支付类型
     * payMoney        | int       | 支付金额
     * payStyle        | string    | 支付方式
     * payTime         | int       | 支付时间
     * handleStatus    | int       | 资金情况:0.未完成 1.已完成
     * remark          | string    | 备注
     *
     * @param int $payRecordId 交易id
     * @return array
     *
     * @author wechan
     * @since  2018年05月19日
     */
    public function getSellerPayRecordsDetails(int $payRecordId): array;
}
