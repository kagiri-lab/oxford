<?php

namespace app\models;

use kilyte\model\UserModel;

class Candidate extends UserModel
{

    public int $id = 0;
    public string $firstname = '';
    public string $midname = '';
    public string $lastname = '';
    public string $position = '';
    public string $county = '';
    public string $constituency = '';
    public string $ward = '';

    public static function tableName(): string
    {
        return 'candidates';
    }

    public function attributes(): array
    {
        return ['firstname', 'midname', 'lastname', 'position', 'county', 'constituency', 'ward'];
    }

    public function labels(): array{
        return [
            'firstname' => 'First name',
            'midname' => 'Middle name',
            'lastname' => 'Last name',
            'position' => 'Position',
            'county' => 'County',
            'constituency' => 'Constituency',
            'ward' => 'Ward'
        ];
    }

    public function rules(){
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'position' => [self::RULE_REQUIRED]
        ];
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

}
