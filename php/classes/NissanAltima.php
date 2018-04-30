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

class Profile extends Vehicle implements \JsonSerializable {

	/**
	 * does this belong to me? this is the primary key
	 * @var bool $belongsToMarlon
	 **/
	private $belongsToMarlon;

// Constructor
	/**
	 * constructor for NissanAltima
	 *
	 * @param bool $belongsToMarlon checks vehicle ownership
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(bool $belongsToMarlon) {
		try {
			$this->setBelongsToMarlon($belongsToMarlon);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for belongsToMarlon
	 *
	 * @return bool value of belongsToMarlon
	 **/
	public function getBelongsToMarlon(): bool {
		return ($this->belongsToMarlon);
	}
	/**
	 * mutator method for belongsToMarlon
	 *
	 * @param bool $newBelongsToMarlon new value of belongsToMarlon
	 * @throws \TypeError if $newBelongsToMarlon is not a string
	 * @throws \RangeException if $newBelongsToMarlon > 8chars OR empty string
	 **/
	public function setBelongsToMarlon($newBelongsToMarlon): void {
		if(is_bool($newBelongsToMarlon) === false || empty($newBelongsToMarlon) === true) {
			throw(new \TypeError("Input is empty or not a boolean"));
		}

		// store new belongsToMarlon
		$this->belongsToMarlon = $newBelongsToMarlon;
	}
}