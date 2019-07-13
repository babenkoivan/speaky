<?php
declare(strict_types=1);

namespace Speaky\Application\Command;

use Speaky\Application\Input\InputInterface;
use Speaky\Application\Output\OutputInterface;
use Speaky\Domain\Gateway\CountryGatewayInterface;
use Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageRequest;
use Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage\ListCountriesWhichSpeakTheSameLanguageUseCase;

final class ListCountriesWhichSpeakTheSameLanguageCommand implements CommandInterface
{
    /**
     * @var ListCountriesWhichSpeakTheSameLanguageUseCase
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
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $country = $input->get('country');

        $request = new ListCountriesWhichSpeakTheSameLanguageRequest($country);
        $useCase = new ListCountriesWhichSpeakTheSameLanguageUseCase($this->countryGateway);
        $response = $useCase->execute($request);

        $output->writeln(sprintf(
            'Country language code: %s',
            $response->getLanguage()
        ));

        if (count($response->getCountries()) > 0) {
            $output->writeln(sprintf(
                '%s speaks same language with these countries: %s',
                $country,
                implode(', ', $response->getCountries())
            ));
        } else {
            $output->writeln(sprintf(
                '%s is the only country, which speaks %s',
                $country,
                $response->getLanguage()
            ));
        }
    }
}
