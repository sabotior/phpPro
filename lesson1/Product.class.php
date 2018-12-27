<?
class Product {
  var $productID;
  var $alias;
  var $name;
  var $buyPrice;
  var $price;
  var $oldPrice;
  var $vendor;
  function __construct() {
    $this->messageOK();
  }
  function messageOK() {
    echo "Объект создан";
  }
}
?>