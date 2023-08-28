<?php

namespace Test\BuyOneClick\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Test\BuyOneClick\Model\Grid', 'Test\BuyOneClick\Model\ResourceModel\Grid');
    }
}
