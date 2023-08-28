<?php

namespace Test\BuyOneClick\Model;

class Grid extends \Magento\Framework\Model\AbstractModel implements \Test\BuyOneClick\Api\Data\GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ap_grid_records';

    /**
     * @var string
     */
    protected $_cacheTag = 'ap_grid_records';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ap_grid_records';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Test\BuyOneClick\Model\ResourceModel\Grid');
    }

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ID, $entityId);
    }

    /**
     * @return mixed|string
     */
    public function getPhone()
    {
        return $this->getData(self::PHONE);
    }

    public function setPhone($phone)
    {
        $this->setData(self::PHONE, $phone);
    }

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getSku()
    {
        return $this->getData(self::SKU);
    }

    /**
     * Set Title.
     */
    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

}
