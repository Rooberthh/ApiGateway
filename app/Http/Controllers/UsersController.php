<?php

    namespace App\Http\Controllers;

    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\Rule;

    class UsersController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            //
        }

        public function index()
        {
            return User::all();
        }

        public function update(Request $request, $user)
        {
            $this->validate($request, [
                'email' => 'email|unique:users,email,' . $user,
                'password' => 'min:8|confirmed',
            ]);

            $User = User::find($user);

            $User->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => ($request->has('password')) ? Hash::make($request->get('password')) : $User->password
            ]);

            return response($User, 200);
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]);

            $User = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            return response($User, 200);
        }

        public function show($user)
        {
            return User::find($user);
        }

        public function destroy($user)
        {
            $User = User::find($user);
            $User->delete();

            return response('User have been deleted', 200);
        }

        public function me(Request $request)
        {
            return $request->user();
        }
    }
