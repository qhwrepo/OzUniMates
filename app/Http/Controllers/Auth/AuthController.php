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
use Config;
use Log;

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

    protected $username = 'username';
    protected $loginPath = '/';

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
        Config::set('auth.model','Student');
        Config::set('auth.table','students');
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
        Config::set('auth.model','Consultant');
        Config::set('auth.table','consultants');
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        Auth::login($this->createConsultant($request->all()));
        
        return redirect('consultant/regis-success');

    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required', 'usertype' => 'required',
        ]);

        // Change user provider in auth, based on usertype

        if( $request->only('usertype')['usertype'] == 'student' ) {
            Config::set('auth.model','Student');
            Config::set('auth.table','students');
            $auth = Auth::createEloquentDriver();
            $userprovider = new \Illuminate\Auth\EloquentUserProvider(app('hash'), 'App\Student');
            Auth::setProvider($userprovider);
            $this->redirectPath = '/student/home';
        }

        else if( $request->only('usertype')['usertype'] == 'consultant' ) {
            Config::set('auth.model','Consultant');
            Config::set('auth.table','consultants');
            $auth = Auth::createEloquentDriver();
            $userprovider = new \Illuminate\Auth\EloquentUserProvider(app('hash'), 'App\Consultant');
            Auth::setProvider($userprovider);
            $this->redirectPath = '/consultant/home';
        }  

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);      

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }


}
