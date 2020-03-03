<?php

namespace Girit\RunTask\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{

    protected function _construct()
    {
        $this->_init(\Girit\RunTask\Model\ResourceModule\Item::class);
    }
}
