<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;

class BookController extends Controller
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
        return $this->successResponse($this->bookService->getBooks());
    }

    /**
     * @param Request $request
     * @return Response|ResponseFactory
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->bookService->createBook($request->all()), Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @return Response|ResponseFactory
     */
    public function destroy($id)
    {
        return $this->successResponse($this->bookService->deleteBook($id));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response|ResponseFactory
     */
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->bookService->updateBook($request->all(), $id));
    }
}
