<?php

namespace Volcengine\Common;

class Paginator
{
    private $fetchPage;
    private $hasMore;
    private $pageNumber = 1;
    private $pageSize = 20;
    private $maxPages;

    public function __construct(callable $fetchPage, callable $hasMore = null)
    {
        $this->fetchPage = $fetchPage;
        $this->hasMore = $hasMore;
    }

    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    public function setMaxPages($maxPages)
    {
        $this->maxPages = $maxPages;
        return $this;
    }

    public function eachPage(callable $consumer)
    {
        $pageNumber = $this->pageNumber;
        while (true) {
            $page = call_user_func($this->fetchPage, $pageNumber, $this->pageSize);
            $lastPage = !$this->resolveHasMore($page, $pageNumber);
            $shouldContinue = call_user_func($consumer, $page, $lastPage, $pageNumber);

            if ($shouldContinue === false || $lastPage) {
                return;
            }

            $pageNumber++;
            if ($this->maxPages !== null && $pageNumber > $this->maxPages) {
                return;
            }
        }
    }

    private function resolveHasMore($page, $pageNumber)
    {
        if ($this->hasMore !== null) {
            return (bool) call_user_func($this->hasMore, $page, $pageNumber, $this->pageSize);
        }

        $common = $this->extractCommonPagination($page);
        if ($common !== null) {
            if ($common['total'] !== null && $common['page_size'] !== null) {
                return ($common['page_number'] * $common['page_size']) < $common['total'];
            }
            if ($common['next_token'] !== null) {
                return $common['next_token'] !== '';
            }
        }

        return false;
    }

    private function extractCommonPagination($page)
    {
        $access = function ($source, $field) {
            $getter = 'get' . $field;
            if (is_object($source) && method_exists($source, $getter)) {
                return $source->$getter();
            }
            if (is_array($source) && array_key_exists($field, $source)) {
                return $source[$field];
            }
            if (is_object($source) && isset($source->$field)) {
                return $source->$field;
            }
            return null;
        };

        return [
            'total' => $access($page, 'TotalCount'),
            'page_number' => $access($page, 'PageNumber') ?: $access($page, 'PageNum') ?: $this->pageNumber,
            'page_size' => $access($page, 'PageSize'),
            'next_token' => $access($page, 'NextToken'),
        ];
    }
}
