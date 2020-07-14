<?php


    namespace App\Http\Middleware;


    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class WhitelistMiddleware
    {
        /**
         * @param Request $request
         * @param Closure $next
         * @return Response
         */
        public function handle($request, Closure $next)
        {
            $whitelist = config('access.whitelist');

            $ipAddresses = explode(';', $whitelist);

            if (! in_array($request->ip(), $ipAddresses)) {
                return new Response('Unauthorized Access', 403);
            }
            
            return $next($request);
        }
    }
