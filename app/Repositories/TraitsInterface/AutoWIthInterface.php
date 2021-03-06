<?php

/**
 * Created by PhpStorm.
 * User: xuan
 * Date: 9/22/15
 * Time: 1:13 AM.
 */
namespace PHPHub\Repositories\TraitsInterface;

interface AutoWIthInterface
{
    /**
     * 自动 with include 的数据.
     *
     * @return $this
     */
    public function autoWith();

    /**
     * 添加一个可用的引入项.
     *
     * @param $string
     * @param $array
     *
     * @return mixed
     */
    public function addAvailableInclude($string, $array);

    /**
     * 设置数据要查询的字段,自动绑定 include 关联的外键.
     *
     * @param $columns
     *
     * @return $this
     */
    public function autoWithRootColumns($columns);
}
