<?php

namespace devloft\Breathe\Requests;

use devloft\Breathe\Breathe;

/**
 * Class OtherLeaveReasons
 *
 * @package devloft\Breathe\Requests
 */
class OtherLeaveReasons extends Breathe
{
    protected $endpoint = 'other_leave_reasons';

    /**
     * List all other leave reasons.
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
