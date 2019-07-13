<?php
declare(strict_types=1);

namespace Speaky\Unit\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage;

use PHPUnit\Framework\TestCase;
use Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageResponse;

/**
 * @covers \Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageResponse
 */
final class ListCountriesWhichSpeakTheSameLanguageResponseTest extends TestCase
{
    public function test_response_can_be_created_and_parameters_received_via_getters(): void
    {
        $response = new ListCountriesWhichSpeakTheSameLanguageResponse('de', ['Austria', 'Germany']);

        $this->assertSame('de', $response->getLanguage());
        $this->assertSame(['Austria', 'Germany'], $response->getCountries());
    }
}
