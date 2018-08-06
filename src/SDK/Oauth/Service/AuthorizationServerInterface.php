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

namespace Eelly\SDK\Oauth\Service;

/**
 * 授权服务接口.
 *
 * @author hehui<hehui@eelly.net>
 */
interface AuthorizationServerInterface
{
    /**
     * 获取访问令牌.
     *
     * oauth 2.0 授权访问令牌生成接口
     *
     * ### 返回数据说明
     * 字段           |类型     |说明
     * --------------|--------|-------------------------------------------------------
     * token_type    |string  | 表示令牌类型，该值大小写不敏感，必选项，可以是bearer类型或mac类型
     * expires_in    |int     | 表示过期时间，单位为秒
     * access_token  |string  | 表示访问令牌
     * refresh_token |string  | 表示更新令牌，用来获取下一次的访问令牌
     *
     * ### 返回示例
     * - 客户端模式
     * ```
     *     {
     *         "token_type": "Bearer",
     *         "expires_in": 2678400,
     *         "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImY5NDRhMWRkNDc1MmU0MWE5MDI3ZGJlMDdhZWVjNTdlM2YzYjMzY2UwN2IyMzMyMzc4M2Q3YzRiOWE1NTYxZGY1YTMyMjA3M2Y0ODBmNjk4In0.eyJhdWQiOiJteWF3ZXNvbWVhcHAiLCJqdGkiOiJmOTQ0YTFkZDQ3NTJlNDFhOTAyN2RiZTA3YWVlYzU3ZTNmM2IzM2NlMDdiMjMzMjM3ODNkN2M0YjlhNTU2MWRmNWEzMjIwNzNmNDgwZjY5OCIsImlhdCI6MTUwMzU1OTMzMCwibmJmIjoxNTAzNTU5MzMwLCJleHAiOjE1MDYyMzc3MzAsInN1YiI6IiIsInNjb3BlcyI6W119.sS-MktfOaghz5kRDMHa0YKS4LRIestAXdO7SvtpCp-jItGrOkKCPF6AYhvaoaswc6OZ7_QkP3cF4d_y_zVU0szatR6_OOuKCBu-JYjeSLn08Bo1_a6tXkCk_xMhXhWHM4cQ99s-4WtNqWP2OezikkCNwbArO_t4ZZqPS1BKV408"
     *     }
     * ```
     * - 密码模式 或 QQ模式 或 微信模式
     * ```
     *     {
     *          "token_type": "Bearer",
     *          "expires_in": 3600,
     *          "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJmYjgxZTYwNjU2NmQwYTg2ZjBhMmVhY2JiYzNmZWU5NDU1NDdlNTc4ZDMxMjA0YzdiMzQzZTViYWJiYTdlNGRiOTUwMGZhYmI0MmUzYjA3In0.eyJhdWQiOiJteWF3ZXNvbWVhcHAiLCJqdGkiOiIyZmI4MWU2MDY1NjZkMGE4NmYwYTJlYWNiYmMzZmVlOTQ1NTQ3ZTU3OGQzMTIwNGM3YjM0M2U1YmFiYmE3ZTRkYjk1MDBmYWJiNDJlM2IwNyIsImlhdCI6MTUwMzU1ODM3OCwibmJmIjoxNTAzNTU4Mzc4LCJleHAiOjE1MDM1NjE5NzgsInN1YiI6IjE0ODA4NiIsInNjb3BlcyI6W119.pCW_Mx8r_Y86vHgcfR2nVvepu313VHtrhXcEuv9Ph-pAwUiQU6fmIX5AyQxuP3GUG-EnWhVxfpDCxrzakoZYcSo24y0b2MgbGLHSi8NMQKInnOW-tZ_p6uwiKTeSmauilxcdLVJYZobQnq6g44hUplX-4nttmvGJDXDoVmKhk0E",
     *          "refresh_token": "def5020041ba02f6dd83def8906e0ff6d30b31ab318a696bb07dcc8852045aaa0791df3191653496e0785bcfac0e3e2ba53f056bc3b56b4d09107387b3e8d89da6e4d0634a41fe569f298f694ac1aaf98cd43cdaaf1ae16617fdd6330f61754267265d885e228d62e86fb64c5d4bbf01a9032809e80adec186ea69d95b2f014720d8cd2b41e1be51f746ac71a5a7288a00b5d177a895f1cea8d76e7a3d4f2990438171561b2fce828c496c74966c0aadb4a5cddb2a7b05f3a715e858006ed1aec179265f2917692a48dcad98e20b84a1e64fa6752a8765dd478c0329f58cec72d4aa880eac5ee0f3be7347824c244167bf6603c0db1635af87f1aac43860b9a26e89e2f9c973eec4817c7cb5b525623f2df39d5237cce6b65dac76f7479473c1b18f2ffbaef2eacb0d85b33929a2a075c135d93fa24c0ed340995d1f7ea4c3894246978287eba2447c4e1e2e5f24c350b2042f1183f18a71bef146e26e52bd56b0229830156186f97264bb9bdf6000c4ba"
     *     }
     * ```
     *
     * ### 请求参数
     *
     * 参数名         |类型     |是否可选  |默认值   | 说明
     * --------------|--------|--------|--------|--------
     * grant_type    |string  |否       |       |认证模式
     * client_id     |string  |否       |       |客户端id
     * client_secret |string  |否       |       |客户端秘钥
     * username      |string  |是       |       |用户名
     * password      |string  |是       |       |用户密码
     * refresh_token |string  |是       |       |刷新令牌
     * access_token  |string  |是       |       |访问token(grant_type=qq)
     * code          |string  |是       |       |临时票据(grant_type=wechat)
     *
     * ### 请求示例
     * > 客户端模式(Client credentials grant)
     *
     * ```
     * grant_type:client_credentials
     * client_id:myawesomeapp
     * client_secret:password
     * ```
     * > 密码模式(Resource owner password credentials grant)
     *
     * ```
     * grant_type:password
     * client_id:myawesomeapp
     * client_secret:password
     * username:molimoq
     * password:password
     * ```
     * > 更新令牌(Refresh token grant)
     *
     * ```
     * grant_type:refresh_token
     * refresh_token:def50200ab4b466f8fc63758a5f59942954946bcebce0f7d44bf69aeeec4dac9b516847d59125597f6498df032b54b691457a95f0e56d3e0842d2705291707c5a6423f59f088016dc281b9cca2fad92e7e5f166c7ceaae383e5552fab66c9c7a4fc2b968882aa383d1cc47331e59e1b0f4d0520be4cb0d439a4413c6af83a1f0bb55a89550d75d0d5b6d5d9569d6c43e0fbfc57bcac66f08bc74d3db0069cbfaba2dfd7d930f30fedeb599250cace097a8e84be8bc25af0ee74d5483ac73f302d707c265eafef165bd6367793ef2ed0e644ecde0efe9b6a5a0caad72c38590d73cf240a52f134a14e297930a6f4dfc85ad652dc68e1727a034cce10cca1a0a8ad62b66686455cb0dae1e141de29119f19ab4fdc2ee23daa304d0944b7bc4bfbe7d63edab63586465821856ff0b911cae0838d632f18392c9d412fb22b9ae71f06ade9073b4fd12dd056e5049301ca8d24be2b5bbe18ab7a434e694fa4bdbea9cadb200efc37140a8e52a9843de04059afd
     * client_id:myawesomeapp
     * client_secret:password
     * ```
     *
     * > QQ模式(QQ token grant)
     *
     * ```
     * grant_type:qq
     * client_id:myawesomeapp
     * client_secret:abc123
     * access_token:4E338C9700B3CAEE6017C15001BB7ACD
     * ```
     *
     * > 微信模式(Wechat token grant)
     *
     * ```
     * grant_type:wechat
     * client_id:myawesomeapp
     * client_secret:abc123
     * code:E338C9700B3CAEE6017C15001BB7ACD
     * ```
     *
     * ### 参考
     * ![oauth 2.0](https://oauth.net/images/oauth-2-sm.png)
     * - [阮一峰的理解OAuth 2.0](http://www.ruanyifeng.com/blog/2014/05/oauth_2_0.html)
     * - [oauth2.0](https://oauth.net/2/)
     * - [QQ登录](http://wiki.open.qq.com/wiki/website/OAuth2.0%E7%AE%80%E4%BB%8B)
     * - [微信登录](https://open.weixin.qq.com/cgi-bin/showdocument?action=dir_list&t=resource/res_list&verify=1&id=open1419317851&token=&lang=zh_CN)
     *
     *
     * @throws \Exception
     *
     * @return array
     *
     * @requestExample()
     *
     * @returnExample()
     *
     * @author hehui<hehui@eelly.net>
     */
    public function accessToken();
}
