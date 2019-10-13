<?php

    namespace App\Http\Controllers;
    use App\Services\ActivityService;
    use Illuminate\Http\Request;


    class ActivityController extends Controller
    {
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

        public function index()
        {

        }

        public function store(Request $request, $category, $timetable)
        {

        }

        public function destroy($id)
        {

        }

        public function update(Request $request, $id)
        {

        }
    }
