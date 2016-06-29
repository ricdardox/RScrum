<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

class UserRepository extends BaseRepository {

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'image'
    ];

    /**
     * Configure the Model
     * */
    public function model() {
        return User::class;
    }

    public function configFilter() {
        $config = [
            'title' => 'Search users',
            'method' => 'POST',
            'url' => 'http://mi.com.tu/yo',
            'filters' => [
                'name' => ['component' => 'input', 'validation' => []],
                'email' => ['component' => 'input', 'validation' => ['email']],
                'company_id' => ['component' => 'search', 'validation' => [], 'data' => ['service' => false, 'content' => [ '01' => 'opción 1', '02' => 'opción 2']]]
            ],
            'multipleSelect' => false,
        ];
        return $config;
    }

    public function filter() {
        return [];
    }

    public function getUsers() {
        return User::get();
    }

}
