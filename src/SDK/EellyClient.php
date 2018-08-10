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

namespace Eelly\SDK;

use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Middleware;
use LogicException;
use Phalcon\Cache\BackendInterface as CacheInterface;
use Phalcon\Http\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Shadon\Application\ApplicationConst;
use Shadon\Client\ShadonSDKClient;
use Shadon\OAuth2\Client\Provider\ShadonProvider;

/**
 * 衣联sdk客户端.
 *
 * @author hehui<hehui@eelly.net>
 */
class EellyClient
{
    /**
     * 跟踪客户端ip的header.
     *
     * @var string
     */
    public const TRACE_HEADER_IP = 'TRACE-IP';

    /**
     * server map.
     *
     * @var array
     */
    private const SERVICE_MAP = [
        'activity'       => 'https://api.eelly.com',
        'cart'           => 'https://api.eelly.com',
        'contact'        => 'https://api.eelly.com',
        'data'           => 'https://api.eelly.com',
        'elastic'        => 'https://api.eelly.com',
        'eellyOldCode'   => 'https://api.eelly.com',
        'example'        => 'https://api.eelly.com',
        'goods'          => 'https://api.eelly.com',
        'im'             => 'https://api.eelly.com',
        'live'           => 'https://api.eelly.com',
        'log'            => 'https://api.eelly.com',
        'logger'         => 'https://logger_api.eelly.com',
        'message'        => 'https://api.eelly.com',
        'moments'        => 'https://api.eelly.com',
        'oauth'          => 'https://api.eelly.com',
        'order'          => 'https://api.eelly.com',
        'pay'            => 'https://api.eelly.com',
        'service'        => 'https://api.eelly.com',
        'store'          => 'https://api.eelly.com',
        'system'         => 'https://api.eelly.com',
        'user'           => 'https://api.eelly.com',
    ];

    /**
     * @var ShadonSDKClient
     */
    private static $sdkClient;

    /**
     * @var static
     */
    private static $self;

    /**
     * EellyClient constructor.
     *
     * @param array $options
     * @param array $collaborators
     * @param array $serviceMap
     */
    private function __construct(array $options, array $collaborators = [], array $serviceMap = [])
    {
        $provider = new ShadonProvider($options, $collaborators);
        self::$sdkClient = ShadonSDKClient::fromProvider($provider, array_replace(self::SERVICE_MAP, $serviceMap));
    }

    /**
     * @param array $options
     * @param array $collaborators
     * @param array $providerUri
     *
     * @return self
     */
    public static function init(array $options, array $collaborators = [], array $providerUri = []): self
    {
        if (null === self::$self) {
            self::$self = new self($options, $collaborators, $providerUri);
        }

        return self::$self;
    }

    /**
     * initialze eelly client.
     *
     * @param array          $config
     * @param CacheInterface $cache
     */
    public static function initialize(array $config, CacheInterface $cache): self
    {
        $collaborators = (defined('APP') && ApplicationConst::ENV_PRODUCTION === APP['env']) ? [] : [
            'httpClient' => new \GuzzleHttp\Client(['verify' => false]),
        ];
        $eellyClient = self::init($config['options'], $collaborators, $config['providerUri']);
        $eellyClient->getSdkClient()->getProvider()->setAccessTokenCache($cache);
        self::getSdkClient()->getHandlerStack()->push(Middleware::mapRequest(function (RequestInterface $request) {
            $clientRequest = new Request();
            if (!$clientRequest->hasHeader(self::TRACE_HEADER_IP)) {
                $ip = $clientRequest->getClientAddress();
                $request = $request->withHeader(self::TRACE_HEADER_IP, $ip);
            }

            return $request;
        }));

        return $eellyClient;
    }

    /**
     * @return ShadonSDKClient
     */
    public static function getSdkClient()
    {
        return self::$sdkClient;
    }

    /**
     * @param string $uri
     * @param string $method
     * @param bool   $sync
     * @param mixed  ...$args
     *
     * @return mixed
     */
    public static function request(string $uri, string $method, bool $sync = true, ...$args)
    {
        $paramArr = array_merge([$uri.'/'.$method], $args);
        $promise = call_user_func_array([self::$sdkClient, 'requestAsync'], $paramArr);
        if ($sync) {
            try {
                $response = $promise->wait();
            } catch (ServerException $e) {
                $body = json_decode((string) $e->getResponse()->getBody(), true);
                if (JSON_ERROR_NONE == json_last_error()) {
                    throw new \ErrorException($body['error']);
                }
                throw $e;
            }

            return self::$self->responseToObject($response);
        }

        return $promise;
    }

    private function responseToObject(ResponseInterface $response)
    {
        $content = (string) $response->getBody();
        $object = null;
        if ('' !== $content) {
            $object = $this->bodyToObject(\GuzzleHttp\json_decode($content, true));
        }

        return $object;
    }

    private function bodyToObject(array $body)
    {
        $status = 1;
        isset($body['returnType']) && ($status <<= 1)
            && (!in_array($body['returnType'], ['integer', 'float', 'string', 'boolean', 'array']) && class_exists($body['returnType'])) && ($status <<= 1)
            && is_subclass_of($body['returnType'], LogicException::class) && ($status <<= 1)
            && isset($body['context']) && ($status <<= 1);

        switch ($status) {
            case 2:
                $object = $body['data'];
                settype($object, $body['returnType']);
                break;
            case 4:
                $object = $body['returnType']::hydractor($body['data']);
                break;
            case 8:
                throw new $body['returnType']($body['error']);
                break;
            case 16:
                throw new $body['returnType']($body['error'], $body['context']);
                break;
            case 1:
                $object = (string) $body;
                break;
        }

        return $object;
    }
}
