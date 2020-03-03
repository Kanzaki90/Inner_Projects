<?php
namespace Girit\RunTask\Model\ResourceModule;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb {

    protected function _construct()
    {
        $this->_init('mastering_sample_item', 'id');
    }
}
