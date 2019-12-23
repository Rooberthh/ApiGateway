<?php


    namespace App\Services;


    use App\Traits\ConsumesExternalService;

    class CalendarService
    {
        use ConsumesExternalService;

        public $baseUri;

        public function __construct()
        {
            $this->baseUri = config('services.calendar.base_uri');
        }

        /**
         *
         */
        public function getEvents()
        {
            return $this->performRequest('GET', '/api/events');
        }

    }
