<?php
declare(strict_types=1);

namespace Speaky\Domain\UseCase\ListCountriesWhichSpeakTheSameLanguage;

final class ListCountriesWhichSpeakTheSameLanguageResponse
{
    /**
     * @var string
     */
    private $language;
    /**
     * @var array
     */
    private $countries;

    /**
     * @param string $language
     * @param array $countries
     */
    public function __construct(string $language, array $countries)
    {
        $this->language = $language;
        $this->countries = $countries;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return array
     */
    public function getCountries(): array
    {
        return $this->countries;
    }
}
