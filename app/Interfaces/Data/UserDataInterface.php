<?php
namespace App\Interfaces\Data;
interface UserDataInterface {
    /**
     * Takes in a user
     * Inserts user into the database if no user exists
     * @param $user     User information to login
     * @return true or false for login
     */
    public function createNewUser($user);
    /**
     * Takes in a user
     * Selects user from the database and create a user_id session
     * @param $user     
     * @return true or false for login
     */
    public function authenticateUser($user);
    /**
     * Takes in a user
     * Reads if user's credentials is in the database
     * @param $user     
     * @return true or false for login
     */
    public function credentials($user);
    /**
     * Takes in a user
     * Selects user from the database 
     * @param $user     
     * @return true or false for login
     */
    public function terminateUser($users_id);
    /**
     * Takes in a user ID
     * Delete user from the database
     * @param $userid
     * @return true or false for delete
     */
    public function refurbishUser($user);
    /**
     * Takes in a user
     * Updates user from the database
     * @param $user
     * @return $user updated information
     */
    public function findById($users_id);
    /**
     * Takes in a user ID
     * Select user from the database
     * @param $userid
     * @return $user
     */
    public function getAllUsers();
    /**
     * Selects users from the database
     * @return array of users
     */
    public function suspendUser($users_id);
    /**
     * Takes in a user ID
     * Update user from the database
     * @param $userid
     * @return true or false for suspendUser
     */
    public function unSuspendUser($users_id);
    /**
     * Takes in a user ID
     * Update user from the database
     * @param $userid
     * @return true or false for unSuspendUser
     */
}