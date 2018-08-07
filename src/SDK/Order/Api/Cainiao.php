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

namespace Eelly\SDK\Order\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Order\Service\CainiaoInterface;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Cainiao implements CainiaoInterface
{
    /**
     * 生成小程序订单.
     *
     * @param int    $storeId          店铺ID
     * @param array  $orderIds         订单ID
     * @param array  $sender           发货人信息
     * @param string $sender["mobile"] 手机号码
     * @param string $sender["phone"]  固定电话
     * @param string $sender["name"]   姓名
     *
     * @return array
     *
     * @requestExample({
     *     "storeId":148086,
     *     "orderIds":[5000057],
     *     "sender":{
     *        "mobile": 13533333333,
     *        "name": "测试打印，请勿过来",
     *        "phone": 13533333333
     *     }
     * })
     * @returnExample({
     *       "waybillCode": "31920630202861",
     *       "printData": "{\"data\":{\"cpCode\":\"FAST\",\"needEncrypt\":false,\"parent\":false,\"recipient\":{\"address\":{\"city\":\"市辖区\",\"detail\":\"2222\",\"province\":\"北京市\"},\"mobile\":\"13333333333\",\"name\":\"sss\"},\"routingInfo\":{\"consolidation\":{},\"origin\":{\"code\":\"FAST\"},\"sortation\":{}},\"sender\":{\"address\":{\"city\":\"北京市\",\"detail\":\"花家地社区卫生服务站\",\"province\":\"北京\",\"town\":\"望京街道\"},\"mobile\":\"13533333333\",\"name\":\"测试打印，请勿过来\",\"phone\":\"13533333333\"},\"shippingOption\":{\"code\":\"STANDARD_EXPRESS\",\"title\":\"标准快递\"},\"waybillCode\":\"31920630202861\"},\"signature\":\"MD:s7E4gCASc3iyVCv8lcl/3Q==\",\"templateURL\":\"http://cloudprint.cainiao.com/template/standard/74806/29\"}",
     *       "objectId": "5000057"
     *   })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月25日
     */
    public function createPrintOrder(int $storeId, array $orderIds, array $sender): array
    {
        return EellyClient::request('order/cainiao', 'createPrintOrder', true, $storeId, $orderIds, $sender);
    }

    /**
     * 生成小程序订单.
     *
     * @param int    $storeId          店铺ID
     * @param array  $orderIds         订单ID
     * @param array  $sender           发货人信息
     * @param string $sender["mobile"] 手机号码
     * @param string $sender["phone"]  固定电话
     * @param string $sender["name"]   姓名
     *
     * @return array
     *
     * @requestExample({
     *     "storeId":148086,
     *     "orderIds":[5000057],
     *     "sender":{
     *        "mobile": 13533333333,
     *        "name": "测试打印，请勿过来",
     *        "phone": 13533333333
     *     }
     * })
     * @returnExample({
     *       "waybillCode": "31920630202861",
     *       "printData": "{\"data\":{\"cpCode\":\"FAST\",\"needEncrypt\":false,\"parent\":false,\"recipient\":{\"address\":{\"city\":\"市辖区\",\"detail\":\"2222\",\"province\":\"北京市\"},\"mobile\":\"13333333333\",\"name\":\"sss\"},\"routingInfo\":{\"consolidation\":{},\"origin\":{\"code\":\"FAST\"},\"sortation\":{}},\"sender\":{\"address\":{\"city\":\"北京市\",\"detail\":\"花家地社区卫生服务站\",\"province\":\"北京\",\"town\":\"望京街道\"},\"mobile\":\"13533333333\",\"name\":\"测试打印，请勿过来\",\"phone\":\"13533333333\"},\"shippingOption\":{\"code\":\"STANDARD_EXPRESS\",\"title\":\"标准快递\"},\"waybillCode\":\"31920630202861\"},\"signature\":\"MD:s7E4gCASc3iyVCv8lcl/3Q==\",\"templateURL\":\"http://cloudprint.cainiao.com/template/standard/74806/29\"}",
     *       "objectId": "5000057"
     *   })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月25日
     */
    public function createPrintOrderAsync(int $storeId, array $orderIds, array $sender)
    {
        return EellyClient::request('order/cainiao', 'createPrintOrder', false, $storeId, $orderIds, $sender);
    }

