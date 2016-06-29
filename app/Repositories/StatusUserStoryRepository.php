<?php

namespace App\Repositories;

use App\Models\StatusUserStory;
use InfyOm\Generator\Common\BaseRepository;

class StatusUserStoryRepository extends BaseRepository {

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
        return StatusUserStory::class;
    }

    public function getStatusUserStories() {
        return StatusUserStory::get();
    }

}
