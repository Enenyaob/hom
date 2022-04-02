<?php

class Connection
{
    public $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:server=localhost;dbname=dbhouseofmercy', 'root', 'schoolob');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "ERROR: Connection failed" . $exception->getMessage();
        }
    }


    public function addFirst_timer($first_name, $last_name, $middle_name, $age_group, $gender, $home_address, $email, $phone_no, $date)
    {
        $statement = $this->pdo->prepare( "INSERT INTO first_timer (first_name, last_name, middle_name, age_group, gender, home_address, email, phone_no, create_date) VALUES (:first_name, :last_name, :middle_name, :age_group, :gender, :home_address, :email, :phone_no, :create_date)");
        $statement->bindValue('first_name', $first_name);
        $statement->bindValue('last_name', $last_name);
        $statement->bindValue('middle_name', $middle_name);
        $statement->bindValue('age_group', $age_group);
        $statement->bindValue('gender', $gender);
        $statement->bindValue('home_address', $home_address);
        $statement->bindValue('email', $email);
        $statement->bindValue('phone_no', $phone_no);
        $statement->bindValue('create_date', $date);
        return $statement->execute();
    }

    public function getFirst_timer($key)
    {
        $statement = $this->pdo->prepare("SELECT first_name, last_name, gender, age_group, phone_no, home_address FROM first_timer WHERE first_name = :first_name  OR last_name = :last_name" );
        $statement->bindValue('first_name', $key);
        $statement->bindValue('last_name', $key);
        $statement->execute();
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

     public function signUp($user_name, $secure_pass, $email, $first_name, $last_name, $middle_name, $gender, $dob, $department, $role, $phone_number, $home_address)
    {
        $statement = $this->pdo->prepare( "INSERT INTO user_details (user_name, secure_pass, email, first_name, last_name, middle_name, gender, dob, department, role, phone_number, home_address) VALUES (:user_name, :secure_pass, :email, :first_name, :last_name, :middle_name, :gender, :dob, :department, :role, :phone_number, :home_address)");
        $statement->bindValue('user_name', $user_name);
        $statement->bindValue('secure_pass', $secure_pass);
        $statement->bindValue('email', $email);
        $statement->bindValue('first_name', $first_name);
        $statement->bindValue('last_name', $last_name);
        $statement->bindValue('middle_name', $middle_name);
        $statement->bindValue('gender', $gender);
        $statement->bindValue('dob', $dob);
        $statement->bindValue('department', $department);
        $statement->bindValue('role', $role);
        $statement->bindValue('phone_number', $phone_number);
        $statement->bindValue('home_address', $home_address);
        return $statement->execute();
    }

     public function checkUser($key)
    {
        $statement = $this->pdo->prepare("SELECT * FROM user_details WHERE user_name = :user_name  OR email = :email" );
        $statement->bindValue('user_name', $key);
        $statement->bindValue('email', $key);
        $statement->execute();
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

    public function loginUser($user_name, $password)
    {
        $statement = $this->pdo->prepare("SELECT user_name, role FROM  user_details WHERE user_name = :user_name  AND secure_pass = :secure_pass " );
        $statement->bindValue('user_name', $user_name);
        $statement->bindValue('secure_pass', $password);
        $statement->execute();
        //$statement->rowCount();
        return $statement->fetchALL(PDO::FETCH_ASSOC);

    }

// prayer request
    public function getRequests()
    {
        $statement = $this->pdo->prepare("SELECT * FROM prayer_request ORDER BY create_date DESC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addRequest($note)
    {
        $statement = $this->pdo->prepare("INSERT INTO prayer_request (name, request, create_date)
                                    VALUES (:name, :request, :date)");
        $statement->bindValue('name', $request['name']);
        $statement->bindValue('request', $request['request']);
        $statement->bindValue('date', date('Y-m-d H:i:s'));
        return $statement->execute();
    }

    public function removeRequest($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM prayer_request WHERE id = :id");
        $statement->bindValue('id', $id);
        return $statement->execute();
    }

    public function getRequestById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM prayer_request WHERE id = :id");
        $statement->bindValue('id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($id, $user_name, $secure_pass, $last_name, $email, $phone_no, $home_address)
    {
        $statement = $this->pdo->prepare("UPDATE user_details SET user_name=:user_name,secure_pass=:secure_pass,last_name=:last_name,email=:email,phone_number=:phone_no,home_address=:home_address WHERE id = :id");
        $statement->bindValue('id', $id);
        $statement->bindValue('user_name', $user_name);
        $statement->bindValue('secure_pass', $secure_pass);
        $statement->bindValue('last_name', $last_name);
        $statement->bindValue('email', $email);
        $statement->bindValue('phone_no', $phone_no);
        $statement->bindValue('home_address', $home_address);
        return $statement->execute();

    }
     public function checkId($id)
    {
        $statement = $this->pdo->prepare("SELECT  role FROM  user_details WHERE id = :id" );
        $statement->bindValue('id', $id);
        $statement->execute();
        return $statement->fetch();
    }
    
}


    return new Connection();
?>


s