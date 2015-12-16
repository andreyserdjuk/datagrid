<?php
/**
 * User: andrey
 * Date: 12/12/15
 * Time: 11:12 PM
 */

namespace Serdjuk\Datagrid;

class DatagridKernel extends AbstractDatagridKernel
{
    public function render()
    {
        return $this->templateEngine->render('grid', $this->getData());
    }

    public function getFiters()
    {
        // TODO: Implement getFiters() method.
    }

    public function renderFilters()
    {
        // TODO: Implement renderFilters() method.
    }
}