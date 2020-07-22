<?php

    namespace App\Http\Controllers;

    use App\User;
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Hash;

    class AuthController extends Controller
    {
        public function login(Request $request)
        {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

            $proxy = Request::create(
                config('services.passport.login_endpoint'),
                'post',
                [
                    'username' => $request->get('email'),
                    'password' => $request->get('password'),
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'scope' => '*',
                ]
            );

            $result = App::dispatch($proxy)->getContent();

            $token = json_decode($result, true)['access_token'];

            $user = User::where('email', $request->get('email'))->first();

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return $response;
        }

        public function logout(Request $request)
        {
            $request->user()->tokens->each(function($token, $key){
                $token->delete();
            });

            return response()->json('Logged out successfully', 200);
        }
    }
