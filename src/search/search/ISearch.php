<?php
/**
 * Author: 李硕
 * Email: kezuo@foxmail.com
 * Date: 2022/11/20
 * Time: 11:22
 */

namespace lishuo\search\search;


use lishuo\search\response\DeleteResponse;
use lishuo\search\response\PutResponse;

interface ISearch
{
    /**
     * 根据配置类初始化
     * @param SearchConfig $config
     * @return mixed
     */
    public function init(SearchConfig $config);


}