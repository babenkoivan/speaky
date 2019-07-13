<?php
declare(strict_types=1);

namespace Speaky\Unit\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage;

use PHPUnit\Framework\TestCase;
use Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageResponse;

/**
 * @covers \Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageResponse
 */
final class CheckIfCountriesSpeakTheSameLanguageResponseTest extends TestCase
{
    public function test_response_can_be_created_and_parameters_received_via_getters(): void
    {
        $response = new CheckIfCountriesSpeakTheSameLanguageResponse(true);
        $this->assertTrue($response->isTheSameLanguage());
    }
}
