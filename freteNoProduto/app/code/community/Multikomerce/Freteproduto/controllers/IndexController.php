<?php

class Multikomerce_Freteproduto_IndexController extends Mage_Core_Controller_Front_Action
{

    
    public function indexAction(){
        $cep = $this->getRequest()->getParam('cep');
        $productid = $this->getRequest()->getParam('productid');
        
        $_product = Mage::getModel('catalog/product')->load($productid);
       if($_product->isSaleable())
            {
  
            $quote = Mage::getModel('sales/quote');
            $quote->addProduct($_product); 
            $quote->getShippingAddress()->setCountryId('BR');
            $quote->getShippingAddress()->setPostcode($cep);
           
            $quote->getShippingAddress()->collectTotals();
            $quote->getShippingAddress()->setCollectShippingRates(true);
            $quote->getShippingAddress()->collectShippingRates();
            $rates = $quote->getShippingAddress()->getShippingRatesCollection();
            
            foreach ($rates as $rate)
            {
               echo $rate->getMethodTitle() . " - " . Mage::helper('core')->currency($rate->getPrice()) . "<br>";
               // var_export($rate->debug());
            }
        }
    }
    
    public function comandoAction(){
        echo "Comando";
    }
   

  
    

}
