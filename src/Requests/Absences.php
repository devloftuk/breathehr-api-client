<?php

namespace devloft\Breathe\Requests;

use devloft\Breathe\Breathe;

/**
 * Class Absences
 *
 * @package devloft\Breathe\Requests
 */
class Absences extends Breathe
{
    protected $endpoint = 'absences';

    /**
     * List all absences.
     *
     * @param int $page
     * @param int $results
     * @param $parameters
     *
     * @return array
     */
    public function get($page = 1, $results = 100, $parameters = []): array
    {
        $query_string = http_build_query([
            'page' => $page,
            'per_page' => $results,
        ] + $parameters);

        return $this->execute('get', $this->endpoint, '?'.$query_string)[$this->endpoint];
    }
}
