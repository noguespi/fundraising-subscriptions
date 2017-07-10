<?php

declare( strict_types = 1 );

namespace WMDE\Fundraising\Frontend\SubscriptionContext\UseCases\AddSubscription;

/**
 * @license GNU GPL v2+
 * @author Gabriel Birke < gabriel.birke@wikimedia.de >
 */
class SubscriptionRequest {

	private $salutation = '';
	private $title = '';
	private $firstName = '';
	private $lastName = '';
	private $email = '';
	private $address = '';
	private $postcode = '';
	private $city = '';
	private $wikilogin = false;
	private $trackingString = '';
	private $source = '';

	public function getSalutation(): string {
		return $this->salutation;
	}

	public function setSalutation( string $salutation ): void {
		$this->salutation = $salutation;
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle( string $title ): void {
		$this->title = $title;
	}

	public function getFirstName(): string {
		return $this->firstName;
	}

	public function setFirstName( string $firstName ): void {
		$this->firstName = $firstName;
	}

	public function getLastName(): string {
		return $this->lastName;
	}

	public function setLastName( string $lastName ): void {
		$this->lastName = $lastName;
	}

	public function getEmail(): string {
		return $this->email;
	}

	public function setEmail( string $email ): void {
		$this->email = $email;
	}

	public function getAddress(): string {
		return $this->address;
	}

	public function setAddress( string $address ): void {
		$this->address = $address;
	}

	public function getPostcode(): string {
		return $this->postcode;
	}

	public function setPostcode( string $postcode ): void {
		$this->postcode = $postcode;
	}

	public function getCity(): string {
		return $this->city;
	}

	public function setCity( string $city ): void {
		$this->city = $city;
	}

	public function getWikilogin(): bool {
		return $this->wikilogin;
	}

	public function setWikilogin( bool $wikilogin ): void {
		$this->wikilogin = $wikilogin;
	}

	public function getTrackingString(): string {
		return $this->trackingString;
	}

	public function setTrackingString( string $trackingString ): void {
		$this->trackingString = $trackingString;
	}

	public function getSource(): string {
		return $this->source;
	}

	public function setSource( string $source ): void {
		$this->source = $source;
	}

	/**
	 * Set the wikilogin value from the first value that matches /^(1|0|yes|no)$/
	 *
	 * @param array $values
	 */
	public function setWikiloginFromValues( array $values ): void {
		$trueValues = ['yes', '1'];
		$falseValues = ['no', '0'];
		$matchingValues = array_intersect( $values, array_merge( $trueValues, $falseValues ) );
		$wikilogin = in_array( array_shift( $matchingValues ), $trueValues );
		$this->setWikilogin( $wikilogin );
	}

}