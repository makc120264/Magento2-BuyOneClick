<?php

namespace Test\BuyOneClick\Block\Adminhtml\Grid\Edit;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $registry,
            $formFactory,
            $data
        );
    }

    /**
     * Prepare form.
     *
     * @return $this
     * @throws LocalizedException
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id' => 'edit_form',
                    'action' => $this->getData('action'),
                    'method' => 'post'
                ]
            ]
        );

        $form->setHtmlIdPrefix('apgrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset', ['legend' => __('Edit order'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset', ['legend' => __('Add new order'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'sku', 'text', [
                'name' => 'sku',
                'label' => __('Sku'),
                'id' => 'sku',
                'title' => __('Sku'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'phone', 'text', [
                'name' => 'phone',
                'label' => __('Phone'),
                'id' => 'phone',
                'title' => __('Phone'),
                'required' => true,
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
