<?php
require_once 'User.php';

class Developer extends User {
    public function isDeveloper() {
        return true;
    }

    public function getInterns() {
        $users = require __DIR__ . '/../users_data.php';
        $interns = [];

        foreach ($users as $username => $data) {
            if (strtolower($data['role']) === 'intern') {
                $cleanData = $data;
                unset($cleanData['salary']);
                $interns[] = $cleanData;
            }
        }

        return $interns;
    }
}
