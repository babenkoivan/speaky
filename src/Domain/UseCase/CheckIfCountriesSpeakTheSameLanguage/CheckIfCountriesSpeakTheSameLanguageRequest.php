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
        foreach (func_get_args() as $countryName) {
            if (empty($countryName)) {
                throw new InvalidArgumentException('Invalid country name');
            }
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
