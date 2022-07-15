<?php

use kilyte\Application;

class m0006_votes_add_race_column {
    public function up()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE votes ADD COLUMN race VARCHAR(255) NOT NULL");
    }

    public function down()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE votes ADD COLUMN race VARCHAR(255) NOT NULL");
    }
}