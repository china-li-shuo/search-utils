<?php
/**
 * Author: 李硕
 * Email: kezuo@foxmail.com
 * Date: 2022/11/20
 * Time: 11:22
 */

namespace lishuo\search\response;


class PutResponse
{
    private $key;

    private $sourceData;

    /**
     * PutResponse constructor.
     * @param $key
     * @param $sourceData
     */
    public function __construct(string $key, $sourceData)
    {
        $this->key = $key;
        $this->sourceData = $sourceData;
    }


    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getSourceData(): array
    {
        return $this->sourceData;
    }
}