<?php
namespace App\Interfaces\Business;
use App\Models\User;

interface UserBusinessInterface{
    
    /**
     * Takes in a user
     * Uses the UserDataService method to authenticateUser() and returns it's result
     * @param $user     User information to login
     * @return true or false for login
     */
    public function authenticateUser($user);
   
    /**
     * Takes in a user
     * Uses the UserDataService method to createNewUser() and returns it's result
     * @param $user     User information to register
     * @return true or false for createNewUser
     */  
    public function createNewUser($user);
    
    /**
     * Takes in a user
     * Uses the UserDataService method to terminateUser() and returns true or false
     * @param $user     User ID
     * @return true or false for terminateUser
     */
    public function terminateUser($users_ids);
    /**
     * Takes in a user
     * Uses the UserDataService method to refurbishUser() and returns instance of new user
     * @param $user     User information to edit
     * @return user
     */
    public function refurbishUser($user);
    /**
     * Takes in a user
     * Uses the UserDataService method to findById() and returns found person
     * @param $user     User ID
     * @return user
     */
    public function findById($users_id);
    /**
     * Uses the UserDataService method to getAllUsers() and returns array of users
     * @return array of users
     */
    public function getAllUsers();
    /**
     * Takes in a user
     * Uses the UserDataService method to suspendUser() and returns true or false
     * @param $user     User ID
     * @return true or false for suspendUser
     */
    public function suspendUser($users_id);
    /**
     * Takes in a user
     * Uses the UserDataService method to unSuspendUser() and returns true or false
     * @param $user     User ID
     * @return true or false for unSuspendUser
     */
    public function unSuspendUser($users_id);
}
