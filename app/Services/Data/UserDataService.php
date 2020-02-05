<?php
namespace App\Services\Data;

use App\Models\DatabaseModel;
use App\Interfaces\Data\UserDataInterface;
use App\Models\UserModel;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserDataService implements UserDataInterface
{

    /*
     * @see UserBusinessService createNewUser
     */
    public function createNewUser($user)
    {
        // create new instance of DataBaseModel
        $db = new DatabaseModel();
        // grab connection to database
        $connection = $db->getConnection();
        // call credentials method created below. If credentials equals false: (pass $user in parameter)
        if (! $this->credentials($user)) {
            // create sql statement to insert user into database
            $stmt = $connection->prepare("INSERT INTO users (firstname, lastname, email, password, role, website, company, phonenumber, birthdate, gender, bio, suspend) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

            // if sql statement fails. display error message
            if (! $stmt) {
                echo "Something went wrong in the binding process. sql error?";
                exit();
            }
            // create varibales to retrieve properties of user
            $email = $user->getEmail();
            $fn = $user->getFirstName();
            $ln = $user->getLastName();
            $role = $user->getRole();
            $password = $user->getPassword();
            $website = $user->getWebsite();
            $company = $user->getCompany();
            $phonenumber = $user->getPhonenumber();
            $birthdate = $user->getBirthdate();
            $gender = $user->getGender();
            $bio = $user->getBio();
            $suspend = $user->getSuspend();

            // insert sql statement with variables storing user information
            $stmt->bind_param("ssssissssis", $fn, $ln, $email, $password, $role, $company, $website, $phonenumber, $birthdate, $gender, $bio, $suspend);
            $stmt->execute();

            // if number of affected rows within the database is greater than 0, meaning user got successfully entered
            if ($stmt->affected_rows > 0) {
                // return true
                return true;
            } // else return false
            else {
                return false;
            }
            // close connection to database
            mysqli_close($connection);
        }
    }

    /*
     * @see UserBusinessService authenticateUser
     */
    public function authenticateUser($user)
    {
        // create new instance of DataBaseModel
        $db = new DatabaseModel();
        // //grab connection to DB
        $connection = $db->getConnection();
        // create varibales holding user entered credentials
        $attemptedLoginEmail = $user->getEmail();
        $attemptedPassword = $user->getPassword();
        // sql statement selecting information from Database with user fields
        $stmt = "SELECT id, firstname, lastname, password, role, email, website, company, phonenumber, birthdate, gender, bio, suspend FROM users WHERE email = '$attemptedLoginEmail' AND password = '$attemptedPassword' LIMIT 1";

        // create variable that will be used to connect the databse connection and the sql statement
        $result = mysqli_query($connection, $stmt);

        // if result vaiable doesn't find user with entered credentials
        if (! $result) {
            // return false
            return null;
        } // else if result found user in database
        else if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);  
                $p = new UserModel($row['id'], $row['firstname'], $row['lastname'], $attemptedLoginEmail, $attemptedPassword, $row['role'], $row['company'], $row['website'], $row['phonenumber'], $row['birthdate'], $row['gender'], $row['bio'], $row['suspend']);
            } else {
                return null;
            }
            // return user
            return $p;
        }
    }
    
    /*
     * @see UserBusinessService findById
     */
    public function findbyId($users_id)
    {
        $db = new DatabaseModel();
        $connection = $db->getConnection();
        //select statement to search through database using ID passed in
        $stmt = "SELECT * FROM users WHERE id = '$users_id' LIMIT 1";

        // create variable that will be used to connect the databse connection and the sql statement
        $result = mysqli_query($connection, $stmt);

        //if result == 1
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                //create new user with found ID
                $p = new UserModel($users_id, $row['firstname'], $row['lastname'], $row['email'], $row['password'], $row['role'], $row['website'], $row['company'], $row['phonenumber'], $row['birthdate'], $row['gender'], $row['bio'], $row['suspend']);
            }
            // return user
            return $p;
        }
    }

    
    /*
     * @see UserBusinessService credentials
     */
    public function credentials($user)
    {
        // create new instance of DatabaseModel
        $db = new DatabaseModel();
        // get connection from Database
        $connection = $db->getConnection();
        // variables to retrieve email and password from $user
        $attemptedLoginEmail = $user->getEmail();
        $attemptedPassword = $user->getPassword();
        // Select sql statement to look through database using user entered email and password
        $stmt = "SELECT id, firstname, lastname, password, role, email, birthdate, gender, bio, suspend FROM users WHERE email = '$attemptedLoginEmail' AND password = '$attemptedPassword' LIMIT 1";
        // variable to store sql statment and connection to database
        $result = mysqli_query($connection, $stmt);

        if (! $result) {

            return true;
        }
        // if sql statement finds a row in database with specified user credentials
        if (mysqli_num_rows($result) == 1) {
            // return true
            return true;
        } // if result doesn't find user within database
        else {
            // return false
            return false;
        }
    }

    /*
     * @see UserBusinessService terminateUser
     */
    public function terminateUser($users_id)
    {
        // create new instance of DatabaseModel
        $db = new DatabaseModel();
        // get connection from Database
        $connection = $db->getConnection();
        //Delete statement where user ID is ID passed in
        $stmt = "DELETE FROM `users` WHERE `users`.`id` = '$users_id'";

        // create variable that will be used to connect the databse connection and the sql statement
        $result = mysqli_query($connection, $stmt);

        // if result vaiable doesn't find user with entered credentials
        if (! $result) {
            // return false
            return false;
        } // else if result found user in database
        else if ($result) {
            return true;
        } else
            return false;
    }

    /*
     * @see UserBusinessService updateNewUser
     */
    public function refurbishUser($user)
    {
        // create new instance of DatabaseModel
        $db = new DatabaseModel();
        // get connection from Database
        $connection = $db->getConnection();

        // variables to retrieve new information from $user
        $id = $user->getId();
        $emailEdit = $user->getEmail();
        $pnEdit = $user->getPhonenumber();
        $fnEdit = $user->getFirstName();
        $lnEdit = $user->getLastName();
        $companyEdit = $user->getCompany();
        $websiteEdit = $user->getWebsite();
        $bnEdit = $user->getBirthdate();
        $genderEdit = $user->getGender();
        $bioEdit = $user->getBio();
        $roleEdit = $user->getRole();

        // Select sql statement to look through database using user entered information
        $stmt = "UPDATE `users` SET `firstname`= '$fnEdit', `lastname`= '$lnEdit', `email` = '$emailEdit', `phonenumber` = '$pnEdit', `company` = '$companyEdit', `website` = '$websiteEdit', `birthdate` = '$bnEdit', `gender` = '$genderEdit', `bio` = '$bioEdit', `role` = '$roleEdit' WHERE id = $id Limit 1";
        // create variable that will be used to connect the databse connection and the sql statement
        $result = mysqli_query($connection, $stmt);
        
        //if result has information
        if ($result) {
            //create new user with updated information
            $p = new UserModel($id, $fnEdit, $lnEdit, $emailEdit, $user->getPassword(), $roleEdit, $companyEdit, $websiteEdit, $pnEdit, $bnEdit, $genderEdit, $bioEdit, $user->getSuspend());
        } else {
            return null;
        }
        // return user
        return $p;
    }

    
    /*
     * @see UserBusinessService getAllUsers
     */
    public function getAllUsers()
    {
        $db = new DatabaseModel();
        $connection = $db->getConnection();
        //select statement for all information in users
        $stmt = "SELECT * FROM users";

        // create variable that will be used to connect the databse connection and the sql statement
        $result = mysqli_query($connection, $stmt);

        // create new user array
        $user_array = array();
        //if result has information
        if ($result) {
            //while loop to continue to fetch information until no more information can be fetched
            while (($row = mysqli_fetch_assoc($result))) {
                //create new person for each time a person is found
                $p = new UserModel($row['id'], $row['firstname'], $row['lastname'], $row['email'], $row['password'], $row['role'], $row['company'], $row['website'], $row['phonenumber'], $row['birthdate'], $row['gender'], $row['bio'], $row['suspend']);
                array_push($user_array, $p);
            }
            // return user array
            return $user_array;
        } else {
            return null;
        }
    }

    
    /*
     * @see UserBusinessService suspendUser
     */
    public function suspendUser($users_id)
    {
        // create new instance of DatabaseModel
        $db = new DatabaseModel();
        // get connection from Database
        $connection = $db->getConnection();
        //Update statement using passed in user ID to set 'suspend' = 1
        $stmt = "UPDATE `users` SET `suspend`= '1' WHERE `users`.`id` = '$users_id'";

        // create variable that will be used to connect the databse connection and the sql statement
        $result = mysqli_query($connection, $stmt);

        // if result vaiable doesn't find user with entered credentials
        if (! $result) {
            // return false
            return false;
        } // else if result found user in database
        else if ($result) {
            return true;
        } else
            return false;
    }
    
    /*
     * @see UserBusinessService unSuspendUser
     */
    public function unSuspendUser($users_id)
    {
        // create new instance of DatabaseModel
        $db = new DatabaseModel();
        // get connection from Database
        $connection = $db->getConnection();
        //Update statement to set 'suspend' property to 0 to unsuspend user
        $stmt = "UPDATE `users` SET `suspend`= '0' WHERE `users`.`id` = '$users_id'";
        
        // create variable that will be used to connect the databse connection and the sql statement
        $result = mysqli_query($connection, $stmt);
        
        // if result vaiable doesn't find user with entered credentials
        if (! $result) {
            // return false
            return false;
        } // else if result found user in database
        else if ($result) {
            return true;
        } else
            return false;
    }

}

?>