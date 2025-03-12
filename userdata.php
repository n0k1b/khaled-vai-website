<?php
declare(strict_types=1);

require 'connection.php';

function generateReferenceNumber(): string {
    return bin2hex(random_bytes(8)); // Generates a 16-character hexadecimal string
}

try {
    $name = 'Admin';
    $email = 'admin@gmail.com';
    $password = 'password';
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hashing the password
    $referenceNumber = generateReferenceNumber();

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, reference_number) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $hashedPassword, $referenceNumber]);

    echo "User inserted successfully.";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
