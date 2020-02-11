<?php


    namespace App\Http\Controllers\TaskService;


    use App\Services\TaskService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;
    use App\Http\Controllers\Controller;

    class TaskObjectivesController extends Controller
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

        public function index($task)
        {
            return $this->successResponse($this->taskService->getObjectives($task));
        }

        /**
         * @param $task
         * @param Request $request
         * @return Response|ResponseFactory
         */
        public function store($task, Request $request)
        {
            return $this->successResponse($this->taskService->createObjective($request->all(), $task), Response::HTTP_CREATED);
        }

        /**
         * @param $task
         * @param $objective
         * @param Request $request
         * @return Response|ResponseFactory
         */
        public function update($task, $objective, Request $request)
        {
            return $this->successResponse($this->taskService->updateObjective($request->all(), $task, $objective));
        }

        /**
         * @param $task
         * @param $objective
         * @return Response|ResponseFactory
         */
        public function destroy($task, $objective)
        {
            return $this->successResponse($this->taskService->deleteObjective($task, $objective));
        }

    }