    /**
     * 生成小程序订单.
     *
     * @param int    $storeId                店铺ID
     * @param array  $orderInfo              订单数据
     * @param string $orderInfo["province"]  省
     * @param string $orderInfo["city"]      城市
     * @param string $orderInfo["address"]   具体地址
     * @param string $orderInfo["mobile"]    手机号码
     * @param string $orderInfo["phone"]     固定电话
     * @param string $orderInfo["consignee"] 收件人姓名
     * @param array  $orderInfo["goodsList"] 商品信息
     * @param array  $orderInfo["orderIds"]  订单ID
     * @param array  $sender                 发货人信息
     * @param string $sender["mobile"]       手机号码
     * @param string $sender["phone"]        固定电话
     * @param string $sender["name"]         姓名
     *
     * @requestExample({
     *     "storeId":148086,
     *     "orderInfo":[{
     *      "province": "北京市",
     *      "city": "市辖区",
     *      "address": "2222",
     *      "mobile": "13333333333",
     *      "phone": "",
     *      "consignee": "sss",
     *      "goodsList": [
     *        {
     *          "count": "2",
     *          "name": "【莫琼小店】 2018新款 针织衫/毛衣  包邮"
     *        },
     *        {
     *          "count": "1",
     *          "name": "SD发生发发大饭店"
     *        }
     *      ],
     *      "orderIds": [
     *        "5000057"
     *      ]
     *    }],
     *     "sender":{
     *        "mobile": 13533333333,
     *        "name": "测试打印，请勿过来",
     *        "phone": 13533333333
     *        }
     * })
     * @returnExample({
     *       "waybillCode": "31920630202861",
     *       "printData": "{\"data\":{\"cpCode\":\"FAST\",\"needEncrypt\":false,\"parent\":false,\"recipient\":{\"address\":{\"city\":\"市辖区\",\"detail\":\"2222\",\"province\":\"北京市\"},\"mobile\":\"13333333333\",\"name\":\"sss\"},\"routingInfo\":{\"consolidation\":{},\"origin\":{\"code\":\"FAST\"},\"sortation\":{}},\"sender\":{\"address\":{\"city\":\"北京市\",\"detail\":\"花家地社区卫生服务站\",\"province\":\"北京\",\"town\":\"望京街道\"},\"mobile\":\"13533333333\",\"name\":\"测试打印，请勿过来\",\"phone\":\"13533333333\"},\"shippingOption\":{\"code\":\"STANDARD_EXPRESS\",\"title\":\"标准快递\"},\"waybillCode\":\"31920630202861\"},\"signature\":\"MD:s7E4gCASc3iyVCv8lcl/3Q==\",\"templateURL\":\"http://cloudprint.cainiao.com/template/standard/74806/29\"}",
     *       "objectId": "5000057"
     *   })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月25日
     */
    public function createMallPrintOrder(int $storeId, $orderInfo, $sender): array
    {
        return EellyClient::request('order/cainiao', 'createMallPrintOrder', true, $storeId, $orderInfo, $sender);
    }

