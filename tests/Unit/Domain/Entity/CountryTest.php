<?php
declare(strict_types=1);

namespace Speaky\Unit\Domain\Entity;

use PHPUnit\Framework\TestCase;
use Speaky\Domain\Entity\Country;

/**
 * @covers \Speaky\Domain\Entity\Country
 */
final class CountryTest extends TestCase
{
    public function test_country_can_be_created_and_properties_received_via_getters(): void
    {
        $country = new Country('276', 'Germany', 'de');

        $this->assertSame('276', $country->getId());
        $this->assertSame('Germany', $country->getName());
        $this->assertSame('de', $country->getLanguage());
    }
}
