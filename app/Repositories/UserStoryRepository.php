<?php

namespace App\Repositories;

use App\Models\UserStory;
use InfyOm\Generator\Common\BaseRepository;

class UserStoryRepository extends BaseRepository {

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'description',
        'criteriaofacceptance',
        'estimation',
        'status'
    ];

    /**
     * Configure the Model
     * */
    public function model() {
        return UserStory::class;
    }

    public function getUseStories() {
        return UserStory::get();
    }

}
