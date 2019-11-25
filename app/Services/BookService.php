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
            return $this->performFileRequest('POST', '/api/books', $data);
        }

        public function updateBook($data, $book)
        {
            return $this->performRequest('PATCH', "/api/books/${book}", $data);
        }

        public function deleteBook($book)
        {
            return $this->performRequest('DELETE', "/api/books/{$book}");
        }

        public function getGenres()
        {
            return $this->performRequest('GET', "/api/genres");
        }
    }
