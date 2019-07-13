<?php
declare(strict_types=1);

namespace Speaky\Domain\UseCase\CheckIfCountriesSpeakTheSameLanguage;

final class CheckIfCountriesSpeakTheSameLanguageResponse
{
    /**
     * @var bool
     */
    private $isTheSameLanguage;

    /**
     * @param bool $isTheSameLanguage
     */
    public function __construct(bool $isTheSameLanguage)
    {
        $this->isTheSameLanguage = $isTheSameLanguage;
    }

    /**
     * @return bool
     */
    public function isTheSameLanguage(): bool
    {
        return $this->isTheSameLanguage;
    }
}
