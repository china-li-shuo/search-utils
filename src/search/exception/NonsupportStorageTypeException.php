<?php
/**
 * Author: 李硕
 * Email: kezuo@foxmail.com
 * Date: 2022/11/20
 * Time: 11:22
 */

namespace lishuo\search\exception;


class NonsupportSearchTypeException extends \Exception
{
    protected $message = "不支持该类型的搜索引擎";
}