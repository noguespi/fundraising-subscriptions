<?php

declare( strict_types = 1 );

namespace WMDE\Fundraising\SubscriptionContext\Tests\Unit\Validation;

use WMDE\Fundraising\Entities\Subscription;
use WMDE\Fundraising\SubscriptionContext\Domain\Repositories\SubscriptionRepository;
use WMDE\Fundraising\SubscriptionContext\Validation\SubscriptionDuplicateValidator;

/**
 * @covers \WMDE\Fundraising\SubscriptionContext\Validation\SubscriptionDuplicateValidator
 *
 * @license GNU GPL v2+
 */
class SubscriptionDuplicateValidatorTest extends \PHPUnit\Framework\TestCase {

	public function testGivenSubscriptionCountOfZero_validationSucceeds(): void {
		$repository = $this->createMock( SubscriptionRepository::class );
		$repository->method( 'countSimilar' )->willReturn( 0 );

		$cutoffDateTime = new \DateTime( '3 hours ago' );
		$validator = new SubscriptionDuplicateValidator( $repository, $cutoffDateTime );

		$this->assertTrue( $validator->validate( new Subscription() )->isSuccessful() );
	}

	public function testGivenSubscriptionCountGreaterThanZero_validationFails(): void {
		$repository = $this->createMock( SubscriptionRepository::class );
		$repository->method( 'countSimilar' )->willReturn( 1 );

		$cutoffDateTime = new \DateTime( '3 hours ago' );
		$validator = new SubscriptionDuplicateValidator( $repository, $cutoffDateTime );

		$this->assertFalse( $validator->validate( new Subscription() )->isSuccessful() );
	}

}
