<?php
/**
 * Created by PhpStorm.
 * User: shellvon
 * Date: 16/4/16
 * Time: 下午6:37.
 */

namespace Model;

use MicroMan\MicroModel;

class CostTypeModel extends MicroModel
{
    const TABLE_NAME = 'cost_type';

    /**
     * @return static
     */
    public static function getInstance()
    {
        return parent::createInstance(__CLASS__); // TODO: Change the autogenerated stub
    }

    public function getTableName()
    {
        return self::TABLE_NAME; // TODO: Change the autogenerated stub
    }
}