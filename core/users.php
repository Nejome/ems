<?php

use Carbon\Carbon;

class users extends ems_db
{

    public $users_db;

    public function __construct($data)
    {
        parent::__construct($data);

        $this->users_db = $this->db;
    }

    public function get_all_users(){

        $stmt= $this->users_db->query("select users.user_id, users.last_seen, users.status, users.user_type, employees.name, employees.phone,
                                                  employees.email
                                                  from users
                                                  inner join employees
                                                  where users.user_emp_id = employees.employee_id");
        return $stmt->fetchAll();

    }

    public function get_user($id){

        $stmt = $this->users_db->prepare("select users.*, employees.name, employees.email 
                                                    from users
                                                    inner join employees 
                                                    where user_id = :id and users.user_emp_id = employees.employee_id");
            $stmt->execute(array(':id' => $id));

            return $stmt->fetch();

    }

    public function update_an_user($id, $data){

        $stmt = $this->users_db->prepare("update users set user_name = :user_name, user_type = :user_type
                                                  where user_id = :user_id");
        $stmt->execute(array(':user_name' => $data['user_name'], ':user_type' => $data['user_type'], ':user_id' => $id));

    }

    public function get_employees(){

       $stmt = $this->users_db->query("select * from employees");

       return $stmt->fetchAll();

    }

    public function add_user($data){

        $hashed_password = password_hash($data['user_password'], PASSWORD_DEFAULT);

        $stmt = $this->users_db->prepare("insert into users(user_name, user_emp_id, user_type, user_password)
                                                    values(:user_name, :user_emp_id, :user_type, :user_password)");
        $stmt->execute(array(':user_name' => $data['user_name'], ':user_emp_id' => $data['user_emp_id'],
                             ':user_type' => $data['user_type'], ':user_password' => $hashed_password));

    }

    public function delete_an_user($id){

        $this->users_db->prepare("delete from users where user_id = :id")
            ->execute(array(':id' => $id));

    }

    public function update_user_with_password($id, $data){

        $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

        $this->users_db->prepare("update users set user_name = :user_name, user_password = :new_password where user_id = :id")
            ->execute(array(':user_name' => $data['user_name'], ':new_password' => $data['new_password'], ':id' => $id));

        $this->users_db->prepare("update employees set email = :email where employee_id = :id")
            ->execute(array(':email' => $data['email'], ':id' => $data['user_emp_id']));

    }

    public function update_user($id, $data){

        $this->users_db->prepare("update users set user_name = :user_name where user_id = :id")
            ->execute(array(':user_name' => $data['user_name'], ':id' => $id));

        $this->users_db->prepare("update employees set email = :email where employee_id = :id")
            ->execute(array(':email' => $data['email'], ':id' => $data['user_emp_id']));

    }

    public function is_logged_in(){

        if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true){

            return true;

        }else {

            return false;

        }

    }

    public function get_user_info($username){

        $stmt = $this->users_db->prepare("SELECT users.user_id, users.user_emp_id , users.user_name, users.user_password, users.user_type, users.last_seen, users.status, employees.name 
                                                   from users
                                                   inner join employees
                                                   where user_name = :user_name and users.user_emp_id = employees.employee_id");

        $stmt->execute(array(':user_name' => $username));

        return $stmt->fetch();

    }

    public function login($username, $password){

        $user = $this->get_user_info($username);

        if(password_verify($password, $user['user_password'])){

            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_emp_id'] = $user['user_emp_id'];
            $_SESSION['username'] = $user['user_name'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['user_type'] = $user['user_type'];

            $this->users_db->prepare("update users set status = 1 where user_name = :user_name")
            ->execute(array(':user_name' => $user['user_name']));

            return true;

        }

    }

    public function logout(){

        $this->users_db->prepare("update users set status = 0, last_seen = :now where user_name = :user_name")
            ->execute(array(':now' => Carbon::now(), ':user_name' => $_SESSION['username']));

        session_destroy();

    }

}