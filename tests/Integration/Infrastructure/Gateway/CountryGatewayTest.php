<?php
declare(strict_types=1);

namespace Speaky\Unit\Infrastructure\Gateway;

use PHPUnit\Framework\TestCase;
use Speaky\Domain\Entity\Country;
use Speaky\Integration\Dependency\CountryGatewayDependency;

/**
 * @covers \Speaky\Infrastructure\Gateway\CountryGateway
 * @uses   \Speaky\Domain\Entity\Country
 */
final class CountryGatewayTest extends TestCase
{
    use CountryGatewayDependency;

    public function test_country_can_be_found_by_name(): void
    {
        $country = $this->countryGateway->findByName('germany');

        $this->assertSame('276', $country->getId());
        $this->assertSame('Germany', $country->getName());
        $this->assertSame('de', $country->getLanguage());
    }

    public function test_countries_can_be_found_by_language_code(): void
    {
        $countries = $this->countryGateway->findByLanguage('ro');

        $this->assertCount(2, $countries);

        $this->assertInstanceOf(Country::class, $countries[0]);
        $this->assertSame('498', $countries[0]->getId());
        $this->assertSame('Moldova (Republic of)', $countries[0]->getName());
        $this->assertSame('ro', $countries[0]->getLanguage());

        $this->assertInstanceOf(Country::class, $countries[1]);
        $this->assertSame('642', $countries[1]->getId());
        $this->assertSame('Romania', $countries[1]->getName());
        $this->assertSame('ro', $countries[1]->getLanguage());
    }
}
