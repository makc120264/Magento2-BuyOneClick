<?php

namespace Test\BuyOneClick\Controller\Adminhtml\Grid;

use Test\BuyOneClick\Model\GridFactory;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;

class AddRow extends \Magento\Backend\App\Action
{
    /**
     * @var Registry
     */
    private $coreRegistry;

    /**
     * @var GridFactory
     */
    private $gridFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry ,
     * @param GridFactory $gridFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        GridFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->gridFactory = $gridFactory;
    }

    /**
     * Mapped Grid List page.
     * @return Page
     */
    public function execute()
    {
        $rowId = (int)$this->getRequest()->getParam('id');
        $rowData = $this->gridFactory->create();
        /** @var Page $resultPage */
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();
            if (!$rowData->getEntityId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('buyoneclick/grid/index');
                return;
            }
        }

        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Query') . $rowTitle : __('Add New Query');
        $resultPage->getConfig()->getTitle()->prepend($title);

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Test_BuyOneClick::add_row');
    }
}
