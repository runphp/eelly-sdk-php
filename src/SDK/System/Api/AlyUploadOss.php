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
use Eelly\SDK\System\Service\AlyUploadOssInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class AlyUploadOss implements AlyUploadOssInterface
{
    /**
     * 签名url 
     * 
     * > 请求字段说明
     * 
     * 键值    | 类型    | 描述
     * ------ | ------- | --------
     * unique | string  | 唯一标识，如果是作为用户的头像则建议用userid，如果是直播间的分享二维码图建议用直播间的id，如果是多文件上传则建议用用户id拼接元素组成字符串来进行标识
     * filename | string | 文件名称前缀，也是oss文件夹名称，头像用avatar，二维码用code
     * type | string | 文件类型 png，jpg，txt等
     * 
     * > 返回说明：将返回时效性oss临时url，将用于客户端上传文件；
     * 
     * > 返回结果其中线上访问路径：http://eellyimg.oss-cn-shenzhen.aliyuncs.com/avatar/avatar_123123.png
     *
     * @param int $unique 用户 userId:上传用户头像的id， roomId：上传直播间的id
     * @param string $contentType 上传文件的类型 例如 'image/jpeg' 具体参数： @see https://helpcdn.aliyun.com/knowledge_detail/39522.html
     * @param string $filename 文件名称前缀 avatar:头像，code:二维码
     * @param string $type 文件类型 png、jpg...
     * 
     * @return string
     * 
     * @requestExample({
     *      "id":"123123",
     *      "filename":"avatar",
     *      "type":"png"
     * })
     * @returnExample("http://eellyimg.oss-cn-shenzhen.aliyuncs.com/avatar/avatar_123123.png?OSSAccessKeyId=LTAISXGJbA2IXbhv&Expires=1531380457&Signature=S3Fl9Pmgf9mqfDF9aCcvaHFER0Y%3D")
     * 
     * @author sunanzhi <sunanzhi@sunanzhi.com>
     */
    public function signUrl(string $unique, string $contentType, string $filename = 'avatar', string $type = 'png'): string
    {
        return EellyClient::request('system/alyUploadOss', 'signUrl', true, $unique, $contentType, $filename, $type);
    }

    /**
     * 签名url 
     * 
     * > 请求字段说明
     * 
     * 键值    | 类型    | 描述
     * ------ | ------- | --------
     * unique | string  | 唯一标识，如果是作为用户的头像则建议用userid，如果是直播间的分享二维码图建议用直播间的id，如果是多文件上传则建议用用户id拼接元素组成字符串来进行标识
     * filename | string | 文件名称前缀，也是oss文件夹名称，头像用avatar，二维码用code
     * type | string | 文件类型 png，jpg，txt等
     * 
     * > 返回说明：将返回时效性oss临时url，将用于客户端上传文件；
     * 
     * > 返回结果其中线上访问路径：http://eellyimg.oss-cn-shenzhen.aliyuncs.com/avatar/avatar_123123.png
     *
     * @param int $unique 用户 userId:上传用户头像的id， roomId：上传直播间的id
     * @param string $contentType 上传文件的类型 例如 'image/jpeg' 具体参数： @see https://helpcdn.aliyun.com/knowledge_detail/39522.html
     * @param string $filename 文件名称前缀 avatar:头像，code:二维码
     * @param string $type 文件类型 png、jpg...
     * 
     * @return string
     * 
     * @requestExample({
     *      "id":"123123",
     *      "filename":"avatar",
     *      "type":"png"
     * })
     * @returnExample("http://eellyimg.oss-cn-shenzhen.aliyuncs.com/avatar/avatar_123123.png?OSSAccessKeyId=LTAISXGJbA2IXbhv&Expires=1531380457&Signature=S3Fl9Pmgf9mqfDF9aCcvaHFER0Y%3D")
     * 
     * @author sunanzhi <sunanzhi@sunanzhi.com>
     */
    public function signUrlAsync(string $unique, string $contentType, string $filename = 'avatar', string $type = 'png')
    {
        return EellyClient::request('system/alyUploadOss', 'signUrl', false, $unique, $contentType, $filename, $type);
    }

    /**
     * 上传文件成功后记录数据到mongo
     *
     * @param string $url 请求的签名url
     * @param string $fileName 文件名称前缀 avatar:头像，code:二维码
     * @param string $type 文件类型 png、jpg...
     * @return boolean
     * 
     * @requestExample({
     *      "url":"http://eellyimg.oss-cn-shenzhen.aliyuncs.com/avatar/avatar_123123.png?OSSAccessKeyId=LTAISXGJbA2IXbhv&Expires=1531380457&Signature=S3Fl9Pmgf9mqfDF9aCcvaHFER0Y%3D",
     *      "filename":"avatar",
     *      "type":"png"
     * })
     * @returnExample(true)
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function uploadLog(string $url, string $fileName, string $type): bool
    {
        return EellyClient::request('system/alyUploadOss', 'uploadLog', true, $url, $fileName, $type);
    }

    /**
     * 上传文件成功后记录数据到mongo
     *
     * @param string $url 请求的签名url
     * @param string $fileName 文件名称前缀 avatar:头像，code:二维码
     * @param string $type 文件类型 png、jpg...
     * @return boolean
     * 
     * @requestExample({
     *      "url":"http://eellyimg.oss-cn-shenzhen.aliyuncs.com/avatar/avatar_123123.png?OSSAccessKeyId=LTAISXGJbA2IXbhv&Expires=1531380457&Signature=S3Fl9Pmgf9mqfDF9aCcvaHFER0Y%3D",
     *      "filename":"avatar",
     *      "type":"png"
     * })
     * @returnExample(true)
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function uploadLogAsync(string $url, string $fileName, string $type)
    {
        return EellyClient::request('system/alyUploadOss', 'uploadLog', false, $url, $fileName, $type);
    }

    /**
     * 私有读取图片
     *
     * @param string $url 图片url
     * @return string
     * 
     * @author sunanzhi <sunanzhi@sunanzhi.com>
     */
    public function checkSignUrl(string $url): string
    {
        return EellyClient::request('system/alyUploadOss', 'checkSignUrl', true, $url);
    }

    /**
     * 私有读取图片
     *
     * @param string $url 图片url
     * @return string
     * 
     * @author sunanzhi <sunanzhi@sunanzhi.com>
     */
    public function checkSignUrlAsync(string $url)
    {
        return EellyClient::request('system/alyUploadOss', 'checkSignUrl', false, $url);
    }

    /**
     * 删除oss资源文件
     *
     * @param string $url 图片url 多图用#隔开
     * @return boolean
     */
    public function delImg(string $url): bool
    {
        return EellyClient::request('system/alyUploadOss', 'delImg', true, $url);
    }

    /**
     * 删除oss资源文件
     *
     * @param string $url 图片url 多图用#隔开
     * @return boolean
     */
    public function delImgAsync(string $url)
    {
        return EellyClient::request('system/alyUploadOss', 'delImg', false, $url);
    }

    /**
     * 第三方上传图片 微信／qq 登陆抓取头像上传
     * 
     * @param integer $userId 用户id
     * @param string $url 头像url
     * @return boolean
     */
    public function thirdPartUploadImg(int $userId, string $url): bool
    {
        return EellyClient::request('system/alyUploadOss', 'thirdPartUploadImg', true, $userId, $url);
    }

    /**
     * 第三方上传图片 微信／qq 登陆抓取头像上传
     * 
     * @param integer $userId 用户id
     * @param string $url 头像url
     * @return boolean
     */
    public function thirdPartUploadImgAsync(int $userId, string $url)
    {
        return EellyClient::request('system/alyUploadOss', 'thirdPartUploadImg', false, $userId, $url);
    }

    /**
     * 服务端签名js直传
     *
     * @param string $fileName 文件夹 例：头像类型 ’avatar‘、二维码 ’code' etc
     * @param int $timeout 有效时间 默认一小时
     * @return string
     * 
     * @requestExample({
     *      "filename":"avatar"
     * })
     * @returnExample({"accessid":"LTAISXGJbA2IXbhv","host":"http://eellytest.oss-cn-shenzhen.aliyuncs.com","policy":"eyJleHBpcmF0aW9uIjoiMjAxOC0wNy0yNlQxMjowODo0OFoiLCJjb25kaXRpb25zIjpbWyJjb250ZW50LWxlbmd0aC1yYW5nZSIsMCwxMDQ4NTc2MDAwXSxbInN0YXJ0cy13aXRoIiwiJGtleSIsIiJdXX0=","signature":"qZr0ax8uZv0NIyVoAcSWqp0KUEU=","expire":1532578128,"dir":"avatar/"})
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.7.26
     */
    public function getPolicy(string $fileName = '', int $timeout = 3600): string
    {
        return EellyClient::request('system/alyUploadOss', 'getPolicy', true, $fileName, $timeout);
    }

    /**
     * 服务端签名js直传
     *
     * @param string $fileName 文件夹 例：头像类型 ’avatar‘、二维码 ’code' etc
     * @param int $timeout 有效时间 默认一小时
     * @return string
     * 
     * @requestExample({
     *      "filename":"avatar"
     * })
     * @returnExample({"accessid":"LTAISXGJbA2IXbhv","host":"http://eellytest.oss-cn-shenzhen.aliyuncs.com","policy":"eyJleHBpcmF0aW9uIjoiMjAxOC0wNy0yNlQxMjowODo0OFoiLCJjb25kaXRpb25zIjpbWyJjb250ZW50LWxlbmd0aC1yYW5nZSIsMCwxMDQ4NTc2MDAwXSxbInN0YXJ0cy13aXRoIiwiJGtleSIsIiJdXX0=","signature":"qZr0ax8uZv0NIyVoAcSWqp0KUEU=","expire":1532578128,"dir":"avatar/"})
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.7.26
     */
    public function getPolicyAsync(string $fileName = '', int $timeout = 3600)
    {
        return EellyClient::request('system/alyUploadOss', 'getPolicy', false, $fileName, $timeout);
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