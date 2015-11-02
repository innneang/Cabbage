<?php

namespace AjaxLiveSearch\core;

if (count(get_included_files()) === 1) {
    exit("Direct access not permitted.");
}

/**
 * Class Config
 */

class Config
{
    /**
     * @var array
     */

    private static $configs = array(
        // ***** Database ***** //
        'currentDataSource' => 'mainMysql',
        'dataSources' => array(
            'mainMysql' => array(
                'host' => 'iinnn.net',
                'database' => 'admin_fridgerecipe',
                'username' => 'admin_recipe',
                'pass' => 'BBJVvgJr0T',
                'table' => 'recipe',
                // specify the name of search columns
                //'searchColumns' => array('ingredient'),
                // specify order by column. This is optional
                'orderBy' => '',
                // specify order direction e.g. ASC or DESC. This is optional
                'orderDirection' => '',
                // filter the result by entering table column names
                // to get all the columns, remove filterResult or make it an empty array
                'filterResult' => array(),
                // specify search query comparison operator. possible values for comparison operators are: 'LIKE' and '='. this is required.
                'comparisonOperator' => 'LIKE',
                // searchPattern is used to specify how the query is searched. possible values are: 'q', '*q', 'q*', '*q*'. this is required.
                'searchPattern' => 'q*',
                // specify search query case sensitivity
                'caseSensitive' => false,
                // to limit the maximum number of result uncomment this:
                //'maxResult' => 100,
                'type' => 'mysql'
            )
        ),
        // ***** Form ***** //
        // This must be the same as form_anti_bot in script.min.js or script.js
        'antiBot' => "Ehsan's guard",
        // Assigning more than 3 seconds is not recommended
        'searchStartTimeOffset' => 2,
        // ***** Search Input ***** /
        'maxInputLength' => 20
    );

    /**
     * @param $key
     *
     * @return mixed
     * @throws \Exception
     */
    public static function getConfig($key)
    {
        if (!array_key_exists($key, static::$configs)) {
            throw new \Exception("Key: {$key} does not exist in the configs");
        }

        return static::$configs[$key];
    }
}
