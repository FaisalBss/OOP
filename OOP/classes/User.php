<?php
class User {
    protected $username;
    protected $name;
    protected $id;
    protected $salary;
    protected $email;
    protected $role;

    public function __construct($username, $data) {
        $this->username = $username;
        $this->name = $data['name'];
        $this->id = $data['id'];
        $this->salary = $data['salary'];
        $this->email = $data['email'];
        $this->role = $data['role'];
    }

    public function getName() { return $this->name; }
    public function getId() { return $this->id; }
    public function getSalary() { return $this->salary; }
    public function getEmail() { return $this->email; }
    public function getUsername() { return $this->username; }
    public function getRole() { return $this->role; }

    public function isManager() { return false; }
    public function isDeveloper() { return false; }
}
