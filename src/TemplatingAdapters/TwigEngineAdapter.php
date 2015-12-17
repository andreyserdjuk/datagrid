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

    /**
     * __construct helper
     *
     * @param null $viewsDir
     * @param $cacheDir
     * @return TwigEngineAdapter
     */
    public static function getInstance($viewsDir = null, $cacheDir = null)
    {
        if (is_null($viewsDir)) {
            $viewsDir = __DIR__ . '/../Resources/views';
        }

        if (is_null($cacheDir)) {
            $cacheDir = __DIR__ . '/../../cache';
        }

        $loader = new \Twig_Loader_Filesystem($viewsDir);

        return new self(new \Twig_Environment($loader, ['cache' => $cacheDir]));
    }
    
    public function __construct(\Twig_Environment $twig)
    {
        $this->twigEnvironment = $twig;
    }

    public function render($template, $data)
    {
        $templates = $this->twigEnvironment->loadTemplate('blocks.html.twig');
        return $templates->renderBlock($template, $data);
    }
}