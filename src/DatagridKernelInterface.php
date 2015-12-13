<?php
/**
 * User: andrey
 * Date: 12/11/15
 * Time: 11:09 PM
 */

namespace Serdjuk\Datagrid;

interface DatagridKernelInterface
{
    /**
     * For ajax calls
     *
     * @return array
     */
    public function getData();

    /**
     * Render data using template
     *
     * @return string
     */
    public function renderData();

    /**
     * @example ['filters' => [], 'pagination' => [], 'group' => []]
     * @return mixed
     */
    public function getFiters();

    public function renderFilters();

//    public function setConfigurationProvider(ConfigurationProviderInterface $conf);
}

