<?php


    namespace App\Http\Controllers\TaskService;


    use App\Services\TaskService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
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
         * @param $board
         * @param $status
         * @param $task
         * @param Request $request
         */
        public function store($task, Request $request)
        {
            return $this->successResponse($this->taskService->createObjective($task, $request->all()), Response::HTTP_CREATED);
        }

        /**
         * @param $board
         * @param $status
         * @param $task
         * @param $objective
         * @param Request $request
         * @return Response|\Laravel\Lumen\Http\ResponseFactory
         */
        public function update(Request $request, $task, $objective)
        {
            return $this->successResponse($this->taskService->updateObjective($task, $objective, $request->all()));
        }

        /**
         * @param $board
         * @param $status
         * @param $task
         * @param $objective
         */
        public function destroy($task, $objective)
        {
            return $this->successResponse($this->taskService->deleteObjective($task, $objective));
        }

    }
