<?php
declare(strict_types=1);

namespace Speaky\Integration\Dependency;

use Speaky\Infrastructure\Gateway\CountryGateway;

trait CountryGatewayDependency
{
    /**
     * @var CountryGateway
     */
    private $countryGateway;

    /**
     * @before
     */
    public function createCountryGateway(): void
    {
        $this->countryGateway = new CountryGateway(getenv('COUNTRIES_SERVICE_URL'));
    }
}
