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

namespace Eelly\SDK\Oauth\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Oauth\Service\TokenConvertInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class TokenConvert implements TokenConvertInterface
{
    /**
     * qq 第三方认证.
     *
     * @param string $accessToken 第三方认证token
     * @param int    $type        认证登录类型：1为pc，2为wap，3 为app
     *
     * @return string
     * @requestExample({'accessToken':'ssssysyswowo','type':1})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月23日
     * @Validation(
     *   @PresenceOf(0,{message:"第三方认证token不能为空"}),
     *   @InclusionIn(0,{message:"类型非法",'domain':[1, 2, 3]}),
     *   )
     */
    public function qqLogin(string $accessToken, int $type): array
    {
        return EellyClient::request('oauth/tokenConvert', 'qqLogin', true, $accessToken, $type);
    }

    /**
     * qq 第三方认证.
     *
     * @param string $accessToken 第三方认证token
     * @param int    $type        认证登录类型：1为pc，2为wap，3 为app
     *
     * @return string
     * @requestExample({'accessToken':'ssssysyswowo','type':1})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月23日
     * @Validation(
     *   @PresenceOf(0,{message:"第三方认证token不能为空"}),
     *   @InclusionIn(0,{message:"类型非法",'domain':[1, 2, 3]}),
     *   )
     */
    public function qqLoginAsync(string $accessToken, int $type)
    {
        return EellyClient::request('oauth/tokenConvert', 'qqLogin', false, $accessToken, $type);
    }

    /**
     * 微信 第三方认证.
     *
     * @param string $accessToken 第三方认证token
     * @param string $openId      用户唯一标识
     *
     * @return string
     * @requestExample({'accessToken':'ssssysyswowo','type':1})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月23日
     * @Validation(
     *   @PresenceOf(0,{message:"第三方认证token不能为空"}),
     *   @InclusionIn(0,{message:"非法openId"}),
     *   )
     */
    public function wechatLogin(string $accessToken, string $openId): array
    {
        return EellyClient::request('oauth/tokenConvert', 'wechatLogin', true, $accessToken, $openId);
    }

    /**
     * 微信 第三方认证.
     *
     * @param string $accessToken 第三方认证token
     * @param string $openId      用户唯一标识
     *
     * @return string
     * @requestExample({'accessToken':'ssssysyswowo','type':1})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月23日
     * @Validation(
     *   @PresenceOf(0,{message:"第三方认证token不能为空"}),
     *   @InclusionIn(0,{message:"非法openId"}),
     *   )
     */
    public function wechatLoginAsync(string $accessToken, string $openId)
    {
        return EellyClient::request('oauth/tokenConvert', 'wechatLogin', false, $accessToken, $openId);
    }

    /**
     * 找回密码.
     *
     * @param string $accessToken 找回密码token
     * @param int    $checkCode   手机验证码
     * @param string $password
     *
     * @return string
     * @requestExample({'accessToken':'eyJ0eXAiOiJKV1QiLCJhbGciOi','type':1,'password':123456})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月28日
     * @Validation(
     *  @PresenceOf(0,{message : "手机号token"}),
     *  @PresenceOf(1,{message : "手机验证码"}),
     *  @PresenceOf(2,{message : "非法重置密码"})
     * )
     */
    public function findPassword(string $accessToken, string $checkCode, string $password): array
    {
        return EellyClient::request('oauth/tokenConvert', 'findPassword', true, $accessToken, $checkCode, $password);
    }

    /**
     * 找回密码.
     *
     * @param string $accessToken 找回密码token
     * @param int    $checkCode   手机验证码
     * @param string $password
     *
     * @return string
     * @requestExample({'accessToken':'eyJ0eXAiOiJKV1QiLCJhbGciOi','type':1,'password':123456})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月28日
     * @Validation(
     *  @PresenceOf(0,{message : "手机号token"}),
     *  @PresenceOf(1,{message : "手机验证码"}),
     *  @PresenceOf(2,{message : "非法重置密码"})
     * )
     */
    public function findPasswordAsync(string $accessToken, string $checkCode, string $password)
    {
        return EellyClient::request('oauth/tokenConvert', 'findPassword', false, $accessToken, $checkCode, $password);
    }

