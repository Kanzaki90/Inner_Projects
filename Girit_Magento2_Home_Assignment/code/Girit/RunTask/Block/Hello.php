<?php

namespace Girit\RunTask\Block;

use Magento\Framework\View\Element\Template;
use Girit\RunTask\Model\ResourceModule\Item\Collection;
use Girit\RunTask\Model\ResourceModule\Item\CollectionFactory;

class Hello extends Template
{
    private $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }

    public function getItems()
    {
        //return instances of modules
        /**@return \Girit\RunTask\Model\Item[]
         *
         */
        return $this->collectionFactory->create()->getItems();
    }
}
