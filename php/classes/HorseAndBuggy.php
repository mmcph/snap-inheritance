<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 4/30/18
 * Time: 8:24 AM
 */

namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

class Profile implements \JsonSerializable {

	/**
	 * numHorses; this is the primary key
	 * @var int $numHorses
	 **/
	private $numHorses;

// Constructor
	/**
	 * constructor for Vehicle
	 *
	 * @param int[1, 20] $numHorses number of horses pulling the buggy
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(int $numHorses) {
		try {
			$this->setNumHorses($numHorses);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	
	/**
	 * accessor method for numHorses
	 *
	 * @return int value of numHorses
	 **/
	public function getNumHorses(): int {
		return ($this->numHorses);
	}
	/**
	 * mutator method for numHorses
	 *
	 * @param int $newNumHorses new value of numHorses
	 * @throws \TypeError if $newNumHorses is not an int
	 * @throws \RangeException if 0 > $newNumHorses > 20
	 **/
	public function setNumHorses($newNumHorses): void {
		if(is_int($newNumHorses) === false || empty($newNumHorses) === true) {
			throw(new \TypeError("Input is empty or not an integer"));
		}
		if($newNumHorses > 20 || $newNumHorses < 0) {
			throw(new \RangeException("Input is too large or small"));
		}

		// store new numHorses
		$this->numHorses = $newNumHorses;
	}
}