<?php
declare(strict_types=1);

require 'connection.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        reference_id VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        full_address TEXT NOT NULL,
        mobile_number VARCHAR(20) NOT NULL,
        quantity INT NOT NULL,
        total_price DECIMAL(10, 2) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=INNODB;";

    $pdo->exec($sql);
    echo "Orders table created successfully.";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
