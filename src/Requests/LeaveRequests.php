<?php

namespace devloft\Breathe\Requests;

use devloft\Breathe\Breathe;

/**
 * Class LeaveRequests
 *
 * @package devloft\Breathe\Requests
 */
class LeaveRequests extends Breathe
{
    protected $endpoint = 'leave_requests';

    protected $id;

    /**
     * LeaveRequests constructor.
     *
     * @param $id
     *
     * @throws \devloft\Breathe\Exceptions\TokenException
     */
    public function __construct($id = null)
    {
        parent::__construct();

        if ($id) {
            $this->id = $id[0];
        }
    }

    /**
     * List all leave requests.
     *
     * @param int $page
     * @param int $results
     * @param array $parameters
     *
     * @return array
     */
    public function get($page = 1, $results = 100, $parameters = []): array
    {
        if ($this->id) {
            return $this->execute('get', $this->endpoint, '/'.$this->id)['leave_request'];
        }

        $query_string = http_build_query([
            'page' => $page,
            'per_page' => $results,
        ] + $parameters);

        return $this->execute('get', $this->endpoint, '?'.$query_string)[$this->endpoint];
    }

    /**
     * Show the leave request that is cancelling.
     *
     * @return array
     */
    public function cancelling(): array
    {
        return $this->execute('get', $this->endpoint, '/'.$this->id.'/cancelling')['leave_request'];
    }

    /**
     * @return array
     */
    public function otherLeaveReasons(): array
    {
        return $this->execute('get', $this->endpoint, '/'.$this->id.'/other_leave_reasons')['other_leave_reasons'];
    }
}
