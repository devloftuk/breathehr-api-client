<?php

namespace devloft\Breathe\Requests;

use devloft\Breathe\Breathe;

/**
 * Class Benefits
 *
 * @package devloft\Breathe\Requests
 */
class Benefits extends Breathe
{
    protected $endpoint = 'benefits';

    /**
     * List all benefits.
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

        return $this->execute('get', $this->endpoint, '?'.$parameters)['benefits'];
    }
}
