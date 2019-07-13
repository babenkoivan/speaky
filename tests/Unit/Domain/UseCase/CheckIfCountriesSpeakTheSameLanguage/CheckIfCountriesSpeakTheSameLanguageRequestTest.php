<?php
declare(strict_types=1);

namespace Speaky\Unit\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage;

use PHPUnit\Framework\TestCase;
use Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageRequest;

/**
 * @covers \Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageRequest
 */
final class CheckIfCountriesSpeakTheSameLanguageRequestTest extends TestCase
{
    public function test_request_can_be_created_and_parameters_received_via_getters(): void
    {
        $request = new CheckIfCountriesSpeakTheSameLanguageRequest('Austria', 'Germany');

        $this->assertSame('Austria', $request->getFirstCountry());
        $this->assertSame('Germany', $request->getSecondCountry());
    }

    public function test_an_exception_is_thrown_when_trying_to_create_request_with_invalid_country_names(): void
    {
        $this->expectExceptionMessage('Invalid country names: foo123, !@#');
        new CheckIfCountriesSpeakTheSameLanguageRequest('foo123', '!@#');
    }
}
