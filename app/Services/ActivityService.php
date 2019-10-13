<?php


    namespace App\Services;


    use App\Traits\ConsumesExternalService;

    class ActivityService
    {
        use ConsumesExternalService;

        public $baseUri;

        public function __construct()
        {
            $this->baseUri = config('services.activities.base_uri');
        }
    }
