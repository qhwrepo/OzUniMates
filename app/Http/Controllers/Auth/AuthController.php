<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Student;
use App\Consultant;
use App\Tag;
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

    protected $username = 'email';
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
    protected function createStudent(array $data)
    {
        return Student::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'wechat' => $data['wechat'],
            'degree' => $data['degree'],
            'universities' => $data['universities'],
            'majors' => $data['majors'],

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
            'university' => $data['university'],
            'major' => $data['major'],
            'thanks' => '0',
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

    public function getStudentRegisterEn()
    {
        return view('auth.register-student-en');
    }

    public function getConsultantRegisterEn()
    {
        return view('auth.register-consultant-en');
    }

    // override register/login methods

    public function postStudentRegister(Request $request)
    {
        \Auth::login("student",$this->createStudent($request->all()));
        
        return redirect('student/regis-success');

    }

    public function postStudentRegisterEn(Request $request)
    {
        \Auth::login("student",$this->createStudent($request->all()));
        
        return redirect('en/student/regis-success');

    }

    public function postConsultantRegister(Request $request)
    {
        \Auth::login("consultant",$this->createConsultant($request->all()));
        
        // store tag & consultant pair into table
        $consultant = Consultant::where('username',$request->username)->first();
        $idarr = [];

        $arr = explode(',', $request->skills);
        $arrLen = sizeof($arr);
        for($i=0;$i<$arrLen;$i++) {
            array_push($idarr, Tag::where('name',$arr[$i])->first()->id);
        };

        $consultant->tags()->attach($idarr);
        
        return redirect('consultant/regis-success');

    }

    public function postConsultantRegisterEn(Request $request)
    {
        \Auth::login("consultant",$this->createConsultant($request->all()));

        // store tag & consultant pair into table
        $consultant = Consultant::where('username',$request->username)->first();
        $idarr = [];

        $arr = explode(',', $request->skills);
        $arrLen = sizeof($arr);
        for($i=0;$i<$arrLen;$i++) {
            array_push($idarr, Tag::where('name',$arr[$i])->first()->id);
        };

        $consultant->tags()->attach($idarr);
        
        return redirect('en/consultant/regis-success');

    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required', 'usertype' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        // Change user provider in auth, based on usertype

        if( $request->only('usertype')['usertype'] == 'student' ) {
            $this->redirectPath = '/student/home';
            $credentials = $this->getCredentials($request);      
            if (\Auth::attempt("student",['username'=>$credentials['username'],
                'password'=>$credentials['password']])) {
                return $this->handleUserWasAuthenticated($request, $throttles);
            }
        }

        else if( $request->only('usertype')['usertype'] == 'consultant' ) {
            $this->redirectPath = '/consultant/home';
            $credentials = $this->getCredentials($request); 
            // Log::info($credentials);

            if (\Auth::attempt("consultant",['email'=>$credentials['email'],
                'password'=>$credentials['password']])) {
                return $this->handleUserWasAuthenticated($request, $throttles);
            }
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

    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }


        if (method_exists($this, 'authenticated')) {
            if( $request->only('usertype')['usertype'] == 'student' ) {
                return $this->authenticated($request, \Auth::user("student",$this->user()));
            }
            else if( $request->only('usertype')['usertype'] == 'consultant' ) {
                return $this->authenticated($request, \Auth::user("consultant",$this->user()));
            }
            
        }

        return redirect()->intended($this->redirectPath());
    }


}
