<?php


    namespace App\Services;


    use App\Traits\ConsumesExternalService;

    class TaskService
    {
        use ConsumesExternalService;

        public $baseUri;

        public function __construct()
        {
            $this->baseUri = config('services.task.base_uri');
        }

        public function getTasks()
        {
            return $this->performRequest('GET', '/api/tasks');
        }

    }
