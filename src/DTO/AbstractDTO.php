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

namespace Eelly\DTO;

use Shadon\Mvc\Model;

/**
 * @author hehui<hehui@eelly.net>
 */
class AbstractDTO implements \JsonSerializable
{
    final public function __construct()
    {
    }

    /**
     * 数组转对象
     *
     * @param array $array
     * @return static
     */
    public static function hydractor(array $array)
    {
        $class = static::class;
        $object = new $class();

        foreach ($array as $key => $value) {
            $key = preg_replace_callback('/(_)([a-z])/i', function ($matches) {
                return ucfirst($matches[2]);
            }, $key);
            is_array($value) and $value = Model::arrayToHump($value);
            $object->$key = $value;
        }

        return $object;
    }

    /**
     * {@inheritdoc}
     *
     * @see JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return $this;
    }

    /**
     * 数据库查询返回的对象 转DTO对象
     *
     * @param \stdClass   $obj
     * @param AbstractDTO $dto
     */
    public static function hydarctorObj($obj)
    {
        return is_object($obj) ? self::hydractor($obj->toArray()) : self::hydractor([]);
    }
}