    /**
     * 生成小程序订单.
     *
     * @param int    $storeId                店铺ID
     * @param array  $orderInfo              订单数据
     * @param string $orderInfo["province"]  省
     * @param string $orderInfo["city"]      城市
     * @param string $orderInfo["address"]   具体地址
     * @param string $orderInfo["mobile"]    手机号码
     * @param string $orderInfo["phone"]     固定电话
     * @param string $orderInfo["consignee"] 收件人姓名
     * @param array  $orderInfo["goodsList"] 商品信息
     * @param array  $orderInfo["orderIds"]  订单ID
     * @param array  $sender                 发货人信息
     * @param string $sender["mobile"]       手机号码
     * @param string $sender["phone"]        固定电话
     * @param string $sender["name"]         姓名
     *
     * @requestExample({
     *     "storeId":148086,
     *     "orderInfo":[{
     *      "province": "北京市",
     *      "city": "市辖区",
     *      "address": "2222",
     *      "mobile": "13333333333",
     *      "phone": "",
     *      "consignee": "sss",
     *      "goodsList": [
     *        {
     *          "count": "2",
     *          "name": "【莫琼小店】 2018新款 针织衫/毛衣  包邮"
     *        },
     *        {
     *          "count": "1",
     *          "name": "SD发生发发大饭店"
     *        }
     *      ],
     *      "orderIds": [
     *        "5000057"
     *      ]
     *    }],
     *     "sender":{
     *        "mobile": 13533333333,
     *        "name": "测试打印，请勿过来",
     *        "phone": 13533333333
     *        }
     * })
     * @returnExample({
     *       "waybillCode": "31920630202861",
     *       "printData": "{\"data\":{\"cpCode\":\"FAST\",\"needEncrypt\":false,\"parent\":false,\"recipient\":{\"address\":{\"city\":\"市辖区\",\"detail\":\"2222\",\"province\":\"北京市\"},\"mobile\":\"13333333333\",\"name\":\"sss\"},\"routingInfo\":{\"consolidation\":{},\"origin\":{\"code\":\"FAST\"},\"sortation\":{}},\"sender\":{\"address\":{\"city\":\"北京市\",\"detail\":\"花家地社区卫生服务站\",\"province\":\"北京\",\"town\":\"望京街道\"},\"mobile\":\"13533333333\",\"name\":\"测试打印，请勿过来\",\"phone\":\"13533333333\"},\"shippingOption\":{\"code\":\"STANDARD_EXPRESS\",\"title\":\"标准快递\"},\"waybillCode\":\"31920630202861\"},\"signature\":\"MD:s7E4gCASc3iyVCv8lcl/3Q==\",\"templateURL\":\"http://cloudprint.cainiao.com/template/standard/74806/29\"}",
     *       "objectId": "5000057"
     *   })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月25日
     */
    public function createMallPrintOrderAsync(int $storeId, $orderInfo, $sender)
    {
        return EellyClient::request('order/cainiao', 'createMallPrintOrder', false, $storeId, $orderInfo, $sender);
    }

    /**
     * 判断是否绑定.
     *
     * @param int         $type   绑定类型：1 淘宝帐户 2 菜鸟帐户
     * @param UidDTO|null $uidDTO
     *
     * @return int
     * @requestExample({"type":1})
     * @returnExample(1)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月23日
     */
    public function isBindToken(int $type, UidDTO $uidDTO = null): int
    {
        return EellyClient::request('order/cainiao', 'isBindToken', true, $type, $uidDTO);
    }

    /**
     * 判断是否绑定.
     *
     * @param int         $type   绑定类型：1 淘宝帐户 2 菜鸟帐户
     * @param UidDTO|null $uidDTO
     *
     * @return int
     * @requestExample({"type":1})
     * @returnExample(1)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月23日
     */
    public function isBindTokenAsync(int $type, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/cainiao', 'isBindToken', false, $type, $uidDTO);
    }

    /**
     * 获取绑定数据.
     * ### 返回数据说明.
     *
     * 字段|类型|说明
     * -------|-------|--------------
     * type   |int    |1 淘宝帐户 2 菜鸟帐户
     * status |string |0表示未绑定，1表示绑定， 2 解绑状态
     *
     * @param UidDTO|null $uidDTO
     *
     * @return array
     *
     * @requestExample()
     * @returnExample([
     *   {
     *       "type": 1,
     *       "status": "1"
     *   },
     *   {
     *       "type": 2,
     *       "status": 0
     *   }
     *])
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月24日
     */
    public function getBindToken(UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/cainiao', 'getBindToken', true, $uidDTO);
    }

