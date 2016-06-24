<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSprintRequest;
use App\Http\Requests\UpdateSprintRequest;
use App\Repositories\SprintRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SprintController extends InfyOmBaseController {

    /** @var  SprintRepository */
    private $sprintRepository;

    public function __construct(SprintRepository $sprintRepo) {
        $this->middleware('auth');
        $this->sprintRepository = $sprintRepo;
    }

    /**
     * Display a listing of the Sprint.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->sprintRepository->pushCriteria(new RequestCriteria($request));
        $sprints = $this->sprintRepository->all();

        return view('sprints.index')
                        ->with('sprints', $sprints);
    }

    /**
     * Show the form for creating a new Sprint.
     *
     * @return Response
     */
    public function create() {
        return view('sprints.create');
    }

    /**
     * Store a newly created Sprint in storage.
     *
     * @param CreateSprintRequest $request
     *
     * @return Response
     */
    public function store(CreateSprintRequest $request) {
        $input = $request->all();

        $sprint = $this->sprintRepository->create($input);

        Flash::success('Sprint saved successfully.');

        return redirect(route('sprints.index'));
    }

    /**
     * Display the specified Sprint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $sprint = $this->sprintRepository->findWithoutFail($id);

        if (empty($sprint)) {
            Flash::error('Sprint not found');

            return redirect(route('sprints.index'));
        }

        return view('sprints.show')->with('sprint', $sprint);
    }

    /**
     * Show the form for editing the specified Sprint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $sprint = $this->sprintRepository->findWithoutFail($id);

        if (empty($sprint)) {
            Flash::error('Sprint not found');

            return redirect(route('sprints.index'));
        }

        return view('sprints.edit')->with('sprint', $sprint);
    }

    /**
     * Update the specified Sprint in storage.
     *
     * @param  int              $id
     * @param UpdateSprintRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSprintRequest $request) {
        $sprint = $this->sprintRepository->findWithoutFail($id);

        if (empty($sprint)) {
            Flash::error('Sprint not found');

            return redirect(route('sprints.index'));
        }

        $sprint = $this->sprintRepository->update($request->all(), $id);

        Flash::success('Sprint updated successfully.');

        return redirect(route('sprints.index'));
    }

    /**
     * Remove the specified Sprint from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $sprint = $this->sprintRepository->findWithoutFail($id);

        if (empty($sprint)) {
            Flash::error('Sprint not found');

            return redirect(route('sprints.index'));
        }

        $this->sprintRepository->delete($id);

        Flash::success('Sprint deleted successfully.');

        return redirect(route('sprints.index'));
    }

}
