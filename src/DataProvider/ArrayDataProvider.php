<?php
/**
 * User: andrey
 * Date: 12/13/15
 * Time: 6:24 PM
 */

namespace Serdjuk\Datagrid\DataProvider;


class ArrayDataProvider implements DataProviderInterface
{
    private $data;

    public function getData()
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }
}