<?php
declare(strict_types=1);

namespace Speaky\Application\Command;

use Speaky\Application\Input\InputInterface;
use Speaky\Application\Output\OutputInterface;
use Speaky\Domain\Gateway\CountryGatewayInterface;
use Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageRequest;
use Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage\CheckIfCountriesSpeakTheSameLanguageUseCase;

final class CheckIfCountriesSpeakTheSameLanguageCommand implements CommandInterface
{
    /**
     * @var CountryGatewayInterface
     */
    private $countryGateway;

    /**
     * @param CountryGatewayInterface $countryGateway
     */
    public function __construct(CountryGatewayInterface $countryGateway)
    {
        $this->countryGateway = $countryGateway;
    }

    /**
     * @inheritdoc
     */
    public function getDefinition(): string
    {
        return 'firstCountry secondCountry';
    }

    /**
     * @inheritdoc
     */
    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $firstCountry = $input->get('firstCountry');
        $secondCountry = $input->get('secondCountry');

        $request = new CheckIfCountriesSpeakTheSameLanguageRequest($firstCountry, $secondCountry);
        $useCase = new CheckIfCountriesSpeakTheSameLanguageUseCase($this->countryGateway);
        $response = $useCase->execute($request);

        $output->writeln(sprintf(
            '%s and %s %s the same language',
            $firstCountry,
            $secondCountry,
            $response->isTheSameLanguage() ? 'speak' : 'do not speak'
        ));
    }
}
