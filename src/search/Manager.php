<?php
/**
 * Author: 李硕
 * Email: kezuo@foxmail.com
 * Date: 2021/8/31
 * Time: 15:59
 */

namespace lishuo\search;

use lishuo\search\exception\NonsupportSearchTypeException;
use lishuo\search\search\elasticsearch\ElasticSearch;
use lishuo\search\search\xunsearch\XunSearch;
use lishuo\search\search\sphinx\Sphinx;

class Manager
{

    /**
     * 获取指定云存储实例
     * @param string $type 云存储类型，阿里云：aliyun、腾讯云：tencent、七牛云：qiniu
     * @return Aliyun|Tencent 具体类型云存储实例
     * @throws NonsupportStorageTypeException
     */
    public static function search(string $type)
    {
        $search = null;
        switch ($type) {
            case "elasticsearch":
                $search = new ElasticSearch();
                break;
            case "xunsearch":
                $search = new XunSearch();
                break;
            case "sphinx":
                $search = new Sphinx();
                break;
            default:
                throw new NonsupportSearchTypeException();
        }
        return $search;
    }
}