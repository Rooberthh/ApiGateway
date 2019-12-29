<?php

    namespace App\Http\Controllers;

    use App\Services\BookService;
    use App\Services\CalendarService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;

    class CalendarController extends Controller
    {
        use ApiResponse;

        public $calendarService;

        /**
         * Create a new controller instance.
         *
         * @param CalendarService $calendarService
         */
        public function __construct(CalendarService $calendarService)
        {
            $this->calendarService = $calendarService;
        }

        /**
         *
         */
        public function index()
        {
            return $this->successResponse($this->calendarService->getEvents());
        }

        public function store()
        {

        }


        /**
         * @param Request $request
         * @param $id
         * @return Response|ResponseFactory
         */
        public function update(Request $request, $id)
        {
            return $this->successResponse($this->calendarService->updateEvent($request->all(), $id));
        }

        public function destroy($id)
        {
            return $this->successResponse($this->calendarService->deleteEvent($id));
        }

    }
