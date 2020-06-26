<?php

    use App\Route;
    use Laravel\Lumen\Testing\DatabaseMigrations;
    use Laravel\Lumen\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function it_can_add_routes_test()
    {
        $router = app()->make('router');
        $routes = new Route();

        $getRoutes = array_filter($routes->routes, "filterGet");
        $postRoutes = array_filter($routes->routes, "filterPost");
        $patchRoutes = array_filter($routes->routes, "filterPatch");
        $deleteRoutes = array_filter($routes->routes, "filterDelete");

        foreach($getRoutes as $route) {
            $router->get($route['uri'], $route['map']);
        }

        foreach($postRoutes as $route) {
            $router->post($route['uri'], $route['map']);
        }

        foreach($patchRoutes as $route) {
            $router->patch($route['uri'], $route['map']);
        }

        foreach($deleteRoutes as $route) {
            $router->delete($route['uri'], $route['map']);
        }
        dd($routes);

        $this->get($getRoutes[0]['uri'])->assertResponseStatus(200);
    }
}

function filterGet ($route) {
    return strtoupper($route['method']) == "GET";
}
function filterPost ($route) {
    return strtoupper($route['method']) == "POST";
}
function filterPatch ($route) {
    return strtoupper($route['method']) == "PATCH";
}
function filterDelete ($route) {
    return strtoupper($route['method']) == "DELETE";
}
