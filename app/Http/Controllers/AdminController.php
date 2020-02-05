<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Services\Business\UserBusinessService;
use App\Models\UserModel;
class AdminController extends Controller
{
    /**
     * Takes in a request
     * Calls the business service to getAllUsers
     * If successful, return the adminControl view or usersTable view
     * If not, return the home page
     *
     * @param Request
     * @return AdminControl view page
     */
    public function getUsersTable(Request $request)
    {
       
        //new instance of business service
        $userBS = new UserBusinessService();
        //call getAllUsers method from sevice and store in new users variable
        $users = $userBS->getAllUsers();
        //if statement checking if $users returns true
        if($users)
        {
            //store value of users into new variable
            $data = ['model' => $users];
            //if statement checking if role of user is 2
            if(session('role') == 2)
                //if true, return adminControl view with data holding users
                return view("adminControl")->with($data);
            //else
            else
            //if role == 1
            //return userstable view with data holding users
            return view("usertable")->with($data);
        }
        else{
            $user = session('user');
            $data = ['model'=> $user];
            //if false, re-return register page so user can try again
            return view("home")->with($user);
        }
        
    }
    /**
     * Takes in a ID request
     * Calls the business service to terminateUser
     * If successful, return the adminControl view or usersTable view
     * If not, return the home page
     *
     * @param UserId
     * @return admincontrol/userstable view page
     */
    public function terminateUser($users_id)
    {
        
        //new instance of business service
        $userBS = new UserBusinessService();
        //call terminateUser method passing in user id and storing result into new variable
        $users = $userBS->terminateUser($users_id);
        //if statement checking if terminateUser returns true
        if($users)
        {
            //if role == 2
            if(session('role') == 2)
                //return admincontrol view
                return Redirect::route('admincontrol');
                else
                    //else if (role == 1) 
                    //return userstable view
                    return Redirect::route('usertable');
        }
        else{
            $user = session('user');
            $data = ['model'=> $user];
            //if false, re-return register page so user can try again
            return view("home")->with($data);
        }
    }
    
    /**
     * Takes in a ID request
     * Calls the business service to suspendUser
     * If successful, return the adminControl view or usersTable view
     * If not, return the home page
     *
     * @param UserId
     * @return admincontrol/userstable view page
     */
        public function suspendUser($users_id)
        {
            
            //new instance of business service
            $userBS = new UserBusinessService();
            $userBS = new UserBusinessService();
            //call suspendUser method passing in user id and storing result into new variable
            $users = $userBS->suspendUser($users_id);
            //if statement checking if suspendUser returns true
            if($users)
            {
                //if role == 2
                if(session('role') == 2)
                    //return admincontrol view
                    return Redirect::route('admincontrol');
                    else
                        //else if return usertable
                        return Redirect::route('usertable');
            }
            else{
                $user = session('user');
                $data = ['model'=> $user];
                //if false, re-return register page so user can try again
                return view("home")->with($data);
            }
         }
            
         /**
          * Takes in a ID request
          * Calls the business service to unSuspendUser
          * If successful, return the adminControl view or usersTable view
          * If not, return the home page
          *
          * @param UserId
          * @return admincontrol/userstable view page
          */
         public function unSuspendUser($users_id)
         {
             
             //new instance of business service
             $userBS = new UserBusinessService();
             //call unSuspendUser method passing in user id and storing result into new variable
             $users = $userBS->unSuspendUser($users_id);
             //if statement checking if createNewUser returns true
             if($users)
             {
                 //if role == 2
                 if(session('role') == 2)
                     //return admincontrol
                     return Redirect::route('admincontrol');
                     else
                         //else if role == 1
                         return Redirect::route('usertable');
             }
             else{
                 $user = session('user');
                 $data = ['model'=> $user];
                 //if false, re-return register page so user can try again
                 return view("home")->with($data);
             }
         }
    
}
