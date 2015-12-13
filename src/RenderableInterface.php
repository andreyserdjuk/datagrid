<?php
/**
 * User: andrey
 * Date: 12/11/15
 * Time: 10:32 PM
 */

namespace Serdjuk\Datagrid;


interface RenderableInterface
{
    /**
     * Represent needed internal data as string
     *
     * @return string
     */
    public function render();
}