    /**
     * 获取绑定数据.
     * ### 返回数据说明.
     *
     * 字段|类型|说明
     * -------|-------|--------------
     * type   |int    |1 淘宝帐户 2 菜鸟帐户
     * status |string |0表示未绑定，1表示绑定， 2 解绑状态
     *
     * @param UidDTO|null $uidDTO
     *
     * @return array
     *
     * @requestExample()
     * @returnExample([
     *   {
     *       "type": 1,
     *       "status": "1"
     *   },
     *   {
     *       "type": 2,
     *       "status": 0
     *   }
     *])
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月24日
     */
    public function getBindTokenAsync(UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/cainiao', 'getBindToken', false, $uidDTO);
    }

    /**
     * 获取用户可选的模板.
     *
     * @param UidDTO|null $uidDTO 登录用户数据
     *
     * @return array
     * @returnExample(
     *   [
     *       {
     *           "cpCode": "test",
     *           "name": "蓝牙通用模板",
     *           "size": "76*180",
     *           "images": "https://img01.eelly.com/G06/M00/00/4A/small_148_rIYBAFqhzrOIIZfDAAD34jJKXesAAAdXAGJLdIAAPf6066.jpg"
     *       },
     *       {
     *           "cpCode": "emptyTest",
     *           "name": "蓝牙通用模板",
     *           "size": "76*180",
     *           "images": "https://img01.eelly.com/G06/M00/00/4A/small_148_rIYBAFqhzrOIIZfDAAD34jJKXesAAAdXAGJLdIAAPf6066.jpg"
     *       },
     *       {
     *           "cpCode": "FAST",
     *           "name": "百世",
     *           "size": "76*170",
     *           "images": "https://img01.eelly.com/G06/M00/00/4A/small_148_rIYBAFqhzrOIIZfDAAD34jJKXesAAAdXAGJLdIAAPf6066.jpg"
     *       }
     *   ])
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月23日
     */
    public function getTemplateList(UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/cainiao', 'getTemplateList', true, $uidDTO);
    }

    /**
     * 获取用户可选的模板.
     *
     * @param UidDTO|null $uidDTO 登录用户数据
     *
     * @return array
     * @returnExample(
     *   [
     *       {
     *           "cpCode": "test",
     *           "name": "蓝牙通用模板",
     *           "size": "76*180",
     *           "images": "https://img01.eelly.com/G06/M00/00/4A/small_148_rIYBAFqhzrOIIZfDAAD34jJKXesAAAdXAGJLdIAAPf6066.jpg"
     *       },
     *       {
     *           "cpCode": "emptyTest",
     *           "name": "蓝牙通用模板",
     *           "size": "76*180",
     *           "images": "https://img01.eelly.com/G06/M00/00/4A/small_148_rIYBAFqhzrOIIZfDAAD34jJKXesAAAdXAGJLdIAAPf6066.jpg"
     *       },
     *       {
     *           "cpCode": "FAST",
     *           "name": "百世",
     *           "size": "76*170",
     *           "images": "https://img01.eelly.com/G06/M00/00/4A/small_148_rIYBAFqhzrOIIZfDAAD34jJKXesAAAdXAGJLdIAAPf6066.jpg"
     *       }
     *   ])
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月23日
     */
    public function getTemplateListAsync(UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/cainiao', 'getTemplateList', false, $uidDTO);
    }

