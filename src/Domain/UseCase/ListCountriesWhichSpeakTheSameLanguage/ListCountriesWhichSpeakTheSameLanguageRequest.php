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
        if (!preg_match('/^[a-z]+$/i', $country)) {
            throw new InvalidArgumentException(sprintf(
                'Invalid country name: %s',
                $country
            ));
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
