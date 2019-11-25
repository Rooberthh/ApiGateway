<?php

    namespace App\Http\Controllers;
    use App\Services\ActivityService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;


    class ActivityController extends Controller
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
            return $this->successResponse($this->activityService->getActivities());
        }

        /**
         * @param Request $request
         * @return Response|ResponseFactory
         */
        public function store(Request $request)
        {
            return $this->successResponse($this->activityService->createActivity($request->all(), Response::HTTP_CREATED));
        }

        /**
         * @param $id
         * @return Response|ResponseFactory
         */
        public function destroy($id)
        {
            return $this->successResponse($this->activityService->deleteActivity($id));
        }
    }
