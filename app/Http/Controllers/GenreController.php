<?php

    namespace App\Http\Controllers;

    use App\Services\BookService;
    use App\Traits\ApiResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Laravel\Lumen\Http\ResponseFactory;

    class GenreController extends Controller
    {
        use ApiResponse;

        public $bookService;

        /**
         * Create a new controller instance.
         *
         * @param BookService $bookService
         */
        public function __construct(BookService $bookService)
        {
            $this->bookService = $bookService;
        }

        /**
         *
         */
        public function index()
        {
            return $this->successResponse($this->bookService->getGenres());
        }
    }
