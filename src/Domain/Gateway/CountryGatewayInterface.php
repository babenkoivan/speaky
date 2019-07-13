<?php
declare(strict_types=1);

namespace Speaky\Domain\Gateway;

use Speaky\Domain\Entity\Country;

interface CountryGatewayInterface
{
    /**
     * @param string $name
     * @return Country|null
     */
    public function findByName(string $name): ?Country;

    /**
     * @param string $language
     * @return Country[]
     */
    public function findByLanguage(string $language): array;
}
