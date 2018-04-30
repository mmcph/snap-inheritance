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
	 * license plate #; this is the primary key
	 * @var string $licensePlate
	 **/
	private $licensePlate;

// Constructor
	/**
	 * constructor for Vehicle
	 *
	 * @param string $licensePlate license plate for this vehicle
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(string $newLicensePlate) {
		try {
			$this->setLicensePlate($licensePlate);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for licensePlate
	 *
	 * @return string value of licensePlate
	 **/
	public function getLicensePlate(): string {
		return ($this->licensePlate);
	}
	/**
	 * mutator method for licensePlate
	 *
	 * @param string $newLicensePlate new value of licensePlate
	 * @throws \TypeError if $newLicensePlate is not a string
	 * @throws \RangeException if $newLicensePlate > 8chars OR empty string
	 **/
	public function setLicensePlate($newLicensePlate): void {
		if(is_string($newLicensePlate) === false) {
			throw(new \TypeError("Input is not a string"));
		}
		if(strlen($newLicensePlate) > 8 || empty($newLicensePlate) === true) {
			throw(new \RangeException("license plate # empty or too large"));
		}
		// store new licensePlate
		$this->licensePlate = $newLicensePlate;
	}
}