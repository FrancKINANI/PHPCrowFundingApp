<?php
class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private static $file = __DIR__ . '/../Data/users.json';

    public function __construct($id = 0, $name = "", $email = "", $password = "") {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Convert to array
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    // Save user to file
    public function save() {
        $users = self::getAll();
        $users[] = $this->toArray();
        if (file_put_contents(self::$file, json_encode($users, JSON_PRETTY_PRINT))) {
            echo "User saved successfully!";
        } else {
            echo "Failed to save user.";
        }
    }

    // Fetch all users
    public static function getAll() {
        return file_exists(self::$file) ? json_decode(file_get_contents(self::$file), true) : [];
    }

    // Get user by email
    public static function getByEmail($email) {
        foreach (self::getAll() as $data) {
            if ($data['email'] === $email) {
                return new self($data['id'], $data['name'], $data['email'], $data['password']);
            }
        }
        return null;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
}

