<?php

namespace devloft\Breathe\Requests;

use devloft\Breathe\Breathe;

/**
 * Class ChangeRequests
 *
 * @package devloft\Breathe\Requests
 */
class ChangeRequests extends Breathe
{
    protected $endpoint = 'change_requests';

    /**
     * List all bonuses.
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
