<?php


    namespace App\Services;


    use App\Traits\ConsumesExternalService;

    class TaskService
    {
        use ConsumesExternalService;

        public $baseUri;

        public $secret;

        public function __construct()
        {
            $this->baseUri = config('services.task.base_uri');
            $this->secret = config('services.task.secret');
        }

        public function getBoards($user)
        {
            $params = [
                'user_id' => $user
            ];
            return $this->performRequest('GET', '/api/boards', $params);
        }

        public function getBoard($id)
        {
            return $this->performRequest('GET', "/api/boards/${id}");
        }

        public function createBoard($data)
        {
            return $this->performRequest('POST', "/api/boards", $data);
        }

        public function updateBoard($data, $board)
        {
            return $this->performRequest('PATCH', "/api/boards/${board}", $data);
        }

        public function deleteBoard($board)
        {
            return $this->performRequest('DELETE', "/api/boards/${board}");
        }

        public function getStatuses($board)
        {
            return $this->performRequest('GET', "/api/boards/${board}/statuses");
        }

        public function getFavoriteStatuses()
        {
            return $this->performRequest('GET', '/api/statuses/favorites');
        }

        public function addFavoriteStatus($status)
        {
            return $this->performRequest('POST', "/api/statuses/${status}/favorite");
        }

        public function deleteFavoriteStatus($status)
        {
            return $this->performRequest('DELETE', "/api/statuses/${status}/favorite");
        }

        public function createStatus($board, $data)
        {
            return $this->performRequest('POST', "/api/boards/${board}/statuses", $data);
        }

        public function updateStatus($board, $data, $status)
        {
            return $this->performRequest('PATCH', "/api/boards/${board}/statuses/${status}", $data);
        }

        public function updateOrderOfStatuses($board, $data)
        {
            return $this->performRequest('PATCH', "/api/boards/${board}/statuses/", $data);
        }

        public function deleteStatus($board, $status)
        {
            return $this->performRequest('DELETE', "/api/boards/${board}/statuses/${status}");
        }

        public function getTasks()
        {
            return $this->performRequest('GET', '/api/tasks');
        }

        public function createTask($status, $data)
        {
            return $this->performRequest('POST', "/api/statuses/${status}/tasks", $data);
        }

        public function updateTask($status, $task, $data)
        {
            return $this->performRequest('PATCH', "/api/statuses/${status}/tasks/${task}", $data);
        }

        public function updateOrderOfTasks($status, $data)
        {
            return $this->performRequest('PATCH', "/api/statuses/${status}/tasks/", $data);
        }

        public function deleteTask($status, $task)
        {
            return $this->performRequest('DELETE', "/api/statuses/${status}/tasks/${task}");
        }

        public function getObjectives($task)
        {
            return $this->performRequest('GET', "/api/tasks/${task}/objectives");
        }

        public function createObjective($task, $data)
        {
            return $this->performRequest('POST', "/api/tasks/${task}/objectives", $data);
        }

        public function updateObjective($task, $id, $data)
        {
            return $this->performRequest('PATCH', "/api/tasks/${task}/objectives/${id}", $data);
        }

        public function deleteObjective($task, $id)
        {
            return $this->performRequest('DELETE', "/api/tasks/${task}/objectives/${id}");
        }

    }
