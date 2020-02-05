<?php
namespace App\Models;
class UserModel{
    
    private $id;
    private $password;
    private $firstname;
    private $lastname;
    private $role;
    private $company;
    private $website;
    private $phonenumber;
    private $email;
    private $birthdate;
    private $gender;
    private $bio;
    private $suspend;

    /**
     * @return mixed
     */
    public function getSuspend()
    {
        return $this->suspend;
    }

    /**
     * @param mixed $suspend
     */
    public function setSuspend($suspend)
    {
        $this->suspend = $suspend;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    public function __construct($id, $firstname, $lastname, $email, $password, $role, $company, $website, $phonenumber, $birthdate, $gender, $bio, $suspend)
    {
        $this->id = $id;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->role = $role;
        $this->email = $email;
        $this->company = $company;
        $this->website = $website;
        $this->phonenumber = $phonenumber;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
        $this->bio = $bio;
        $this->suspend = $suspend;
    }
    
    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }
    
    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }
    
    /**
     * @return mixed
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }
    
    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }
    
    /**
     * @param mixed $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }
    
    /**
     * @param mixed $phonenumber
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }
    
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getLastName()
    {
        return $this->lastname;
    }
    public function getFirstName()
    {
        return $this->firstname;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
   
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }
    
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }
    
    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
  
    
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
    
    
}
?>