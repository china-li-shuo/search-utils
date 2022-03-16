<?php

namespace lishuo\search\search\elasticsearch;

use Elasticsearch\ClientBuilder;
use lishuo\search\exception\ConfigException;
use lishuo\search\search\SearchConfig;


class ElasticSearch
{
    private $config;

    /**
     * 根据配置类初始化
     */
    public function init(SearchConfig $config): ElasticSearch
    {
        $this->config = $config;
        //校验参数是否设置
        $this->config->checkParams();
        $hosts = [
            "{$this->config->getIp()}:{$this->config->getPort()}"
        ];
        $this->searchClient = ClientBuilder::create()->setHosts($hosts)->build();
        return $this;
    }


    public function createIndex($index, $field)
    {
        //检查要创建的index类型是否存在，存在删除
        if ($this->searchClient->indices()->exists(['index' => $index])) {
            $this->searchClient->indices()->delete(['index' => $index]);
        }
        // 创建索引
        $params = [
            // 生成索引的名称
            'index' => $index,
            // 类型 body
            'body' => [
                'settings' => [
                    // 分区数
                    'number_of_shards' => $this->config->getShards(),
                    // 副本数
                    'number_of_replicas' => $this->config->getReplicas()
                ],
                'mappings' => [
                    '_doc' => [
                        '_source' => ['enabled' => true],
                        // 字段 类似表字段，设置类型
                        'properties' => [
                            $field => [
                                'type' => 'text',
                                //中文分词 张三你好 张三 你好 张三你好
                                'analyzer' => 'ik_max_word',
                                'search_analyzer' => 'ik_max_word'
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return $this->searchClient->indices()->create($params);
    }
    
    public function get()
    {
        return 'ElasticSearch 查询数据';
    }
}