    /**
     * 手机登录=》可以快速登录|快速注册.
     *
     * @param string      $token     手机号token
     * @param string      $checkCode 手机验证码
     * @param string|null $password  密码
     *
     * @return int
     * @requestExample({'token':'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkzODM3ZTRkMDQwOWE2NzJlYTcyNjAxYTVjMzY5ZDY5NGY0MTYxMjQ2ZTRkYzgyY2I4Y2FkMzkzYjg1OTEyNTQzODE4Zjg4M2NhOGU2YTQ4In0.eyJhdWQiOiJteWF3ZXNvbWVhcHAiLCJqdGkiOiI5MzgzN2U0ZDA0MDlhNjcyZWE3MjYwMWE1YzM2OWQ2OTRmNDE2MTI0NmU0ZGM4MmNiOGNhZDM5M2I4NTkxMjU0MzgxOGY4ODNjYThlNmE0OCIsImlhdCI6MTUwODgyMzExMSwibmJmIjoxNTA4ODIzMTExLCJleHAiOjE1MDg4MjY3MTEsInN1YiI6IiIsInNjb3BlcyI6W119.ZI9_5O6KObxU9a8-sssgiFiiHeXCOglvGGOdLjfhwbdZqSf6Sj9VM8rlK-VvCcKGt22K9DluOj1RxmaK8xkaSIY0P2WvrWdmy_h6a5ngUgCcum3KYzIFSuq96OaBUFAZ2gCsBts7fioq_GnzkJuYw3kKUSIRCcL2poZFYPsxhes','checkCode':123456})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月24日
     * @Validation(
     *  @OperatorValidator(0,{message : "手机号token"}),
     *  @OperatorValidator(1,{message : "手机验证码"})
     * )
     */
    public function mobileLogin(string $token, string $checkCode, string $password = null): array
    {
        return EellyClient::request('oauth/tokenConvert', 'mobileLogin', true, $token, $checkCode, $password);
    }

    /**
     * 手机登录=》可以快速登录|快速注册.
     *
     * @param string      $token     手机号token
     * @param string      $checkCode 手机验证码
     * @param string|null $password  密码
     *
     * @return int
     * @requestExample({'token':'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkzODM3ZTRkMDQwOWE2NzJlYTcyNjAxYTVjMzY5ZDY5NGY0MTYxMjQ2ZTRkYzgyY2I4Y2FkMzkzYjg1OTEyNTQzODE4Zjg4M2NhOGU2YTQ4In0.eyJhdWQiOiJteWF3ZXNvbWVhcHAiLCJqdGkiOiI5MzgzN2U0ZDA0MDlhNjcyZWE3MjYwMWE1YzM2OWQ2OTRmNDE2MTI0NmU0ZGM4MmNiOGNhZDM5M2I4NTkxMjU0MzgxOGY4ODNjYThlNmE0OCIsImlhdCI6MTUwODgyMzExMSwibmJmIjoxNTA4ODIzMTExLCJleHAiOjE1MDg4MjY3MTEsInN1YiI6IiIsInNjb3BlcyI6W119.ZI9_5O6KObxU9a8-sssgiFiiHeXCOglvGGOdLjfhwbdZqSf6Sj9VM8rlK-VvCcKGt22K9DluOj1RxmaK8xkaSIY0P2WvrWdmy_h6a5ngUgCcum3KYzIFSuq96OaBUFAZ2gCsBts7fioq_GnzkJuYw3kKUSIRCcL2poZFYPsxhes','checkCode':123456})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年10月24日
     * @Validation(
     *  @OperatorValidator(0,{message : "手机号token"}),
     *  @OperatorValidator(1,{message : "手机验证码"})
     * )
     */
    public function mobileLoginAsync(string $token, string $checkCode, string $password = null)
    {
        return EellyClient::request('oauth/tokenConvert', 'mobileLogin', false, $token, $checkCode, $password);
    }

    /**
     * 手机登陆注册
     *
     * @param string $mobile 手机号码
     * @param integer $code 验证码
     * @param integer $templateId 模版id
     * @param string $password 密码
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.7.24
     */
    public function mobilePhoneLogin(string $mobile, int $code, int $templateId, string $password = null): array
    {
        return EellyClient::request('oauth/tokenConvert', 'mobilePhoneLogin', true, $mobile, $code, $templateId, $password);
    }

    /**
     * 手机登陆注册
     *
     * @param string $mobile 手机号码
     * @param integer $code 验证码
     * @param integer $templateId 模版id
     * @param string $password 密码
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.7.24
     */
    public function mobilePhoneLoginAsync(string $mobile, int $code, int $templateId, string $password = null)
    {
        return EellyClient::request('oauth/tokenConvert', 'mobilePhoneLogin', false, $mobile, $code, $templateId, $password);
    }

    /**
     * newmall 登录.
     *
     * @param string $accessToken
     *
     * @return array
     *
     * @author hehui<hehui@eelly.net>
     */
    public function newMallLogin(string $accessToken): array
    {
        return EellyClient::request('oauth/tokenConvert', 'newMallLogin', true, $accessToken);
    }

    /**
     * newmall 登录.
     *
     * @param string $accessToken
     *
     * @return array
     *
     * @author hehui<hehui@eelly.net>
     */
    public function newMallLoginAsync(string $accessToken)
    {
        return EellyClient::request('oauth/tokenConvert', 'newMallLogin', false, $accessToken);
    }

