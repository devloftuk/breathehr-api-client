<?php

namespace devloft\Breathe\Requests;

use devloft\Breathe\Breathe;

/**
 * Class Departments
 *
 * @package devloft\Breathe\Requests
 */
class Departments extends Breathe
{
    protected $endpoint = 'departments';

    protected $id;

    /**
     * Departments constructor.
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
     * List all departments..
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

    /**
     * List all absences for a given department.
     *
     * @param bool $exclude_cancelled
     * @param int $page
     * @param int $results
     *
     * @return array
     */
    public function absences($exclude_cancelled = true, $page = 1, $results = 100): array
    {
        $parameters = http_build_query([
            'exclude_cancelled_absences' => $exclude_cancelled,
            'page' => $page,
            'per_page' => $results,
        ]);

        return $this->execute('get', $this->endpoint, '/'.$this->id.'/absences?'.$parameters)['absences'];
    }

    /**
     * @param int $page
     * @param int $results
     *
     * @return array
     */
    public function benefits($page = 1, $results = 100): array
    {
        $parameters = http_build_query([
            'page' => $page,
            'per_page' => $results,
        ]);

        return $this->execute('get', $this->endpoint, '/'.$this->id.'/benefits?'.$parameters)['benefits'];
    }

    /**
     * @param int $page
     * @param int $results
     *
     * @return array
     */
    public function bonuses($page = 1, $results = 100): array
    {
        $parameters = http_build_query([
            'page' => $page,
            'per_page' => $results,
        ]);

        return $this->execute('get', $this->endpoint, '/'.$this->id.'/bonuses?'.$parameters)['bonuses'];
    }

    /**
     * @param bool $exclude_cancelled
     * @param int $page
     * @param int $results
     *
     * @return array
     */
    public function leaveRequests($exclude_cancelled = true, $page = 1, $results = 100): array
    {
        $parameters = http_build_query([
            'exclude_cancelled_absences' => $exclude_cancelled,
            'page' => $page,
            'per_page' => $results,
        ]);

        return $this->execute('get', $this->endpoint, '/'.$this->id.'/leave_requests?'.$parameters)['leave_requests'];
    }

    /**
     * @param int $page
     * @param int $results
     *
     * @return array
     */
    public function salaries($page = 1, $results = 100): array
    {
        $parameters = http_build_query([
            'page' => $page,
            'per_page' => $results,
        ]);

        return $this->execute('get', $this->endpoint, '/'.$this->id.'/salaries?'.$parameters)['salaries'];
    }
}
