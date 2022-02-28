<?php


namespace App\Http\Controllers;

use OSN\Framework\Core\Controller;
use OSN\Framework\Http\Request;
use OSN\Framework\Log\Logger;

class IPController extends Controller
{
    /**
     * Show a listing of the resource.
     *
     * @return mixed
     */
    public function index(Logger $logger)
    {
        //$logger->critical("Cannot find config files: Permission Denied");
        return ['success' => true];
    }

    /**
     * View a specific resource.
     *
     * @param string $id
     * @return mixed
     */
    public function view($id)
    {
        return [
            'id' => $id,
            'success' => true
        ];
    }

    /**
     * Store a newly created resource from the user input.
     *
     * @param Request $request
     * @param string $id
     * @return mixed
     */
    public function store(Request $request, $id)
    {

    }

    /**
     * Update a specific resource from the user input.
     *
     * @param Request $request
     * @param string $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Delete a specific resource.
     *
     * @param string $id
     * @return mixed
     */
    public function delete($id)
    {

    }
}
