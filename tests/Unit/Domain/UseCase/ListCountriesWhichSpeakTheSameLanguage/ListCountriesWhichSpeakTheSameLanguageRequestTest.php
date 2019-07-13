<?php
declare(strict_types=1);

namespace Speaky\Unit\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage;

use PHPUnit\Framework\TestCase;
use Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageRequest;

/**
 * @covers \Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageRequest
 */
final class ListCountriesWhichSpeakTheSameLanguageRequestTest extends TestCase
{
    public function test_request_can_be_created_and_parameters_received_via_getters(): void
    {
        $request = new ListCountriesWhichSpeakTheSameLanguageRequest('Germany');
        $this->assertSame('Germany', $request->getCountry());
    }

    public function test_an_exception_is_thrown_when_trying_to_create_request_with_invalid_country_name(): void
    {
        $this->expectExceptionMessage('Invalid country name: foo123');
        new ListCountriesWhichSpeakTheSameLanguageRequest('foo123');
    }
}
