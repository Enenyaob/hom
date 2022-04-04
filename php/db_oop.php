<?php

class Connection
{
    public $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:server=localhost;dbname=dbhouseofmercy', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "ERROR: Connection failed" . $exception->getMessage();
            die();
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

     public function signUp($first_name, $last_name, $middle_name, $email, $gender, $dob, $department, $phone_no, $home_address)
    {
        $statement = $this->pdo->prepare( "INSERT INTO worker_details (first_name, last_name, middle_name, email, gender, dob, department, phone_no, home_address) VALUES (:first_name, :last_name, :middle_name, :email, :gender, :dob, :department, :phone_no, :home_address)");
        $statement->bindValue('first_name', $first_name);
        $statement->bindValue('last_name', $last_name);
        $statement->bindValue('middle_name', $middle_name);
        $statement->bindValue('email', $email);
        $statement->bindValue('gender', $gender);
        $statement->bindValue('dob', $dob);
        $statement->bindValue('department', $department);
        $statement->bindValue('phone_no', $phone_no);
        $statement->bindValue('home_address', $home_address);
        return $statement->execute();
    }

     public function checkWorkers($dob, $email, $phone_no)
    {
        $statement = $this->pdo->prepare("SELECT first_name, last_name FROM worker_details WHERE dob =:dob AND email =:email AND phone_no =:phone_no");
        $statement->bindValue("dob", $dob);
        $statement->bindValue("email", $email);
        $statement->bindValue("phone_no", $phone_no);
        $statement->execute();
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

       public function getWorkers()
    {
        $statement = $this->pdo->prepare("SELECT * FROM worker_details" );
        $statement->execute();
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

     public function checkUser($key)
    {
        $statement = $this->pdo->prepare("SELECT * FROM user_pass JOIN user_details ON user_pass.details_id = user_details.id WHERE user_name = :user_name  OR email = :email" );
        $statement->bindValue('user_name', $key);
        $statement->bindValue('email', $key);
        $statement->execute();
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

    public function loginUser($user_name, $role1)
    {
        $statement = $this->pdo->prepare("SELECT user_id,  user_name, role, secure_pass FROM  user_pass WHERE user_name = :user_name  AND role = :role");
        $statement->bindValue('user_name', $user_name);
        $statement->bindValue('role', $role1);
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

    public function addRequest($name, $email, $request)
    {
        $statement = $this->pdo->prepare("INSERT INTO prayer_request (name, email, request, create_date)
                                    VALUES (:name, :email, :request, :date)");
        $statement->bindValue('name', $name);
        $statement->bindValue('email', $email);
        $statement->bindValue('request', $request);
        $statement->bindValue('date', date('Y-m-d H:i:s'));
        return $statement->execute();
    }

    public function removeRequest($i_d)
    {
        $statement = $this->pdo->prepare("DELETE FROM prayer_request WHERE id = :id");
        $statement->bindValue('id', $i_d);
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
        $statement = $this->pdo->prepare("UPDATE user_pass JOIN user_details ON user_pass.details_id = user_details.id SET user_name=:user_name,secure_pass=:secure_pass,last_name=:last_name,email=:email,phone_no =:phone_no,home_address=:home_address WHERE id = :id");
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
        $statement = $this->pdo->prepare("SELECT  role FROM  user_pass WHERE user_id = :user_id" );
        $statement->bindValue('user_id', $id);
        $statement->execute();
        return $statement->fetch();
    }
 
    public function getUser($key, $key2)
    {

        $statement = $this->pdo->prepare("SELECT user_id, role, first_name, last_name FROM user_pass JOIN user_details ON user_pass.details_id = user_details.id WHERE role = :role AND phone_no = :phone_no");
        $statement->bindValue('phone_no', $key);
        $statement->bindValue('role', $key2);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateLogin($id, $user_name, $secure_pass)
    {
        $statement = $this->pdo->prepare("UPDATE user_pass SET user_name=:user_name,secure_pass=:secure_pass WHERE user_id = :user_id");
        $statement->bindValue('user_id', $id);
        $statement->bindValue('user_name', $user_name);
        $statement->bindValue('secure_pass', $secure_pass);
        return $statement->execute();
    }

    public function verifyPayment($status, $reference, $amount, $fullname, $date_time, $channel, $email)
    {
        $statement = $this->pdo->prepare("INSERT INTO givings_details(status, reference, amount, fullname, date_time, channel, email) VALUES (:status, :reference, :amount, :fullname, :date_time, :channel, :email)");
        $statement->bindValue("status", $status);
        $statement->bindValue("reference", $reference);
        $statement->bindValue("amount", $amount);
        $statement->bindValue("fullname", $fullname);
        $statement->bindValue("date_time", $date_time);
        $statement->bindValue("channel", $channel);
        $statement->bindValue("email", $email);
        return $statement->execute();
    }

    public function getGivings()
    {
        $statement = $this->pdo->prepare("SELECT fullname, reference, status, amount, date_time, channel, email FROM givings_details ORDER BY date_time DESC");
        $statement->execute();
        return $statement->fetchALL(PDO::FETCH_ASSOC);

    }

     public function checkMember($first_name, $email, $phone_no)
    {
        $statement = $this->pdo->prepare("SELECT first_name, email, phone_no FROM first_timer WHERE first_name =:first_name AND email =:email AND phone_no =:phone_no");
        $statement->bindValue("first_name", $first_name);
        $statement->bindValue("email", $email);
        $statement->bindValue("phone_no", $phone_no);
        $statement->execute();
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }

    public function addCalendar($event, $event_date)
    {
        $statement= $this->pdo->prepare("INSERT INTO calendar(event, event_date)VALUES(:event, :event_date)");
        $statement->bindValue("event", $event);
        $statement->bindValue("event_date", $event_date);
        return $statement->execute();
    }
    public function getCalendar()
    {
        $statement = $this->pdo->prepare("SELECT * FROM calendar ORDER BY event_date ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkUsername($user_name)
    {
        $statement = $this->pdo->prepare("SELECT user_name FROM user_pass WHERE user_name = :user_name");
        $statement->bindValue("user_name", $user_name);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }
}


    return new Connection();
?>


