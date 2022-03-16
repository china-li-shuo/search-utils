<?php
/**
 * Author: 李硕
 * Email: kezuo@foxmail.com
 * Date: 2022/11/20
 * Time: 11:22
 */

namespace lishuo\search\response;


class DeleteResponse
{
    private $deleted;

    private $sourceData;

    /**
     * PutResponse constructor.
     * @param $deleted
     * @param $sourceData
     */
    public function __construct(array $deleted, $sourceData)
    {
        $this->deleted = $deleted;
        $this->sourceData = $sourceData;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @return mixed
     */
    public function getSourceData(): array
    {
        return $this->sourceData;
    }
}