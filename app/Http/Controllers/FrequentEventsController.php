<?php

    namespace App\Http\Controllers;

    use App\Services\BookService;
    use App\Services\CalendarService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;

    class FrequentEventsController extends Controller
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
            return $this->successResponse($this->calendarService->getFrequentEvents());
        }

    }
