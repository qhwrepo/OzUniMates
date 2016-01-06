<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Student;
use App\Consultant;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'username' => 'required|max:255|unique:students',
            'email' => 'required|email|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Student::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'wechat' => $data['wechat'],
            'degree' => $data['degree'],
            'countries' => $data['countries'],
            'ranks' => $data['ranks'],
        ]);
    }

    protected function createConsultant(array $data)
    {
        return Consultant::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'wechat' => $data['wechat'],
            'degree' => $data['degree'],
            'country' => $data['country'],
            'university' => $data['university'],
            'skills' => $data['skills'],
        ]);
    }

    public function getStudentRegister()
    {
        return view('auth.register-student-cn');
    }

    public function getConsultantRegister()
    {
        return view('auth.register-consultant-cn');
    }

    // override register/lonin methods

    public function postStudentRegister(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        Auth::login($this->create($request->all()));
        
        return redirect('student/regis-success');

    }

    public function postConsultantRegister(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        Auth::login($this->createConsultant($request->all()));
        
        return redirect('consultant/regis-success');

    }

    protected $username = 'username';
    protected $loginPath = '/';

}
