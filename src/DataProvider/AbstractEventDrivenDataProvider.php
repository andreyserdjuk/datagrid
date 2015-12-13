<?php
/**
 * User: andrey
 * Date: 12/12/15
 * Time: 11:16 PM
 */

namespace Serdjuk\Datagrid\DataProvider;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class AbstractEventDrivenDataProvider implements DataProviderInterface
{
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function addListener($event, $listener, $priority = 0)
    {
        $this->dispatcher->addListener($event, $listener, $priority);
    }

    public function addEventSubscriber(EventSubscriberInterface $subscriber)
    {
        $this->dispatcher->addSubscriber($subscriber);
    }
}
