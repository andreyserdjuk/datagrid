<?php
/**
 * User: andrey
 * Date: 12/12/15
 * Time: 5:28 PM
 */

namespace Serdjuk\Datagrid;

use Serdjuk\Datagrid\DataProvider\DataProviderInterface;

abstract class AbstractDatagridKernel implements DatagridKernelInterface
{
    protected $dataProvider;

    protected $templating;

//    protected $configurationProvider;

    public function __construct(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * @param object $templating should implement Twig_TemplateInterface::render(array $context)
     */
    public function setTemplating($templating)
    {
        $this->templating = $templating;
    }

    public function getData()
    {
        return $this->dataProvider->getData();
    }

//    public function setConfigurationProvider(ConfigurationProviderInterface $conf)
//    {
//        $this->configurationProvider = $conf;
//    }
}