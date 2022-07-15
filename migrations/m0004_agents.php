<?php

use kilyte\Application;

class m0004_agents
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE agents (
                id INT AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(255) NOT NULL,
                midname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                station VARCHAR(255) NOT NULL,
                county VARCHAR(255) NOT NULL,
                constituency VARCHAR(255) NOT NULL,
                ward VARCHAR(255) NOT NULL,
                nationalid VARCHAR(255) NOT NULL,
                user VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE agents;";
        $db->pdo->exec($SQL);
    }
}
