<?php

    namespace App\Http\Controllers;

    use App\Services\BookService;
    use App\Services\TaskService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;

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
        public function store(Request $request)
        {
            return $this->successResponse($this->taskService->createTask($request->all()), Response::HTTP_CREATED);
        }

    }
