<?php
require_once 'User.php';
require_once 'Manager.php';
require_once 'Developer.php';

class UserFactory {
    public static function create($username, $data) {
        $role = strtolower($data['role']);

        return match ($role) {
            'manager' => new Manager($username, $data),
            'developer' => new Developer($username, $data),
            default => new User($username, $data),
        };
    }
}
