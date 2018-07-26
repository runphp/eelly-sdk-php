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
use Eelly\SDK\Live\Service\AppletCreateQrCodeInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class AppletCreateQrCode implements AppletCreateQrCodeInterface
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
    public function getAccessToken(string $appid, string $secret): string
    {
        return EellyClient::request('live/appletCreateQrCode', 'getAccessToken', true, $appid, $secret);
    }

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
    public function getAccessTokenAsync(string $appid, string $secret)
    {
        return EellyClient::request('live/appletCreateQrCode', 'getAccessToken', false, $appid, $secret);
    }

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
    public function getWxACodeUnLimit(array $data): array
    {
        return EellyClient::request('live/appletCreateQrCode', 'getWxACodeUnLimit', true, $data);
    }

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
    public function getWxACodeUnLimitAsync(array $data)
    {
        return EellyClient::request('live/appletCreateQrCode', 'getWxACodeUnLimit', false, $data);
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