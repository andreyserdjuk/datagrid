<?php
/**
 * User: andrey
 * Date: 12/12/15
 * Time: 7:50 PM
 */

namespace Serdjuk\Datagrid\Tests;


use PHPUnit_Extensions_Database_DB_IDatabaseConnection;
use Serdjuk\Datagrid\DatagridKernel;
use Serdjuk\Datagrid\DataProvider\ArrayDataProvider;
use Serdjuk\Datagrid\TemplatingAdapters\TwigEngineAdapter;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Yaml\Yaml;

//class DatagridTest extends \PHPUnit_Extensions_Database_TestCase
//PHPUnit_Extensions_Database_DataSet_AbstractDataSet
class DatagridTest extends \PHPUnit_Framework_TestCase
{
    protected $data;

    public function setUp()
    {
        $this->data = Yaml::parse(file_get_contents(__DIR__ . '/dataset/guestbook.yml'));
    }

    /**
     * For instance we want to render raw array of with different data types:
     *  - integer
     *  - float
     *  - string
     *  - boolean
     *  - array - we have own array renderer but what if User wants to render it in a different way?
     *  - DateTime - probably with custom format
     *  - blank
     *  - some undefined type that we dont know how to render
     */
    public function testArrayDataProvider()
    {
        $grid = new DatagridKernel($this->makeArrayDataProvider($this->data));
        $this->assertEquals($this->data, $grid->getData());
    }

    /**
     * Test whether array data is rendered correctly
     */
    public function testRenderArrayData()
    {
        $grid = new DatagridKernel(
            $this->makeArrayDataProvider($this->data),
            TwigEngineAdapter::getInstance()
        );

        $renderedData = $grid->render();

        $crawler = new Crawler();
        $crawler->addContent($renderedData);

        $tableRows = $crawler->filter('tr');

        /**
         * find the rendered data in attributes and tag content
         */
        $tableRows->each(function ($node, $i) {
            $node->children()->each(function ($td, $tdi) use ($i) {
                $this->assertEquals(
                    $this->data['rows'][$i]['cells'][$td->attr('class')],
                    $td->text()
                );
            });
        });

        // count of root element from dataset should be equal rendered rows
        $this->assertEquals(count($this->data['rows']), $tableRows->count());
    }

//    public function getDataSet()
//    {
//        return $this->createMySQLXMLDataSet('/path/to/file.xml');
//    }
//
//    /**
//     * Returns the test database connection.
//     *
//     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
//     */
//    protected function getConnection()
//    {
//        // TODO: Implement getConnection() method.
//    }

    protected function makeArrayDataProvider($data)
    {
        $dataProvider = new ArrayDataProvider();
        $dataProvider->setData($data);
        return $dataProvider;
    }
}
