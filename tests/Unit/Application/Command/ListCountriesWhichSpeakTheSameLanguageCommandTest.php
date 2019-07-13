<?php
declare(strict_types=1);

namespace Speaky\Unit\Application\Command;

use PHPUnit\Framework\TestCase;
use Speaky\Application\Command\ListCountriesWhichSpeakTheSameLanguageCommand;
use Speaky\Application\Input\ConsoleInput;
use Speaky\Application\Output\ConsoleOutput;
use Speaky\Domain\Entity\Country;
use Speaky\Infrastructure\Gateway\CountryGateway;

/**
 * @covers \Speaky\Application\Command\ListCountriesWhichSpeakTheSameLanguageCommand
 * @uses   \Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageRequest
 * @uses   \Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageResponse
 * @uses   \Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageUseCase
 * @uses   \Speaky\Application\Input\ConsoleInput
 * @uses   \Speaky\Application\Output\ConsoleOutput
 * @uses   \Speaky\Infrastructure\Gateway\CountryGateway
 * @uses   \Speaky\Domain\Entity\Country
 */
final class ListCountriesWhichSpeakTheSameLanguageCommandTest extends TestCase
{
    public function test_command_has_correct_definition(): void
    {
        $countryGateway = $this->createMock(CountryGateway::class);
        $command = new ListCountriesWhichSpeakTheSameLanguageCommand($countryGateway);

        $this->assertSame('country', $command->getDefinition());
    }

    public function test_command_outputs_correct_text(): void
    {
        $this->expectOutputString(
            'Country language code: ro' . PHP_EOL .
            'Romania speaks same language with these countries: Moldova (Republic of)' . PHP_EOL
        );

        $countryGateway = $this->createMock(CountryGateway::class);

        $countryGateway
            ->expects($this->once())
            ->method('findByName')
            ->with('Romania')
            ->willReturn(new Country('642', 'Romania', 'ro'));

        $countryGateway
            ->expects($this->once())
            ->method('findByLanguage')
            ->with('ro')
            ->willReturn([
                new Country('498', 'Moldova (Republic of)', 'ro'),
                new Country('642', 'Romania', 'ro'),
            ]);

        $input = new ConsoleInput(['country'], ['Romania']);
        $output = new ConsoleOutput();

        $command = new ListCountriesWhichSpeakTheSameLanguageCommand($countryGateway);
        $command->execute($input, $output);
    }
}
