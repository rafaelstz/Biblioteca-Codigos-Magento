<?php require 'app/Mage.php';
Mage::app('admin')->setUseSessionInUrl(false);                                                                                                                 
//replace your own orders numbers here:
$test_order_ids=array(
  '100000001',
  '100000002',
  '100000003',
  '100000004',
  '100000005',
  '100000006',
  '100000007',
  '100000008',
  '100000009',
  '100000010',
  '100000011',
  '100000012',
  '100000013',
  '100000014',
  '100000015',
  '100000016',
  '100000017',
  '100000018',
  '100000019',
  '100000020',
  '100000021',
  '100000022',
  '100000023',
  '100000024',
  '100000025',
  '100000026',
);
foreach($test_order_ids as $id){
    try{
        Mage::getModel('sales/order')->loadByIncrementId($id)->delete();
        echo "order #".$id." foi removida".PHP_EOL;
    }catch(Exception $e){
        echo "order #".$id." não pode ser removida: ".$e->getMessage().PHP_EOL;
    }
}
echo "complete."
?>