    /**
     * 获取电子面单快递.
     *
     * @param int         $type   绑定类型：1 淘宝帐户 2 菜鸟帐户
     * @param UidDTO|null $uidDTO 登录用户ID
     *
     * @return array
     * @returnExample({
     *   "templateList": [
     *       {
     *           "name": "韵达快递",
     *           "cpCode": "ZJS"
     *       },
     *       {
     *           "name": "百世快递",
     *           "cpCode": "FAST"
     *       }
     *   ],
     *   "defaultCpCode": ""
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月23日
     */
    public function getInvoiceList(int $type, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/cainiao', 'getInvoiceList', true, $type, $uidDTO);
    }

    /**
     * 获取电子面单快递.
     *
     * @param int         $type   绑定类型：1 淘宝帐户 2 菜鸟帐户
     * @param UidDTO|null $uidDTO 登录用户ID
     *
     * @return array
     * @returnExample({
     *   "templateList": [
     *       {
     *           "name": "韵达快递",
     *           "cpCode": "ZJS"
     *       },
     *       {
     *           "name": "百世快递",
     *           "cpCode": "FAST"
     *       }
     *   ],
     *   "defaultCpCode": ""
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月23日
     */
    public function getInvoiceListAsync(int $type, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/cainiao', 'getInvoiceList', false, $type, $uidDTO);
    }

    /**
     * 授权地址，第三方授权认证方式.
     *
     * @param UidDTO|null $uidDTO
     *
     * @return string
     *
     * @returnExample({'http://lcp.cloud.cainiao.com/permission/isv/grantpage.do?isvAppKey=892317&ext=T3JkZXJcTG9naWNcQ2Fpbmlhb0xvZ2ljOnVzZXJJZDoxNDgwODY=&redirectUrl=https://www.eelly.com/cainiaoCallbackUrl.php'})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月22日
     */
    public function getAuthUrl(UidDTO $uidDTO = null): string
    {
        return EellyClient::request('order/cainiao', 'getAuthUrl', true, $uidDTO);
    }

    /**
     * 授权地址，第三方授权认证方式.
     *
     * @param UidDTO|null $uidDTO
     *
     * @return string
     *
     * @returnExample({'http://lcp.cloud.cainiao.com/permission/isv/grantpage.do?isvAppKey=892317&ext=T3JkZXJcTG9naWNcQ2Fpbmlhb0xvZ2ljOnVzZXJJZDoxNDgwODY=&redirectUrl=https://www.eelly.com/cainiaoCallbackUrl.php'})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月22日
     */
    public function getAuthUrlAsync(UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/cainiao', 'getAuthUrl', false, $uidDTO);
    }

    /**
     * 用户自动提交菜鸟授权ID.
     *
     * @param string      $accessCode 授权码
     * @param UidDTO|null $uidDTO
     *
     * @return bool
     *
     * @requestExample({"accessCode":"WVRQMG1UdDV1dndYZFJPbllQeTBEeUlqeTdKK0poQllwaTZSWjd2OGVoWGdjcUtMdzg0ZXNUNXJvUk1aWXg4dg=="})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月22日
     */
    public function saveToken(string $accessCode, UidDTO $uidDTO = null): bool
    {
        return EellyClient::request('order/cainiao', 'saveToken', true, $accessCode, $uidDTO);
    }

    /**
     * 用户自动提交菜鸟授权ID.
     *
     * @param string      $accessCode 授权码
     * @param UidDTO|null $uidDTO
     *
     * @return bool
     *
     * @requestExample({"accessCode":"WVRQMG1UdDV1dndYZFJPbllQeTBEeUlqeTdKK0poQllwaTZSWjd2OGVoWGdjcUtMdzg0ZXNUNXJvUk1aWXg4dg=="})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月22日
     */
    public function saveTokenAsync(string $accessCode, UidDTO $uidDTO = null)
    {
        return EellyClient::request('order/cainiao', 'saveToken', false, $accessCode, $uidDTO);
    }

