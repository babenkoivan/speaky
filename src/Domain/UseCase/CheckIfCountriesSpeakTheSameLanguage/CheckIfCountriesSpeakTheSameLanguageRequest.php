<?php
declare(strict_types=1);

namespace Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage;

use InvalidArgumentException;

final class CheckIfCountriesSpeakTheSameLanguageRequest
{
    /**
     * @var string
     */
    private $firstCountry;
    /**
     * @var string
     */
    private $secondCountry;

    /**
     * @param string $firstCountry
     * @param string $secondCountry
     */
    public function __construct(string $firstCountry, string $secondCountry)
    {
        $invalidCountryNames = [];

        foreach (func_get_args() as $countryName) {
            if (!preg_match('/^[a-z\s\(\)]+$/i', $countryName)) {
                $invalidCountryNames[] = $countryName;
            }
        }

        if (count($invalidCountryNames) > 0) {
            throw new InvalidArgumentException(sprintf(
                'Invalid country names: %s',
                implode(', ', $invalidCountryNames)
            ));
        }

        $this->firstCountry = $firstCountry;
        $this->secondCountry = $secondCountry;
    }

    /**
     * @return string
     */
    public function getFirstCountry(): string
    {
        return $this->firstCountry;
    }

    /**
     * @return string
     */
    public function getSecondCountry(): string
    {
        return $this->secondCountry;
    }
}
