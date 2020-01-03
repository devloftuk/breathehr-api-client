<?php

namespace devloft\Breathe\Requests;

use devloft\Breathe\Breathe;

/**
 * Class EmployeeExpenseClaims
 *
 * @package devloft\Breathe\Requests
 */
class EmployeeExpenseClaims extends Breathe
{
    protected $endpoint = 'employee_expense_claims';

    protected $id;

    /**
     * Employee Expense Claims constructor.
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
     * List all employee expense claims.
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

        if ($this->id) {
            return $this->execute('get', $this->endpoint, '/'.$this->id)[$this->endpoint];
        }

        return $this->execute('get', $this->endpoint, '?'.$query_string)[$this->endpoint];
    }
}
