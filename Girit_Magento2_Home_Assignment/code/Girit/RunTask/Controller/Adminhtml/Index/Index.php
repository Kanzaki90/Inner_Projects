<?php

namespace Girit\RunTask\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
        /** @var @ \Magento\Framework\Controller\Result\Raw $result */

        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents("Hello World From Backend ADMINS");
        return $result;
    }
}