    /**
     * 菜鸟面单回调.
     *
     * @param string $accessCode 授权码
     * @param string $key
     *
     * @return bool
     *
     * @requestExample({"accessCode":"WVRQMG1UdDV1dndYZFJPbllQeTBEeUlqeTdKK0poQllwaTZSWjd2OGVoWGdjcUtMdzg0ZXNUNXJvUk1aWXg4dg==","key":"=T3JkZXJcTG9naWNcQ2Fpbmlhb0xvZ2ljOnVzZXJJZDoxNDgwODY="})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月22日
     */
    public function callBackSaveToken(string $accessCode, string $key): bool
    {
        return EellyClient::request('order/cainiao', 'callBackSaveToken', true, $accessCode, $key);
    }

    /**
     * 菜鸟面单回调.
     *
     * @param string $accessCode 授权码
     * @param string $key
     *
     * @return bool
     *
     * @requestExample({"accessCode":"WVRQMG1UdDV1dndYZFJPbllQeTBEeUlqeTdKK0poQllwaTZSWjd2OGVoWGdjcUtMdzg0ZXNUNXJvUk1aWXg4dg==","key":"=T3JkZXJcTG9naWNcQ2Fpbmlhb0xvZ2ljOnVzZXJJZDoxNDgwODY="})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月22日
     */
    public function callBackSaveTokenAsync(string $accessCode, string $key)
    {
        return EellyClient::request('order/cainiao', 'callBackSaveToken', false, $accessCode, $key);
    }

    /**
     * 云打印命令行打印渲染接口.
     *
     * @param string $printData                 创建打印时返回的打印数据
     * @param array  $extends                   额外数据
     * @param string $extends["printerName"]    打印机名称
     * @param string $extends["orientation"]    打印方向：normal-正常 reverse-翻转(旋转180°)
     * @param string $extends["needTopLogo"]    是否需要上联logo
     * @param string $extends["needMiddleLogo"] 是否需要中间部分logo
     * @param string $extends["needBottomLogo"] 是否需要下联logo
     *
     * @return array
     *
     * @requestExample({
     *     "printData":"json",
     *     "extends":{"printerName":"KM-300S-EB13"}
     *     })
     * @returnExample({
     *    "cmdContent": "H4sIAAAAAAAAAO1a3W9VRRB",
     *     "success": "true",
     *     "cmdEncoding": "gzip",
     *     "errorCode": "0"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月25日
     */
    public function sendCloudPrintCmdRender(string $printData, array $extends): array
    {
        return EellyClient::request('order/cainiao', 'sendCloudPrintCmdRender', true, $printData, $extends);
    }

    /**
     * 云打印命令行打印渲染接口.
     *
     * @param string $printData                 创建打印时返回的打印数据
     * @param array  $extends                   额外数据
     * @param string $extends["printerName"]    打印机名称
     * @param string $extends["orientation"]    打印方向：normal-正常 reverse-翻转(旋转180°)
     * @param string $extends["needTopLogo"]    是否需要上联logo
     * @param string $extends["needMiddleLogo"] 是否需要中间部分logo
     * @param string $extends["needBottomLogo"] 是否需要下联logo
     *
     * @return array
     *
     * @requestExample({
     *     "printData":"json",
     *     "extends":{"printerName":"KM-300S-EB13"}
     *     })
     * @returnExample({
     *    "cmdContent": "H4sIAAAAAAAAAO1a3W9VRRB",
     *     "success": "true",
     *     "cmdEncoding": "gzip",
     *     "errorCode": "0"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月25日
     */
    public function sendCloudPrintCmdRenderAsync(string $printData, array $extends)
    {
        return EellyClient::request('order/cainiao', 'sendCloudPrintCmdRender', false, $printData, $extends);
    }

