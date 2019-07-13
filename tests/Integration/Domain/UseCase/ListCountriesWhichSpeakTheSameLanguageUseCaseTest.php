<?php
declare(strict_types=1);

namespace Speaky\Integration\Domain\UseCase;

use PHPUnit\Framework\TestCase;
use Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageRequest;
use Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageUseCase;
use Speaky\Integration\Dependency\CountryGatewayDependency;

/**
 * @covers \Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageUseCase
 * @uses   \Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageRequest
 * @uses   \Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageResponse
 * @uses   \Speaky\Infrastructure\Gateway\CountryGateway
 * @uses   \Speaky\Domain\Entity\Country
 */
final class ListCountriesWhichSpeakTheSameLanguageUseCaseTest extends TestCase
{
    use CountryGatewayDependency;

    public function test_countries_with_the_same_language_are_found(): void
    {
        $request = new ListCountriesWhichSpeakTheSameLanguageRequest('Romania');
        $response = (new ListCountriesWhichSpeakTheSameLanguageUseCase($this->countryGateway))->execute($request);

        $this->assertSame('ro', $response->getLanguage());
        $this->assertSame(['Moldova (Republic of)'], $response->getCountries());
    }
}
