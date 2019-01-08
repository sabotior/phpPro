<?
abstract class Goods {
  protected $name;
  protected $price;

  protected function getName() {
    return $this->name;
  }
  abstract protected function getPrice();

  protected function setName($name) {
    $this->name = $name;
  }
  protected function setPrice($price) {
    $this->price = $price;
  }
}

/**
 * штучный товар
 */
class PieceGoods extends Goods {
  protected $count;
  protected function setCount($count) {
    $this->count = $count;
  }
  public function __construct ($name, $price, $count) {
    $this->setName($name);
    $this->setPrice($price);
    $this->setCount($count);    
    echo $this->getName()." ".$this->getPrice()."руб. * ".$this->getCount()."шт. = ".$this->getTotal()."руб. ";
  } 
  protected function getCount() {
    return $this->count;
  }
  protected function getPrice() {
    return $this->price;
  }  
  public function getTotal() {
    return $this->getPrice() * $this->getCount();
  }
}

/**
 * цифровой товар
 */
class DigitalGoods extends PieceGoods {
  function getPrice() {
    return $this->price/2;
  } 
}

/**
 * товар на развес
 */
class WeightGoods extends Goods {
  protected $weight;
  protected function setWeight($weight) {
    $this->weight = $weight;
  }
  public function __construct ($name, $price, $weight) {
    $this->setName($name);
    $this->setPrice($price);
    $this->setWeight($weight);
    echo $this->getName()." ".$this->getPrice()."руб. * ".$this->getWeight()."кг = ".$this->getTotal()."руб. ";
  } 
  protected function getWeight() {
    return $this->weight;
  }
  protected function getPrice() {
    return $this->price;
  }  
  public function getTotal() {    
    return $this->getPrice() * $this->getWeight();
  }
}

$pieceGood = new PieceGoods("Телефон", 10000, 1);
?><br><?
$digitalGood = new DigitalGoods("Программа", 10000, 1);
?><br><?
$weightGood = new WeightGoods("Мука", 50, 1.5);
?><br><?
echo "Всего: ".($pieceGood->getTotal()+$digitalGood->getTotal()+$weightGood->getTotal());