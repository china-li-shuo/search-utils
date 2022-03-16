<?php
/**
 * Author: 李硕
 * Email: kezuo@foxmail.com
 * Date: 2022/11/20
 * Time: 11:22
 */

namespace lishuo\search\search;


use lishuo\search\exception\ConfigException;

class SearchConfig
{

    private $ip;

    private $port;

    private $shards;

    private $replicas;


    /**
     * @param string $ip 连接ip
     * @param string $port 端口号
     * @param string $shards 分片
     * @param string $replicas 分区
     */
    public function __construct(string $ip, string $port, $shards = 5, $replicas = 1)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->shards = $shards;
        $this->replicas = $replicas;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getShards(): string
    {
        return $this->shards;
    }

    /**
     * @return string
     */
    public function getReplicas(): string
    {
        return $this->replicas;
    }

    /**
     * 配置参数基础检查
     * @return bool
     * @throws ConfigException
     */
    public function checkParams(): bool
    {
        $objectVars = get_object_vars($this);
        foreach ($objectVars as $key => $value) {
            if (is_null($value)) {
                throw new ConfigException("配置参数{$key}未配置");
            }
        }
        return true;
    }
}