    /**
     * 保存new mall token.
     *
     * @see newMallLogin
     *
     * @param string $accessToken access token
     * @param array  $data        token内容
     * @param int    $lifetime    有效时间
     *
     * @return bool
     *
     * @author hehui<hehui@eelly.net>
     */
    public function saveNewMallAccessToken(string $accessToken, array $data, int $lifetime = 2592000): bool
    {
        return EellyClient::request('oauth/tokenConvert', 'saveNewMallAccessToken', true, $accessToken, $data, $lifetime);
    }

    /**
     * 保存new mall token.
     *
     * @see newMallLogin
     *
     * @param string $accessToken access token
     * @param array  $data        token内容
     * @param int    $lifetime    有效时间
     *
     * @return bool
     *
     * @author hehui<hehui@eelly.net>
     */
    public function saveNewMallAccessTokenAsync(string $accessToken, array $data, int $lifetime = 2592000)
    {
        return EellyClient::request('oauth/tokenConvert', 'saveNewMallAccessToken', false, $accessToken, $data, $lifetime);
    }

    /**
     * 获取微信用户信息
     *
     * @param string $accessToken 第三方认证token
     * @param string $openId      用户唯一标识
     * @return array
     *
     * @requestExample({"accessToken":"12_gQpeRmqEfZIEp", "openId":"KJmxv4kOna9NDb"})
     * @returnExample({"openid":"oKJmxv4kOna9NDb_Zevi_fEmFO9M","nickname":"Andy","sex":1,"language":"en","city":"\u5e7f\u5dde","province":"\u5e7f\u4e1c","country":"\u4e2d\u56fd","headimgurl":"http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/icIYw4yO5ZwXao4gtRpEwseJlSyjxstVhDhNSxb0MdSpKR2rIPKT03LLQmlY4Uv17ZV1mK6jFRoXbBX3k7jrGPA\/132","privilege":[],"unionid":"oldRYuKuC2iwlCKhsQeks4bxDrXI"})
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.07.25
     */
    public function getWechatUserInfo(string $accessToken, string $openId):array
    {
        return EellyClient::request('oauth/tokenConvert', __FUNCTION__, true, $accessToken, $openId);
    }

    /**
     * 获取微信用户信息
     *
     * @param string $accessToken 第三方认证token
     * @param string $openId      用户唯一标识
     * @return array
     *
     * @requestExample({"accessToken":"12_gQpeRmqEfZIEp", "openId":"KJmxv4kOna9NDb"})
     * @returnExample({"openid":"oKJmxv4kOna9NDb_Zevi_fEmFO9M","nickname":"Andy","sex":1,"language":"en","city":"\u5e7f\u5dde","province":"\u5e7f\u4e1c","country":"\u4e2d\u56fd","headimgurl":"http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/icIYw4yO5ZwXao4gtRpEwseJlSyjxstVhDhNSxb0MdSpKR2rIPKT03LLQmlY4Uv17ZV1mK6jFRoXbBX3k7jrGPA\/132","privilege":[],"unionid":"oldRYuKuC2iwlCKhsQeks4bxDrXI"})
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.07.25
     */
    public function getWechatUserInfoAsync(string $accessToken, string $openId):array
    {
        return EellyClient::request('oauth/tokenConvert', __FUNCTION__, false, $accessToken, $openId);
    }

    /**
     * 获取QQ用户信息
     *
     * @param string $accessToken 第三方认证token
     * @param int    $type        认证登录类型：1为pc，2为wap，3 为app
     * @return array
     *
     * @requestExample({"accessToken":"12_gQpeRmqEfZIEp", "type":1})
     * @returnExample({"openid":"A2DF82A0051D7689EE88EDD86FB5AEB2","nickname":"Andy","gender":"\u7537","province":"\u5e7f\u4e1c","city":"\u5e7f\u5dde","headImage":"http:\/\/qzapp.qlogo.cn\/qzapp\/101118568\/A2DF82A0051D7689EE88EDD86FB5AEB2\/30"})
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.07.26
     */
    public function getQqUserInfo(string $accessToken, int $type):array
    {
        return EellyClient::request('oauth/tokenConvert', __FUNCTION__, true, $accessToken, $type);
    }

    /**
     * 获取QQ用户信息
     *
     * @param string $accessToken 第三方认证token
     * @param int    $type        认证登录类型：1为pc，2为wap，3 为app
     * @return array
     *
     * @requestExample({"accessToken":"12_gQpeRmqEfZIEp", "type":1})
     * @returnExample({"openid":"A2DF82A0051D7689EE88EDD86FB5AEB2","nickname":"Andy","gender":"\u7537","province":"\u5e7f\u4e1c","city":"\u5e7f\u5dde","headImage":"http:\/\/qzapp.qlogo.cn\/qzapp\/101118568\/A2DF82A0051D7689EE88EDD86FB5AEB2\/30"})
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.07.26
     */
    public function getQqUserInfoAsync(string $accessToken, int $type):array
    {
        return EellyClient::request('oauth/tokenConvert', __FUNCTION__, false, $accessToken, $type);
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