<?php

    namespace App\Http\Controllers\TaskService;

    use App\Services\BookService;
    use App\Services\TaskService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;
    use App\Http\Controllers\Controller;

    class TasksController extends Controller
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
            return $this->successResponse($this->taskService->getTasks());
        }

        /**
         * @param Request $request
         * @return Response|ResponseFactory
         */
        public function store($status, Request $request)
        {
            return $this->successResponse($this->taskService->createTask($status, $request->all()), Response::HTTP_CREATED);
        }

        /**
         * @param Request $request
         * @param $id
         * @return Response|ResponseFactory
         */
        public function update($status, Request $request, $task)
        {
            return $this->successResponse($this->taskService->updateTask($status, $task, $request->all()));
        }

        public function updateOrderAll($status, Request $request)
        {
            return $this->successResponse($this->taskService->updateOrderOfTasks($status, $request->all()));
        }

        /**
         * @param $id
         * @return Response|ResponseFactory
         */
        public function destroy($status, $id)
        {
            return $this->successResponse($this->taskService->deleteTask($status, $id));
        }

    }
