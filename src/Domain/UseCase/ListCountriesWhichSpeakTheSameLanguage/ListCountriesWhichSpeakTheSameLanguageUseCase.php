<?php
declare(strict_types=1);

namespace Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage;

use Speaky\Domain\Entity\Country;
use Speaky\Domain\Gateway\CountryGatewayInterface;

final class ListCountriesWhichSpeakTheSameLanguageUseCase
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
     * @param ListCountriesWhichSpeakTheSameLanguageRequest $request
     * @return ListCountriesWhichSpeakTheSameLanguageResponse
     */
    public function execute(ListCountriesWhichSpeakTheSameLanguageRequest $request): ListCountriesWhichSpeakTheSameLanguageResponse {
        $givenCountry = $this->countryGateway->findByName($request->getCountry());
        $sameLanguageCountries = [];

        foreach ($this->countryGateway->findByLanguage($givenCountry->getLanguage()) as $country) {
            if ($country->getId() != $givenCountry->getId()) {
                $sameLanguageCountries[] = $country->getName();
            }
        }

        return new ListCountriesWhichSpeakTheSameLanguageResponse(
            $givenCountry->getLanguage(),
            $sameLanguageCountries
        );
    }
}
