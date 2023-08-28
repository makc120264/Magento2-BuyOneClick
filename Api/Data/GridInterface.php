<?php

namespace Test\BuyOneClick\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const SKU = 'sku';
    const PHONE = 'phone';
    const CREATED_AT = 'created_at';

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId);

    /**
     * @return mixed
     */
    public function getPhone();

    /**
     * @param $phone
     * @return mixed
     */
    public function setPhone($phone);

    /**
     * Get Sku.
     *
     * @return varchar
     */
    public function getSku();

    /**
     * Set Sku.
     */
    public function setSku($title);

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);

}
