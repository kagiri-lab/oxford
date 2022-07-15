<?php

namespace app\models;

use kilyte\model\UserModel;

class Agent extends UserModel{

    public int $id = 0;
    public string $firstname = '';
    public string $midname = '';
    public string $lastname = '';
    public string $county = '';
    public string $constituency = '';
    public string $ward = '';
    public string $station = '';
    public string $user = '';
    public string $nationalid = '';

    public static function tableName(): string
    {
        return 'agents';
    }

    public function attributes(): array
    {
        return ['user', 'firstname', 'midname', 'lastname', 'station', 'county', 'constituency', 'ward', 'nationalid'];
    }

    public function labels(): array{
        return [
            'user' => 'Agent ID',
            'firstname' => 'First name',
            'midname' => 'Middle name',
            'lastname' => 'Last name',
            'station' => 'Polling Station',
            'county' => 'County',
            'constituency' => 'Constituency',
            'ward' => 'Ward',
            'nationalid' => 'National ID'
        ];
    }

    public function rules(){
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'station' => [self::RULE_REQUIRED],
            'user' => [self::RULE_REQUIRED]
        ];
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}