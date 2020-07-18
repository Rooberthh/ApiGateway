<?php


    namespace App\Http\Controllers\TaskService;


    use App\Services\TaskService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;
    use App\Http\Controllers\Controller;

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

        public function index($board)
        {
            return $this->successResponse($this->taskService->getStatuses($board));
        }

        /**
         * @param $board
         * @param Request $request
         * @return Response|ResponseFactory
         */
        public function store($board, Request $request)
        {
            return $this->successResponse($this->taskService->createStatus($board, $request->all()), Response::HTTP_CREATED);
        }

        /**
         * @param $board
         * @param Request $request
         * @param $id
         * @return Response|ResponseFactory
         */
        public function update($board, $id, Request $request)
        {
            return $this->successResponse($this->taskService->updateStatus($board, $request->all(), $id));
        }

        public function updateOrderAll($board, Request $request)
        {
            return $this->successResponse($this->taskService->updateOrderOfStatuses($board, $request->all()));
        }

        /**
         * @param $board
         * @param $id
         * @return Response|ResponseFactory
         */
        public function destroy($board, $id)
        {
            return $this->successResponse($this->taskService->deleteStatus($board, $id));
        }

    }
