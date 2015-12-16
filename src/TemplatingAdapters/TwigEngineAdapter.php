<?php
/**
 * User: andrey
 * Date: 12/16/15
 * Time: 11:13 PM
 */

namespace Serdjuk\Datagrid\TemplatingAdapters;


use Serdjuk\Datagrid\TemplateEngineAdapterInterface;

class TwigEngineAdapter implements TemplateEngineAdapterInterface
{
    private $twigEnvironment;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twigEnvironment = $twig;
    }

    public function render($template, $data)
    {
        $this->twigEnvironment->loadTemplate($template);
        return $this->twigEnvironment->render($template, $data);
    }
}