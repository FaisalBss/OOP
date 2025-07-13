<?php
require_once 'User.php';

class Manager extends User {
    public function isManager() {
        return true;
    }

    public function getAllEmployees() {
        $users = require __DIR__ . '/../users_data.php';
        return $users;
    }
}
