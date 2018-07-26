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

/**
 * 生成小程序的二维码.
 *
 * @author  肖俊明<xiaojunming@eelly.net>
 *
 * @since 2018年07月11日
 */
interface AppletCreateQrCodeInterface
{
    /**
     * 获取token数据.
     *
     * @param string $appid  应用ID
     * @param string $secret 应用密钥
     *
     * @return string
     * @requestExample({"appid":"wxedefdb5e49a75931","secret":"df55d98a84339d4acaaf541585e75a09"})
     * @returnExample("11_WzZlqEpb0BHfZJ92Lkr5hyWKuSaGR4yYnh4JofE0L1gzv6cVkGCN8c-hE-pdluPePbY-OJ5R_9_TbF-vng8S97VdFUI8liD4LeW7bpt3vCLRReaY_rDsZrSac7oPWUgABADKI")
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年07月11日
     */
    public function getAccessToken(string $appid, string $secret): string;

    /**
     * 生成二维码：【接口B：适用于需要的码数量极多的业务场景】.
     *
     * @param array $data
     *
     * @return array
     *
     * @requestExample({"data":{"appid":"wxedefdb5e49a75931","secret":"df55d98a84339d4acaaf541585e75a09","liveId":133}})
     * @returnExample({"imageUrl":"http://eellyimg.oss-cn-shenzhen.aliyuncs.com/live/live_1334.jpg"})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年07月10日
     */
    public function getWxACodeUnLimit(array $data): array;
}
