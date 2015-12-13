<?php
/**
 * User: andrey
 * Date: 12/13/15
 * Time: 11:33 PM
 */

namespace Serdjuk\Datagrid\DataProvider;

/**
 * !!! as DQL can return array of primitives or array of entities,
 *  it should be processed differently
 *
 * call getData() >>>
 *
 * > EVENT_PRE_BUILD_DQL - there are no QueryBuilder, extension can:
 *      - stop process
 *      - modify config view
 *
 * build QB DQL (by dql builder interface)
 *
 * > EVENT_PRE_EXECUTE_DQL - modify DQL by DatagridKernelExtensionInterface
 *
 * execute DQL
 *
 * > EVENT_PRE_PARSE_DQL
 *
 * parse DQL to data using walkers: Row and Cell, Row include multiple cells, GridPage include Rows
 */
class EntityEventDrivenProvider extends  AbstractEventDrivenDataProvider
{
    const EVENT_PRE_BUILD_DQL       = 'event_pre_build_dql';
    const EVENT_PRE_EXECUTE_DQL     = 'event_pre_execute_dql';
    const EVENT_PRE_PARSE_RESULT    = 'event_pre_parse_result';
    const EVENT_POST_PARSE_RESULT   = 'event_post_parse_result';

    protected static $events = [
        self::EVENT_PRE_BUILD_DQL,
        self::EVENT_PRE_EXECUTE_DQL,
        self::EVENT_PRE_PARSE_RESULT,
        self::EVENT_POST_PARSE_RESULT,
    ];

    protected $dql;

    protected $data;

    protected $dispatched = false;

    public function getData()
    {
        if ($this->dispatched) {
            return $this->data;
        }

        $this->dispatcher->dispatch(self::EVENT_PRE_BUILD_DQL);
        $this->dispatcher->dispatch(self::EVENT_PRE_EXECUTE_DQL);
        $this->dispatcher->dispatch(self::EVENT_PRE_PARSE_RESULT);
        $this->dispatcher->dispatch(self::EVENT_POST_PARSE_RESULT);

        return $this->data;
    }
}