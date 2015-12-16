<?php
/**
 * User: andrey
 * Date: 12/11/15
 * Time: 11:09 PM
 */

namespace Serdjuk\Datagrid;

interface DatagridKernelInterface extends RenderableInterface
{
    /**
     * For ajax calls
     *
     * @return array
     */
    public function getData();

    /**
     * @example ['filters' => [], 'pagination' => [], 'group' => []]
     * @return mixed
     */
    public function getFiters();

    /**
     * Every filter is symfony form type
     *
     * @return mixed
     */
    public function renderFilters();

//    public function setConfigurationProvider(ConfigurationProviderInterface $conf);
}

