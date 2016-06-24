<?php

namespace App\Repositories;

use App\Models\StatusProject;
use InfyOm\Generator\Common\BaseRepository;

class StatusProjectRepository extends BaseRepository {

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     * */
    public function model() {
        return StatusProject::class;
    }

    public function getStatusProjects() {
        return StatusProject::get();
    }

}
