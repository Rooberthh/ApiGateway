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

        public function createTask($data)
        {
            return $this->performRequest('POST', "/api/tasks", $data);
        }

        public function updateTask($data, $task)
        {
            return $this->performRequest('PATCH', "/api/tasks/${task}", $data);
        }

        public function deleteTask($task)
        {
            return $this->performRequest('DELETE', "/api/tasks/{$task}");
        }

        public function getStatuses()
        {
            return $this->performRequest('GET', '/api/statuses');
        }

        public function createStatus($data)
        {
            return $this->performRequest('POST', "/api/statuses", $data);
        }

        public function updateStatus($data, $status)
        {
            return $this->performRequest('PATCH', "/api/statuses/${status}", $data);
        }

        public function deleteStatus($status)
        {
            return $this->performRequest('DELETE', "/api/statuses/{$status}");
        }

    }
