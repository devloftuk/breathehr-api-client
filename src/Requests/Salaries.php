<?php

namespace devloft\Breathe\Requests;

use devloft\Breathe\Breathe;

/**
 * Class Salaries
 *
 * @package devloft\Breathe\Requests
 */
class Salaries extends Breathe
{
    protected $endpoint = 'salaries';

    /**
     * List all salaries.
     *
     * @param int $page
     * @param int $results
     *
     * @return array
     */
    public function get($page = 1, $results = 100): array
    {
        $parameters = http_build_query([
            'page' => $page,
            'per_page' => $results,
        ]);

        return $this->execute('get', $this->endpoint, '?'.$parameters)[$this->endpoint];
    }
}
