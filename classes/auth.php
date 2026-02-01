<?php

class Auth
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function login(string $email, string $password): array
    {
        if (empty($email) || empty($password)) {
            return [
                'success' => false,
                'message' => 'Plotësoni email dhe password.'
            ];
        }

        $sql = "SELECT user_id, password, isAdmin 
                FROM user 
                WHERE email = :email 
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            return [
                'success' => false,
                'message' => 'Email ose password i pasaktë.'
            ];
        }

        return [
            'success' => true,
            'user_id' => $user['user_id'],
            'isAdmin' => $user['isAdmin']
        ];
    }
}
