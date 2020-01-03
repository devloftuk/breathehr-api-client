<?php

namespace devloft\Breathe;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use devloft\Breathe\Exceptions\TokenException;
use devloft\Breathe\Requests\Employees;
use devloft\Breathe\Requests\Benefits;
use devloft\Breathe\Requests\Bonuses;
use devloft\Breathe\Requests\ChangeRequests;
use devloft\Breathe\Requests\Departments;
use devloft\Breathe\Requests\Divisions;
use devloft\Breathe\Requests\WorkingPatterns;
use devloft\Breathe\Requests\StatutoryHolidayCountries;
use devloft\Breathe\Requests\Sicknesses;

/**
 * @method Employees employees()
 * @method Benefits benefits()
 * @method Bonuses bonuses()
 * @method ChangeRequests changeRequests()
 * @method Departments departments()
 * @method Divisions divisions()
 * @method WorkingPatterns workingPatterns()
 * @method StatutoryHolidayCountries statutoryHolidayCountries()
 * @method Sicknesses sickness()
 */
class Breathe
{
    protected $url;

    protected $api_token;

    protected $client;

    /**
     * Breathe constructor.
     *
     * @throws \devloft\Breathe\Exceptions\TokenException
     */
    public function __construct()
    {
        $this->url = Config::get('breathe.host');
        $this->api_token = $this->getApiToken();

        $this->client = new Client();
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $class = '\devloft\Breathe\Requests\\' . ucfirst($name);

        if (class_exists($class)) {
            return new $class($arguments);
        }

        throw new ClassNotFoundException($name);
    }

    /**
     * Get the API token.
     *
     * @return mixed
     * @throws \devloft\Breathe\Exceptions\TokenException
     */
    protected function getApiToken()
    {
        $api_token = Config::get('breathe.auth.token');

        if (! $api_token) {
            throw new TokenException();
        }

        return $api_token;
    }

    /**
     * @param $method
     * @param $endpoint
     * @param $parameters
     *
     * @return array
     */
    protected function execute($method, $endpoint, $parameters = null): array
    {
        $request = $this->client->request($method, $this->url.$endpoint.$parameters, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
                'X-API-KEY' => $this->api_token,
            ],
        ]);

        if ($request->getStatusCode() === 200) {
            return json_decode($request->getBody()->getContents(), true);
        }
    }
}
