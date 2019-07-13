<?php
declare(strict_types=1);

namespace Speaky\Unit\Application\Command;

use PHPUnit\Framework\TestCase;
use Speaky\Application\Command\CheckIfCountriesSpeakTheSameLanguageCommand;
use Speaky\Application\Input\ConsoleInput;
use Speaky\Application\Output\ConsoleOutput;
use Speaky\Domain\Entity\Country;
use Speaky\Infrastructure\Gateway\CountryGateway;

/**
 * @covers \Speaky\Application\Command\CheckIfCountriesSpeakTheSameLanguageCommand
 * @uses   \Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageUseCase
 * @uses   \Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageRequest
 * @uses   \Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageResponse
 * @uses   \Speaky\Application\Input\ConsoleInput
 * @uses   \Speaky\Application\Output\ConsoleOutput
 * @uses   \Speaky\Infrastructure\Gateway\CountryGateway
 * @uses   \Speaky\Domain\Entity\Country
 */
final class CheckIfCountriesSpeakTheSameLanguageCommandTest extends TestCase
{
    public function test_command_has_correct_definition(): void
    {
        $countryGateway = $this->createMock(CountryGateway::class);
        $command = new CheckIfCountriesSpeakTheSameLanguageCommand($countryGateway);

        $this->assertSame('firstCountry secondCountry', $command->getDefinition());
    }

    public function test_command_outputs_correct_text(): void
    {
        $this->expectOutputString('Spain and England do not speak the same language' . PHP_EOL);

        $countryGateway = $this->createMock(CountryGateway::class);

        $countryGateway
            ->expects($this->exactly(2))
            ->method('findByName')
            ->withConsecutive(['Spain'], ['England'])
            ->willReturnOnConsecutiveCalls(
                new Country('724', 'Spain', 'es'),
                null
            );

        $input = new ConsoleInput(['firstCountry', 'secondCountry'], ['Spain', 'England']);
        $output = new ConsoleOutput();

        $command = new CheckIfCountriesSpeakTheSameLanguageCommand($countryGateway);
        $command->execute($input, $output);
    }
}
