<?php

namespace common\models;

use yii\base\Model;

/**
 * Class ApiReturn API返回模型
 * @package common\modules
 */
class ApiReturn extends Model
{
    const CODE_成功 = 200;
    const CODE_创建成功 = 201;
    const CODE_无数据 = 204;
    const CODE_参数错误 = 400;
    const CODE_需要登录 = 401;
    const CODE_未授权 = 403;
    const CODE_未找到 = 404;
    const CODE_通讯超时 = 504;

    /**
     * 成功的返回
     * @param array $data
     * @return json
     */
    public static function success($message,$data = [])
    {
        return json_encode([
            'code' => self::CODE_成功,
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * 创建成功时的返回
     * @param array $data
     * @return json
     */
    public static function created($message,$data = [])
    {
        return json_encode([
            'code' => self::CODE_创建成功,
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * 无数据时的返回
     * @param string $string 提示文字
     * @return json
     */
    public static function noData($message = '')
    {
        return json_encode([
            'code' => self::CODE_无数据,
            'message' => $message,
            'data' => [],
        ]);
    }

    /**
     * 参数缺失时的返回
     * @param $string
     * @return json
     */
    public static function missingParams($string)
    {
        return static::wrongParams("参数{$string}缺失");
    }

    /**
     * 参数错误时的返回
     * @param $message
     * @return array
     */
    public static function wrongParams($message)
    {
        return json_encode([
            'code' => self::CODE_参数错误,
            'message' => $message,
            'data' => [],
        ]);
    }

    /**
     * 需要登录的返回
     * @param $message
     * @return array
     */
    public static function needAuth($message)
    {
        return json_encode([
            'code' => self::CODE_需要登录,
            'message' => $message,
            'data' => [],
        ]);
    }

    /**
     * 未授权访问的返回
     * @param string $message
     * @return array
     */
    public static function forbidden($message = '')
    {
        return json_encode([
            'code' => self::CODE_未授权,
            'message' => $message,
            'data' => [],
        ]);
    }

    /**
     * 未找到的返回
     * @param $message
     * @return array
     */
    public static function notFound($message)
    {
        return json_encode([
            'code' => self::CODE_未找到,
            'message' => $message,
            'data' => [],
        ]);
    }

    /**
     * 网关通讯超时/失败、远端调用超时/失败时的返回
     * @param $message
     * @return array
     */
    public static function gatewayTimeout($message)
    {
        return json_encode([
            'code' => self::CODE_通讯超时,
            'message' => $message,
            'data' => [],
        ]);
    }

}