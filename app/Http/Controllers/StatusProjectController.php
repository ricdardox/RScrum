<?php

namespace App\Http\Controllers;

use App\Repositories\StatusProjectRepository;

class StatusProjectController extends Controller {

    private $statusProjectRepository;

    public function __construct(StatusProjectRepository $sprintRepo) {
        $this->middleware('auth');
        $this->statusProjectRepository = $sprintRepo;
    }

    public function getStatusProjects() {
        $result = ['' => 'Select status project'];
        foreach ($this->statusProjectRepository->getStatusProjects() as $key => $value) {
            $result[$value->id] = $value->name;
        }
        return $result;
    }

}
