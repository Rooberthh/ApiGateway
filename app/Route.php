<?php


    namespace App;


    use Illuminate\Database\Eloquent\Model;

    class Route
    {
        public $routes = [];

        public function __construct()
        {
            $this->generateRoutes();
        }

        private function generateRoutes()
        {
            $routes = property_exists(app(), 'router')? app()->router->getRoutes() : app()->getRoutes();

            foreach ($routes as $route) {
                array_push($this->routes, [
                    'method' => $route['method'],
                    'uri' => $route['uri'],
                    'name' => $this->getRouteName($route),
                    'action' => $this->getAction($route['action']),
                    'middleware' => $this->getRouteMiddleware($route),
                    'map' => $this->getRouteMapTo($route)
                ]);
            }
        }

        /**
         * Get the route name
         * @param $route
         * @return null
         */
        private function getRouteName($route)
        {
            return (isset($route['action']['as'])) ? $route['action']['as'] : '';
        }

        /**
         * @param array $action
         * @return string
         */
        protected function getAction(array $action)
        {
            if (!empty($action['uses'])) {
                $data = $action['uses'];
                if (($pos = strpos($data, "@")) !== false) {
                    return substr($data, $pos + 1);
                } else {
                    return "METHOD NOT FOUND";
                }
            } else {
                return 'Closure';
            }
        }

        /**
         *  Get where the route map to
         * @param $route
         * @return string
         */
        private function getRouteMapTo($route)
        {
            return (!$this->isClosureRoute($route)) ? $route['action']['uses'] : '';
        }

        /**
         * Get route middleware
         * @param $route
         * @return string
         */
        private function getRouteMiddleware($route)
        {
            if (isset($route['action']['middleware'])) {
                return join(',', $route['action']['middleware']);
            }
            return '';
        }
        /**
         *  Check if the route is closure or controller route
         * @param $route
         * @return bool
         */
        private function isClosureRoute($route)
        {
            return !isset($route['action']['uses']);
        }

    }
