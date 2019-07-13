<?php
declare(strict_types=1);

namespace Speaky\Infrastructure\Gateway;

use Speaky\Domain\Entity\Country;
use Speaky\Domain\Gateway\CountryGatewayInterface;

class CountryGateway implements CountryGatewayInterface
{
    /**
     * @var string
     */
    private $serviceUrl;

    /**
     * @param string $serviceUrl
     */
    public function __construct(string $serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }

    /**
     * @inheritdoc
     */
    public function findByName(string $name): ?Country
    {
        $countries = $this->sendRequest('/name/' . urldecode($name));
        return count($countries) > 0 ? reset($countries) : null;
    }

    /**
     * @inheritdoc
     */
    public function findByLanguage(string $languageCode): array
    {
        return $this->sendRequest('/lang/' . urldecode($languageCode));
    }

    /**
     * @param string $endpoint
     * @return Country[]
     */
    private function sendRequest(string $endpoint): array
    {
        $resource = curl_init($this->serviceUrl . $endpoint);
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($resource), true);
        curl_close($resource);

        if (isset($response['status'])) {
            return [];
        }

        return array_map(function (array $country) {
            return new Country(
                $country['numericCode'],
                $country['name'],
                $country['languages'][0]['iso639_1']
            );
        }, $response);
    }
}
