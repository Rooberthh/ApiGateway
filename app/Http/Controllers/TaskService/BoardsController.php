<?php


    namespace App\Http\Controllers\TaskService;


    use App\Services\TaskService;
    use App\Traits\ApiResponse;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;
    use App\Http\Controllers\Controller;

    class BoardsController extends Controller
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

        public function index(Request $request)
        {
            $id = ($request->user()->id) ? $request->user()->id : $request->get('user_id');

            return  $this->taskService->getBoards($id);
        }

        public function show($id)
        {
            return $this->successResponse($this->taskService->getBoard($id));
        }

        /**
         * @param Request $request
         * @return Response|ResponseFactory
         */
        public function store(Request $request)
        {
            User::find($request->user_id);

            $request->merge([
                'user_id' => $request->user()->id
            ]);
            return $this->successResponse($this->taskService->createBoard($request->all()), Response::HTTP_CREATED);
        }

        /**
         * @param Request $request
         * @param $id
         * @return Response|ResponseFactory
         */
        public function update(Request $request, $id)
        {
            $request->merge([
                'user_id' => $request->user()->id
            ]);
            return $this->successResponse($this->taskService->updateBoard($request->all(), $id));
        }

        /**
         * @param Request $request
         * @param $id
         * @return Response|ResponseFactory
         */
        public function destroy(Request $request, $id)
        {
            $request->merge([
                'user_id' => $request->user()->id
            ]);

            return $this->successResponse($this->taskService->deleteBoard($id));
        }

    }
