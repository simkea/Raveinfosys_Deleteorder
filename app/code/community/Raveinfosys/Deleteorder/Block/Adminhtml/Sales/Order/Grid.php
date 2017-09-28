<?php
class Raveinfosys_Deleteorder_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{

    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        $actionColumn = $this->getColumn('action');
        if ($actionColumn !== false) {
            unset($actionColumn['actions']);
            $actionColumn['width']    = '100px';
            $actionColumn['renderer'] = 'deleteorder/adminhtml_sales_order_render_delete';
        }
        return $this;
    }

    protected function _prepareMassaction()
    {
        parent::_prepareMassaction();

        $this->getMassactionBlock()->addItem('delete_order', array(
            'label'   => Mage::helper('sales')->__('Delete Order'),
            'url'     => $this->getUrl('*/deleteorder/massDelete', array(
                Mage_Core_Model_Url::FORM_KEY => $this->getFormKey()
            )),
            'confirm' => Mage::helper('sales')
                             ->__('Are you sure you want to delete order?')
        ));

        return $this;
    }
}