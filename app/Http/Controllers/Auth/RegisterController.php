<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Type;
use App\Models\Sex;
use App\Models\Prefix;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $prefixes = Prefix::all();
        $types = Type::all();
        $sexes = Sex::all();
        view()->share(compact('prefixes', 'types', 'sexes'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'prefix_id' => ['required', 'string', 'max:50', 'exists:prefixes,id'],
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type_id' => ['required', 'string', 'max:10', 'exists:types,id'],
            'sex_id' => ['required', 'string', 'max:10', 'exists:sexes,id'],
            // 'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

            return User::create([
                'prefix_id' => $data['prefix_id'],
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'type_id' => $data['type_id'],
                'sex_id' => $data['sex_id'],
                // 'image' => isset($data['image']) ? $data['image']->store('images', 'public') : null,
            ]);
    }
}
