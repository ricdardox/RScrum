<?php

namespace App\Http\Controllers;

use App\Repositories\StatusUserStoryRepository;

class StatusUserStoryController extends Controller {

    private $statusUserStoryRepository;

    public function __construct(StatusUserStoryRepository $sprintRepo) {
        $this->middleware('auth');
        $this->statusUserStoryRepository = $sprintRepo;
    }

    public function getStatusUserStories() {
        $result = ['' => 'Select status user story'];
        foreach ($this->statusUserStoryRepository->getStatusUserStories() as $key => $value) {
            $result[$value->id] = $value->name;
        }
        return $result;
    }

}
