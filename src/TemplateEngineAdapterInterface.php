<?php
/**
 * User: andrey
 * Date: 12/16/15
 * Time: 9:59 PM
 */

namespace Serdjuk\Datagrid;

/**
 * Adapter for templating engine such as Twig
 */
interface TemplateEngineAdapterInterface
{
    /**
     *
     *
     * @param mixed $template
     * @param mixed $data
     * @return string
     */
    public function render($template, $data);
}