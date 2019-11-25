<?php


    namespace App\Services;


    use App\Traits\ConsumesExternalService;
    use Illuminate\Http\Request;

    class ActivityService
    {
        use ConsumesExternalService;

        public $baseUri;

        public function __construct()
        {
            $this->baseUri = config('services.activities.base_uri');
        }

        public function getActivities()
        {
            return $this->performRequest('GET', '/api/activities');
        }

        public function createActivity($data)
        {
            return $this->performRequest('POST', '/api/activities', $data);
        }

        public function deleteActivity($activity)
        {
            return $this->performRequest('DELETE', "/api/activities/{$activity}");
        }

        public function getTimetables()
        {
            return $this->performRequest('GET', '/api/timetables');
        }

        public function createTimetable($data)
        {
            return $this->performRequest('POST', '/api/timetables', $data);
        }

        public function updateTimetable($timetable)
        {
            return $this->performRequest('PATCH', "/api/timetables/${timetable}");
        }
    }
