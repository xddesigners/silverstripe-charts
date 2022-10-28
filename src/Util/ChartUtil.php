<?php

namespace XD\Charts\Util;

use SilverStripe\ORM\Connect\MySQLQuery;
use SilverStripe\ORM\Queries\SQLSelect;
use XD\Charts\Charts\DataSet;

class ChartUtil
{

    public static function convertData($data, $columns=null)
    {
        $class = get_class($data);
        switch ($class) {
            case SQLSelect::class:
                $data = $data->execute();
                return self::convertMySQLQuery($data, $columns);
            case MySQLQuery::class:
                return self::convertMySQLQuery($data, $columns);
            default:
                die('Class ' . $class . ' not implemented');
        }
    }

    private static function convertMySQLQuery($data, $columns)
    {
        $labels = [];
        foreach ($data as $row) {
            $labels[] = $row[array_key_first($row)];
        }

        $rows = [];
        foreach ($data as $row) {
            $rows[] = $row[array_key_last($row)];
        }
        return ['labels' => $labels, 'data' => $rows];
    }

}