<?php


    namespace App\Http\Controllers\TaskService;


    use App\Http\Controllers\Controller;
    use App\Services\TaskService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;

    class FavoriteStatusesController extends Controller
    {
        use ApiResponse;

        public $taskService;

        /**
         * Create a new controller instance.
         *
         * @param TaskService $service
         */
        public function __construct(TaskService $service)
        {
            $this->taskService = $service;
        }

        public function index()
        {
            return $this->successResponse($this->taskService->getFavoriteStatuses());
        }

        /**
         * @param $status
         * @param Request $request
         * @return Response|ResponseFactory
         */
        public function store($status, Request $request)
        {
            return $this->successResponse($this->taskService->addFavoriteStatus($status), Response::HTTP_CREATED);
        }

        /**
         * @param $status
         * @return Response|ResponseFactory
         */
        public function destroy($status)
        {
            return $this->successResponse($this->taskService->deleteFavoriteStatus($status));
        }
    }