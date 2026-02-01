<?php
class User {
    private $conn; 
    private $table = "user";

    public $user_id;
    public $emri;
    public $mbiemri;
    public $email;
    public $password;
    public $isAdmin;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($emri, $mbiemri, $email, $password, $isAdmin = 0) {
       
        $stmtCheck = $this->conn->prepare("SELECT user_id FROM " . $this->table . " WHERE email=:email LIMIT 1");
        $stmtCheck->execute([':email' => $email]);
        if ($stmtCheck->fetch()) {
            return false; 
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO " . $this->table . " (emri, mbiemri, email, password, isAdmin) 
                VALUES (:emri, :mbiemri, :email, :password, :isAdmin)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':emri' => $emri,
            ':mbiemri' => $mbiemri,
            ':email' => $email,
            ':password' => $hashed_password,
            ':isAdmin' => $isAdmin
        ]);
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $this->user_id = $user['user_id'];
            $this->emri = $user['emri'];
            $this->mbiemri = $user['mbiemri'];
            $this->email = $user['email'];
            $this->isAdmin = $user['isAdmin'];
            return true;
        }
        return false;
    }

    public function isAdmin() {
        return ($this->isAdmin == 1);
    }

    public function getUserById($user_id) {
        $sql = "SELECT user_id, emri, mbiemri, email, isAdmin FROM " . $this->table . " WHERE user_id = :user_id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $this->user_id = $user['user_id'];
            $this->emri = $user['emri'];
            $this->mbiemri = $user['mbiemri'];
            $this->email = $user['email'];
            $this->isAdmin = $user['isAdmin'];
            return $user;
        }
        return false;
    }

    public function getAllUsers() {
        $sql = "SELECT user_id, emri, mbiemri, email, isAdmin FROM " . $this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
