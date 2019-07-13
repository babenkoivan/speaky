<?php
declare(strict_types=1);

namespace Speaky\Integration\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage;

use PHPUnit\Framework\TestCase;
use Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageRequest;
use Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageUseCase;
use Speaky\Integration\Dependency\CountryGatewayDependency;

/**
 * @covers \Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageUseCase
 * @uses   \Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageRequest
 * @uses   \Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageResponse
 * @uses   \Speaky\Infrastructure\Gateway\CountryGateway
 * @uses   \Speaky\Domain\Entity\Country
 */
final class CheckIfCountriesSpeakTheSameLanguageUseCaseTest extends TestCase
{
    use CountryGatewayDependency;

    public function test_countries_with_the_same_language_return_positive_result(): void
    {
        $request = new CheckIfCountriesSpeakTheSameLanguageRequest('Austria', 'Germany');
        $response = (new CheckIfCountriesSpeakTheSameLanguageUseCase($this->countryGateway))->execute($request);

        $this->assertTrue($response->isTheSameLanguage());
    }

    public function test_countries_with_different_languages_return_negative_result(): void
    {
        $request = new CheckIfCountriesSpeakTheSameLanguageRequest('France', 'Germany');
        $response = (new CheckIfCountriesSpeakTheSameLanguageUseCase($this->countryGateway))->execute($request);

        $this->assertFalse($response->isTheSameLanguage());
    }
}
