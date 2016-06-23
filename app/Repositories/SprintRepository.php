<?php

namespace App\Repositories;

use App\Models\Sprint;
use InfyOm\Generator\Common\BaseRepository;

class SprintRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'datereview',
        'resumereview',
        'dateretrospective',
        'project_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sprint::class;
    }
}
