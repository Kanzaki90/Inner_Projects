<?php

namespace Girit\RunTask\Model\ResourceModule\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

use Girit\RunTask\Model\Item;
use Girit\RunTask\Model\ResourceModule\Item as ItemResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = "id";

    protected function _construct()
    {
        $this->_init(
            Item::class, ItemResource::class);
    }
}
