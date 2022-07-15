<?php

use kilyte\Application;

class m0005_votes {
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE votes (
                id INT AUTO_INCREMENT PRIMARY KEY,
                agent VARCHAR(255) NOT NULL,
                votes VARCHAR(255) NOT NULL,
                candidate VARCHAR(255) NOT NULL,
                station VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE votes;";
        $db->pdo->exec($SQL);
    }
}