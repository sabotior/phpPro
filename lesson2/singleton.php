<?
include "trait.php";
class Singleton {
use TraitSingleton;
  public static function getObject() {
    if (self::$object == null) {
      self::$object = new Singleton;
    }
    return self::$object;
  }
}