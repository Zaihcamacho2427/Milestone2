<?php
namespace App\Services\Business;
use App\Interfaces\Business\UserBusinessInterface;
use App\Services\Data\UserDataService;
class UserBusinessService implements UserBusinessInterface{
    
    //Refer to UserBusinessInterface
   public function authenticateUser($user) {
        $dbService = new UserDataService();
        $person = $dbService->authenticateUser($user);
        return $person;
    }
    //Refer to UserBusinessInterface
    public function createNewUser($user) {
        $dbService = new UserDataService();
        $persons = $dbService->CreateNewUser($user);
        return $persons;
    }
    //Refer to UserBusinessInterface
    public function terminateUser($users_id)
    {
        $dbService = new UserDataService();
        $person = $dbService->terminateUser($users_id);
        return $person;
    }
    //Refer to UserBusinessInterface
    public function refurbishUser($user)
    {  
        $dbService = new UserDataService();
        $person = $dbService->refurbishUser($user);
        return $person;
    }
    //Refer to UserBusinessInterface
    public function findById($users_id)
    {
        $dbService = new UserDataService();
        $person = $dbService->findbyId($users_id);
        return $person;
    }
    //Refer to UserBusinessInterface
    public function getAllUsers()
    {
        $dbService = new UserDataService();
        $persons = $dbService->getAllUsers();
        return $persons;
    }
    //Refer to UserBusinessInterface
    public function suspendUser($users_id)
    {
        $dbService = new UserDataService();
        $persons = $dbService->suspendUser($users_id);
        return $persons;
    }
    //Refer to UserBusinessInterface
    public function unSuspendUser($users_id)
    { 
        $dbService = new UserDataService();
    $persons = $dbService->unSuspendUser($users_id);
    return $persons;
    }



    


}



?>