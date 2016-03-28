<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Student;
use App\Consultant;
use App\Tag;
use App\University;
use App\Major;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;
use Mail;

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
            'degree' => $data['degree'],
            'majors' => $data['majors'],
            'description' => '',
            'activated' => false
        ]);
    }

    protected function createConsultant(array $data)
    {
        return Consultant::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'degree' => $data['degree'],
            'university' => $data['university'],
            'major' => $data['major'],
            'specilization' => $data['specilization'],
            'thanks' => '0',
            'ispro' => $data['invite'],
            'description' => '',
            'activated' => false
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

        // store student_university and student_major pairs into intermediate table
        $student = Student::where('username',$request->username)->first();
        $uniarr = [];
        $majorarr = [];

        $arr = explode(',', $request->universities);
        $arrLen = sizeof($arr);
        for($i=0;$i<$arrLen;$i++) {
            array_push($uniarr, $arr[$i]);
        };

        // This will get all the ids of the universities with names in the $uniarr thereby preventing several calls to the database;
        $uniIdList = University::whereIn('name',$uniarr)->lists('id')->all();
        $student->universities()->attach($uniIdList);

        $arr = explode(',', $request->majors);
        $arrLen = sizeof($arr);
        for($i=0;$i<$arrLen;$i++) {
            array_push($majorarr, $arr[$i]);
        };

        $majorIdList = Major::whereIn('name',$majorarr)->lists('id')->all();
        $student->majors()->attach($majorIdList);

        // activation email
        $id = Auth::user('student')->id;
        Mail::send('studentVerificationUrlCN',['id'=>$id],function($message){
            $to = Auth::user('student')->email;
            $message ->to($to)->subject('澳联帮 - 请完成激活');
        });

        return redirect('student/activation');

    }

    public function postStudentRegisterEn(Request $request)
    {
        \Auth::login("student",$this->createStudent($request->all()));

        // store student_university and student_major pairs into intermediate table
        $student = Student::where('username',$request->username)->first();
        $uniarr = [];
        $majorarr = [];

        $arr = explode(',', $request->universities);
        $arrLen = sizeof($arr);
        for($i=0;$i<$arrLen;$i++) {
            array_push($uniarr, $arr[$i]);
        };

        // This will get all the ids of the universities with names in the $uniarr thereby preventing several calls to the database;
        $uniIdList = University::whereIn('name',$uniarr)->lists('id')->all();
        $student->universities()->attach($uniIdList);

        $arr = explode(',', $request->majors);
        $arrLen = sizeof($arr);
        for($i=0;$i<$arrLen;$i++) {
            array_push($majorarr, $arr[$i]);
        };

        $majorIdList = Major::whereIn('name',$majorarr)->lists('id')->all();
        $student->majors()->attach($majorIdList);
        
        // activation email
        $id = Auth::user('student')->id;
        Mail::send('studentVerificationUrlEN',['id'=>$id],function($message){
            $to = Auth::user('student')->email;
            $message ->to($to)->subject('OzUniMates - Please complete activation');
        });

        return redirect('student/activation');

    }

    public function postConsultantRegister(Request $request)
    {
        \Auth::login("consultant",$this->createConsultant($request->all()));
        
        // store tag & consultant pair into table
        $consultant = Consultant::where('username',$request->username)->first();
        $tagarr = [];

        $arr = explode(',', $request->skills);
        $arrLen = sizeof($arr);
        for($i=0;$i<$arrLen;$i++) {
            array_push($tagarr, $arr[$i]);
        };

        $tagIdList = Tag::whereIn('name',$tagarr)->lists('id')->all();
        $consultant->tags()->attach($tagIdList);
        
        // activation email
        $id = Auth::user('consultant')->id;
        Mail::send('mail.consultantVerificationUrlCN',['id'=>$id],function($message){
            $to = Auth::user('consultant')->email;
            $message ->to($to)->subject('澳联帮 - 请完成激活');
        });
        return redirect('consultant/activation');
    }

    public function postConsultantRegisterEn(Request $request)
    {
        \Auth::login("consultant",$this->createConsultant($request->all()));

        // store tag & consultant pair into table
        $consultant = Consultant::where('username',$request->username)->first();
        $tagarr = [];

        $arr = explode(',', $request->skills);
        $arrLen = sizeof($arr);
        for($i=0;$i<$arrLen;$i++) {
            array_push($tagarr, $arr[$i]);
        };

        $tagIdList = Tag::whereIn('name',$tagarr)->lists('id')->all();
        $consultant->tags()->attach($tagIdList);
        
        // activation email
        $id = Auth::user('consultant')->id;
        Mail::send('mail.consultantVerificationUrlEN',['id'=>$id],function($message){
            $to = Auth::user('consultant')->email;
            $message ->to($to)->subject('OzUniMates - Please complete activation');
        });
        return redirect('consultant/activation');

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
            if (\Auth::attempt("student",['email'=>$credentials['email'],
                'password'=>$credentials['password']])) {
                return $this->handleUserWasAuthenticated($request, $throttles);
            }
        }

        else if( $request->only('usertype')['usertype'] == 'consultant' ) {
            $this->redirectPath = '/consultant/home';
            $credentials = $this->getCredentials($request); 
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
