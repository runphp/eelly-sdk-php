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

namespace Eelly\SDK\Order\Service;

use Eelly\DTO\UidDTO;

/**
 * 菜鸟接口.
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 */
interface CainiaoInterface
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
    public function createPrintOrder(int $storeId, array $orderIds, array $sender): array;

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
    public function createMallPrintOrder(int $storeId, $orderInfo, $sender): array;

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
    public function isBindToken(int $type, UidDTO $uidDTO = null): int;

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
    public function getBindToken(UidDTO $uidDTO = null): array;

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
    public function getTemplateList(UidDTO $uidDTO = null): array;

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
    public function getInvoiceList(int $type, UidDTO $uidDTO = null): array;

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
    public function getAuthUrl(UidDTO $uidDTO = null): string;

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
    public function saveToken(string $accessCode, UidDTO $uidDTO = null): bool;

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
    public function callBackSaveToken(string $accessCode, string $key): bool;

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
    public function sendCloudPrintCmdRender(string $printData, array $extends): array;

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
    public function createPrintDataExample(): array;

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
    public function getWaybillInvoiceData(int $orderId): array;
}
