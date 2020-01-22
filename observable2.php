<?php
abstract class Observable {

  private $observers = array();

  public function addObserver(Observer $observer) {
         array_push($this->observers, $observer);
  }

  public function notifyObservers() {
         for ($i = 0; $i < count($this->observers); $i++) {
                 $widget = $this->observers[$i];
                 $widget->update($this);
         }
     }
}


class DataSource extends Observable {

  private $names;
  private $prices;
  private $years;

  function __construct() {
         $this->names = array();
         $this->prices = array();
         $this->years = array();
  }

  public function addRecord($name, $price, $year) {
         array_push($this->names, $name);
         array_push($this->prices, $price);
         array_push($this->years, $year);
         $this->notifyObservers();
  }

  public function getData() {
         return array($this->names, $this->prices, $this->years);
  }
}

class DataSource2 extends Observable {

  private $names;
  private $prices;
  private $years;
  private $color;
  private $size;

  function __construct() {
         $this->names = array();
         $this->prices = array();
         $this->years = array();
         $this->color = array();
         $this->size = array();
  }

  public function addRecord($name, $price, $year, $color, $size) {
         array_push($this->names, $name);
         array_push($this->prices, $price);
         array_push($this->years, $year);
         array_push($this->color, $color);
         array_push($this->size, $size);
         $this->notifyObservers();
  }

  public function getData() {
         return array($this->names, $this->prices, $this->years, $this->color, $this->size);
  }
}

class DataSourcePerro extends Observable {

  private $ingrediente;
  private $peso;
  private $calorias;

  function __construct() {
         $this->ingrediente = array();
         $this->peso = array();
         $this->calorias = array();
  }

  public function addRecord($ingrediente, $peso, $calorias) {
         array_push($this->ingrediente, $ingrediente);
         array_push($this->peso, $peso);
         array_push($this->calorias, $calorias);
         $this->notifyObservers();
  }

  public function getData() {
         return array($this->ingrediente, $this->peso, $this->calorias);
  }
}
?>