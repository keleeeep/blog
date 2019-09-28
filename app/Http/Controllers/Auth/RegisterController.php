<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\Uppercase;
use mysql_xdevapi\Exception;

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
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'npm' => ['required','string','max:8','alpha_num','regex:/[5]\w[4]\w{5}/i',new Uppercase],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users','regex:/(\W|^)[\w.+\-]*@student\.gunadarma\.ac\.id(\W|$)/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $npm = $data['npm'];
        $email = $data['email'];

        $email = strtok($email, '@');

        $ch = curl_init("http://".$npm.".student.gunadarma.ac.id/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        $re1 = '/^(: \w.+\s[?=[@\]])/m';

        $re = '/(?<=<td>).*?(?=<\/td>)/';
        preg_match_all($re, $response ,$matches);

        $enc = json_decode(json_encode($matches));
        preg_match($re1, $enc[0][9], $result);

        $name = ucfirst($enc[0][5]);

        $user = "";
        if(array_key_exists(0,$result)) {
            $user = trim(substr(strtok($result[0], '['),2));
        }

        if ($email == $user) {
            return User::create([
                'npm' => $data['npm'],
                'name' => $name,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }
}
