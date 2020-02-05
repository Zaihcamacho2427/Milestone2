<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Business\UserBusinessService;
use App\Models\UserModel;
class AccountController extends Controller
{
    /**
     * Takes in a new user
     * Calls the business service to register
     * If successful, return the login form
     * If not, return the register form
     *
     * @param newUser	user to register
     * @return login view page
     */
    public function register(Request $request)
    {
        //variables to store user input
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        //new instance of business service
        $userBS = new UserBusinessService();
        //create new user and with variables holding user input
        
        $user = new UserModel(null, $firstName, $lastName, $email, $password, 0, null, null, null, null, $gender, null, 0);
        //if statement checking if createNewUser returns true
        if($userBS->createNewUser($user))
        {
            //if true, return login view
            return view("login");
        }
        else{
            //if false, re-return register page so user can try again
            return view("register");
        }
        
    }
    /**
     * Calls the business service to findById
     * If successful, return the home page
     *
     * @return home view page
     */
    public function showHome()
    {
        //create new instance of userBusinessService
        $userBS = new UserBusinessService();
        
        //attempt to find user using ID
        $user = $userBS->findById(session('users_id'));
        //if statement using findById method from business service class is true
        if($user)
        {
            //if user is successfully found, return view displaying home
            $data = ['model' => $user];
            return view("home")->with($data);
        }
   }
    
    /**
     * Takes in a user to log in with
     * Calls the business service to login
     * If successful, return index page If not, return the login form
     *
     * @param attemptedLogin	user to log in with
     * @return home view page with user data
     */
    public function login(Request $request)
    {
        //two variables to store user email and password
        $email = $request->input('email');
        $password = $request->input('password');
        //create new instance of userBusinessService
        $userBS = new UserBusinessService();
        
        //create new user with variables storing user input
        $attemptedUser = new UserModel(null, null, null, $email, $password, null, null, null, null, null, null, null, null);
        
        //attempt to authenticate user
        $user = $userBS->authenticateUser($attemptedUser);
        //if statement using authenticate method from business service class passing new user created
        if($user)
        {
            if($user->getSuspend() == 1){
                session(['suspended' => $user->getSuspend()]);
                return view("suspended");
            }
            session(['users_id' => $user->getId()]);
            session(['role' => $user->getRole()]);
            session(['user' => $user]);
            //if user is successfully authenticated, return view displaying success
            $data = ['model' => $user];
            return view("home")->with($data);
        }
        else
            //if user is not authenticated successfully, return login view so user can attempt to login again
            return view("login");
            
    }
    /**
     * Takes in a user ID
     * Calls the business service to findById
     * If successful, return user profile page If not, return the home form
     *
     * @param user Id 
     * @return profile view page with user data
     */
    public function showProfile($users_id)
    {
        
        //create new instance of userBusinessService
        $userBS = new UserBusinessService();
        
        
        //attempt to findById user
        $user = $userBS->findById($users_id);
        //if statement using findById method from business service class passing user ID
        if($user)
        {
            //if user is successfully found, return view displaying profile
            $data = ['model' => $user];
            return view("profile")->with($data);
        }
        else{
            return view("home");
        }
        
        
    }
    /**
     * Takes in a request for user information
     * Calls the business service to refurbishUser
     * If successful, return user profile page If not, return the home form
     *
     * @param user Id
     * @return profile view page with user data
     */
    public function refurbishUser(Request $request)
    {
        //new user entered information 
        $id = $request->input('id');
        $fn = $request->input('firstname');
        $ln = $request->input('lastname');
        $email = $request->input('email');
        $company = $request->input('company');
        $website = $request->input('website');
        $pn = $request->input('phonenumber');
        $bd = $request->input('birthdate');
        $gender = $request->input('gender');
        $bio = $request->input('bio');
        $role = $request->input('role');

        //create new instance of userBusinessService
        $userBS = new UserBusinessService();
        //create new user using new variables
        $userEdit = new UserModel($id, $fn, $ln, $email, null, $role, $company, $website, $pn, $bd, $gender, $bio, null);
       
        //call refurbishUser method using service passing new User
        $user = $userBS->refurbishUser($userEdit);
       
        //if user information is not empty
        if($user != null)
        {
            
            //store user values into new variable passing user
            $data = ['model' => $user];
            //return profile page displaying $data
            return view("profile")->with($data);
        }
        
    }
    /**
     * Takes in a user id
     * Calls the business service to findById
     * If successful, return user profile edit page
     *
     * @param user Id
     * @return profileEdit view page with user data
     */
    public function showProfileEdit($users_id){
        //create new instance of userBusinessService
        $userBS = new UserBusinessService();
        
        
        //attempt to findById
        $user = $userBS->findById($users_id);
        
            //store user information into variable
            //display profileEdit page 
            $data = ['model' => $user];
            return view("profileEdit")->with($data);   
        
    }
    /**
     * Takes in a user to loggout with
     * returns a redirect to destroy session and login view page
     *
     * @param attemptedLogin	user to log in with
     * @return redirect to login view page with session destroyed
     */
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
    
}
