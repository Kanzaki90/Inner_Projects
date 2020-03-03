<?php

namespace Girit\RunTask\Controller\Index;

use Magento\Framework\App\Action\Action;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        /** @var @ \Magento\Framework\Controller\Result\Raw $result */

//        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
//        $result->setContents("Hello World From Front End");
//        return $result;

        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);


    }
}
