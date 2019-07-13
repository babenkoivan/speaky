<?php
declare(strict_types=1);

namespace Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage;

use InvalidArgumentException;

final class ListCountriesWhichSpeakTheSameLanguageRequest
{
    /**
     * @var string
     */
    private $country;

    /**
     * @param string $country
     */
    public function __construct(string $country)
    {
        if (empty($country)) {
            throw new InvalidArgumentException('Invalid country name');
        }

        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}
