<?php


    namespace App\Services;


    use App\Traits\ConsumesExternalService;

    class CalendarService
    {
        use ConsumesExternalService;

        public $baseUri;
        public $secret;

        public function __construct()
        {
            $this->baseUri = config('services.calendar.base_uri');
            $this->secret = config('services.calendar.secret');
        }

        /**
         *
         */
        public function getEvents()
        {
            return $this->performRequest('GET', '/api/events');
        }

        public function addEvent($data)
        {
            return $this->performRequest('POST', "/api/events", $data);
        }

        public function updateEvent($data, $event)
        {
            return $this->performRequest('PATCH', "/api/events/${event}", $data);
        }

        public function deleteEvent($event)
        {
            return $this->performRequest('DELETE', "/api/events/{$event}");
        }

        public function getFrequentEvents()
        {
            return $this->performRequest('GET', '/api/events/frequent');
        }

        public function getTopWeeklyEvents()
        {
            return $this->performRequest('GET', '/api/events/top');
        }

    }
