<?php

namespace App\Http\Controllers;

use App\Services\ActivityService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    use ApiResponse;

    public $activityService;

    /**
     * Create a new controller instance.
     *
     * @param ActivityService $activityService
     */
    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    /**
     *
     */
    public function index()
    {

    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {

    }
}
