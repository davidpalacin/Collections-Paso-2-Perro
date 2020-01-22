<?php
require_once("observable2.php");
require_once("abstract_widget2.php");
require_once("class.collection.php");

class Dog {
  
  private $_onspeak;

  

  public function __construct($name) {
	$this->name = $name;
	}


	public function eat() {
		$datos = new DataSourcePerro();
  		$widget = new WidgetMenu();

  		$datos->addObserver($widget);

  		$datos->addRecord("Pollo", 12, 100);
  		$datos->addRecord("Ternera", 34, 200);
  		$datos->addRecord("Salmon", 13, 300);
 		$datos->addRecord("Sardina", 27, 400);

 		if (isset($this->onspeak)) {
 			if (!call_user_func($this->onspeak)) {
 				return false;
 			}
 		}

		print "Estic dinant!";
		$widget->draw();
	}



	public function onspeak($functionName, $objOrClass = null) {
		if($objOrClass) {
			$callback = array($objOrClass, $functionName);
		} else {
			$callback = $functionName;
		}
		//make sure this stuff is valid
		if(!is_callable($callback, false, $callableName)) {
			throw new Exception("$callableName is not callable " . "as a parameter to onspeak");
			return false;
		}
		$this->onspeak = $callback;
	}
} //end class Dog

function timeToEat() {
		if(time() > strtotime("today 03:00pm")&&
		time() < strtotime("today 09:00pm")) {
			return true;
		} else {
			return false;
		}
	}

//procedural function

$objDog = new Dog('Fido');
$objDog->onspeak('timeToEat');
$objDog->eat();

//$objDog3->onspeak('nonExistentFunction', 'NonExistentClass');
?>