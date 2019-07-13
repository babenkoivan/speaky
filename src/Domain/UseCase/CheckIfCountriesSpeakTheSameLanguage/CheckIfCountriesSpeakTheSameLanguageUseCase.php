<?php
declare(strict_types=1);

namespace Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage;

use Speaky\Domain\Gateway\CountryGatewayInterface;

final class CheckIfCountriesSpeakTheSameLanguageUseCase
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
     * @param CheckIfCountriesSpeakTheSameLanguageRequest $request
     * @return CheckIfCountriesSpeakTheSameLanguageResponse
     */
    public function execute(CheckIfCountriesSpeakTheSameLanguageRequest $request): CheckIfCountriesSpeakTheSameLanguageResponse
    {
        $firstCountry = $this->countryGateway->findByName($request->getFirstCountry());
        $secondCountry = $this->countryGateway->findByName($request->getSecondCountry());

        return new CheckIfCountriesSpeakTheSameLanguageResponse(
            isset($firstCountry) && isset($secondCountry) &&
            $firstCountry->getLanguage() == $secondCountry->getLanguage()
        );
    }
}
