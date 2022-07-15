<?php

namespace app\models;

use kilyte\model\UserModel;

class Vote extends UserModel
{

    public int $id = 0;
    public string $agent = '';
    public string $votes = '';
    public string $race = '';
    public string $candidate = '';
    public string $station = '';

    public static function tableName(): string
    {
        return 'votes';
    }

    public function attributes(): array
    {
        return ['agent', 'votes', 'candidate', 'station', 'race'];
    }

    public function labels()
    {
        return [
            'agent' => 'Agent',
            'votes' => 'Candidate Total Votes',
            'candidate' => 'Candidate',
            'station' => 'Polling Station',
            'race' => 'Race'
        ];
    }

    public function rules()
    {
        return [
            'agent' => [self::RULE_REQUIRED],
            'votes' => [self::RULE_REQUIRED],
            'candidate' => [self::RULE_REQUIRED],
            'station' => [self::RULE_REQUIRED],
            'race' => [self::RULE_REQUIRED]
        ];
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
