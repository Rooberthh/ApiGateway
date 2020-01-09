<?php


    namespace App\Http\Controllers;


    use App\Services\TaskService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;

    class StatusesController extends Controller
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
            return $this->successResponse($this->taskService->getStatuses());
        }

        /**
         * @param Request $request
         * @return Response|ResponseFactory
         */
        public function store(Request $request)
        {
            return $this->successResponse($this->taskService->createStatus($request->all()), Response::HTTP_CREATED);
        }

        /**
         * @param Request $request
         * @param $id
         * @return Response|ResponseFactory
         */
        public function update(Request $request, $id)
        {
            return $this->successResponse($this->taskService->updateStatus($request->all(), $id));
        }

        /**
         * @param $id
         * @return Response|ResponseFactory
         */
        public function destroy($id)
        {
            return $this->successResponse($this->taskService->deleteStatus($id));
        }

    }