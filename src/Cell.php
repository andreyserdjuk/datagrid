<?php
/**
 * User: andrey
 * Date: 12/18/15
 * Time: 12:17 AM
 */

namespace Serdjuk\Datagrid;

/**
 * Class Cell
 */
class Cell implements CellInterface
{
    protected $data;

    /**
     * @var TemplateEngineAdapterInterface
     */
    protected $templateEngine;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return $this->templateEngine->render('cell', $this->data);
    }
}