    /**
     * 测试打印效果.
     *
     * @return array
     *
     * @returnExample({
     *       "waybillCode": "31920630202861",
     *       "printData": "{\"data\":{\"cpCode\":\"FAST\",\"needEncrypt\":false,\"parent\":false,\"recipient\":{\"address\":{\"city\":\"市辖区\",\"detail\":\"2222\",\"province\":\"北京市\"},\"mobile\":\"13333333333\",\"name\":\"sss\"},\"routingInfo\":{\"consolidation\":{},\"origin\":{\"code\":\"FAST\"},\"sortation\":{}},\"sender\":{\"address\":{\"city\":\"北京市\",\"detail\":\"花家地社区卫生服务站\",\"province\":\"北京\",\"town\":\"望京街道\"},\"mobile\":\"13533333333\",\"name\":\"测试打印，请勿过来\",\"phone\":\"13533333333\"},\"shippingOption\":{\"code\":\"STANDARD_EXPRESS\",\"title\":\"标准快递\"},\"waybillCode\":\"31920630202861\"},\"signature\":\"MD:s7E4gCASc3iyVCv8lcl/3Q==\",\"templateURL\":\"http://cloudprint.cainiao.com/template/standard/74806/29\"}",
     *       "objectId": "5000057"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月25日
     */
    public function createPrintDataExample(): array
    {
        return EellyClient::request('order/cainiao', 'createPrintDataExample', true);
    }

    /**
     * 测试打印效果.
     *
     * @return array
     *
     * @returnExample({
     *       "waybillCode": "31920630202861",
     *       "printData": "{\"data\":{\"cpCode\":\"FAST\",\"needEncrypt\":false,\"parent\":false,\"recipient\":{\"address\":{\"city\":\"市辖区\",\"detail\":\"2222\",\"province\":\"北京市\"},\"mobile\":\"13333333333\",\"name\":\"sss\"},\"routingInfo\":{\"consolidation\":{},\"origin\":{\"code\":\"FAST\"},\"sortation\":{}},\"sender\":{\"address\":{\"city\":\"北京市\",\"detail\":\"花家地社区卫生服务站\",\"province\":\"北京\",\"town\":\"望京街道\"},\"mobile\":\"13533333333\",\"name\":\"测试打印，请勿过来\",\"phone\":\"13533333333\"},\"shippingOption\":{\"code\":\"STANDARD_EXPRESS\",\"title\":\"标准快递\"},\"waybillCode\":\"31920630202861\"},\"signature\":\"MD:s7E4gCASc3iyVCv8lcl/3Q==\",\"templateURL\":\"http://cloudprint.cainiao.com/template/standard/74806/29\"}",
     *       "objectId": "5000057"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月25日
     */
    public function createPrintDataExampleAsync()
    {
        return EellyClient::request('order/cainiao', 'createPrintDataExample', false);
    }

    /**
     * 获取订单数据.
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------|-------|--------------
     * invoiceNo   |string |送货单号
     * invoiceName |string |送货公司名称
     * invoiceCode |string |快递公司对应的拼音
     *
     * @param int $orderId 订单ID
     *
     * @return array
     *
     * @requestExample({"orderId":5000057})
     *
     * @returnExample({
     *   "invoiceNo": "31920630202861",
     *   "invoiceName": "快捷快递",
     *   "invoiceCode": "FAST"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年06月12日
     */
    public function getWaybillInvoiceData(int $orderId): array
    {
        return EellyClient::request('order/cainiao', 'getWaybillInvoiceData', true, $orderId);
    }

    /**
     * 获取订单数据.
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------|-------|--------------
     * invoiceNo   |string |送货单号
     * invoiceName |string |送货公司名称
     * invoiceCode |string |快递公司对应的拼音
     *
     * @param int $orderId 订单ID
     *
     * @return array
     *
     * @requestExample({"orderId":5000057})
     *
     * @returnExample({
     *   "invoiceNo": "31920630202861",
     *   "invoiceName": "快捷快递",
     *   "invoiceCode": "FAST"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年06月12日
     */
    public function getWaybillInvoiceDataAsync(int $orderId)
    {
        return EellyClient::request('order/cainiao', 'getWaybillInvoiceData', false, $orderId);
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