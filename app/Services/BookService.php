<?php


    namespace App\Services;


    use App\Traits\ConsumesExternalService;

    class BookService
    {
        use ConsumesExternalService;

        public $baseUri;

        public function __construct()
        {
            $this->baseUri = config('services.books.base_uri');
        }

        /**
         *
         */
        public function getBooks()
        {
            return $this->performRequest('GET', '/api/books');
        }

        public function createBook($data)
        {
            return $this->performRequest('POST', '/api/books', $data);
        }

        public function deleteBook($book)
        {
            return $this->performRequest('DELETE', "/api/books/{$book}");
        }
    }
