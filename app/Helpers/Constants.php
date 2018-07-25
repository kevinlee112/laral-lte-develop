<?php
/**
 * Created by PhpStorm.
 * User: liqingyuan
 * Date: 2018/7/24
 * Time: 下午7:22
 */


class Constants
{
    /**
     * 基本错误类型
     */
    const SUCCESS = 1;    // 操作成功
    const FAIL = 0;    // 操作失败


    /**
     * 业务错误类型
     * 错错误码长度为 4 位
     * 不同业务请增加1000位
     * 如： -1001 和 -2001
     */
    const ERR_INFO_NOT_EXISTS = -1001;    // 信息不存在


    /**
     * 错误消息响应
     */
    private static $_errMsg = [
        // 基础错误
        self::SUCCESS => ['成功', 'success'],
        self::FAIL => ['失败', 'fail'],


        //其他业务请在下面对照写中英文错误信息

    ];

    public static function msg($errno, $lang = 'zh')
    {
        $lang = 'zh' === $lang ? 0 : 1;
        return self::$_errMsg[$errno][$lang];
    }
}
