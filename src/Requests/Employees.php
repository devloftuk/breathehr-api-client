<?php

namespace devloft\Breathe\Requests;

use devloft\Breathe\Breathe;

/**
 * Class Employees
 *
 * @package devloft\Breathe\Requests
 */
class Employees extends Breathe
{
    protected $id;

    protected $endpoint = 'employees';

    /**
     * Employees constructor.
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
     * Get the details for a single employee if ID is passed, else
     * return all employees.
     *
     * @param int $page
     * @param int $results
     * @param null $type
     *
     * @return array
     */
    public function get($page = 1, $results = 100, $type = null): array
    {
        // A user ID was passed, so we are only looking for a single employee.
        if ($this->id) {
            return $this->execute('get', $this->endpoint, '/'.$this->id)['employees'][0];
        }

        // No ID was passed so return all employees.
        $parameters = http_build_query([
            'page' => $page,
            'per_page' => $results,
            'filter' => $type,
        ]);

        return $this->execute('get', $this->endpoint, '?'.$parameters)['employees'];
    }

    /**
     * Get all absences for a single employee.
     *
     * @param bool $exclude_cancelled
     * @param int $page
     * @param int $results
     *
     * @return array
     */
    public function absences($exclude_cancelled = false, $page = 1, $results = 100): array
    {
        $parameters = http_build_query([
            'exclude_cancelled_absences' => $exclude_cancelled,
            'page' => $page,
            'per_page' => $results,
        ]);

        return $this->execute('get', $this->endpoint, '/'.$this->id.'/absences?'.$parameters)['absences'];
    }

    /**
     * List all the benefits for a single employee.
     *
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
     * List all the bonuses for a single employee
     *
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
     * List all the change requests for a single employee.
     *
     * @param int $page
     * @param int $results
     *
     * @return array
     */
    public function changeRequests($page = 1, $results = 100): array
    {
        $parameters = http_build_query([
            'page' => $page,
            'per_page' => $results,
        ]);

        return $this->execute('get', $this->endpoint, '/'.$this->id.'/change_requests?'.$parameters)['change_requests'];
    }

    /**
     * List all the leave requests for a single employee.
     *
     * @param bool $exclude_cancelled
     * @param int $page
     * @param int $results
     *
     * @return array
     */
    public function leaveRequests($exclude_cancelled = true, $page = 1, $results = 100): array
    {
        $parameters = http_build_query([
            'exclude_cancelled_requests' => $exclude_cancelled,
            'page' => $page,
            'per_page' => $results,
        ]);

        return $this->execute('get', $this->endpoint, '/'.$this->id.'/leave_requests?'.$parameters)['leave_requests'];
    }

    /**
     * Return salary history for a single employee.
     *
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
