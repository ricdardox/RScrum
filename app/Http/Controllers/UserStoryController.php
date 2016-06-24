<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUserStoryRequest;
use App\Http\Requests\UpdateUserStoryRequest;
use App\Repositories\UserStoryRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserStoryController extends InfyOmBaseController {

    /** @var  UserStoryRepository */
    private $userStoryRepository;

    public function __construct(UserStoryRepository $userStoryRepo) {
        $this->middleware('auth');
        $this->userStoryRepository = $userStoryRepo;
    }

    /**
     * Display a listing of the UserStory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->userStoryRepository->pushCriteria(new RequestCriteria($request));
        $userStories = $this->userStoryRepository->all();

        return view('userStories.index')
                        ->with('userStories', $userStories);
    }

    /**
     * Show the form for creating a new UserStory.
     *
     * @return Response
     */
    public function create() {
        return view('userStories.create');
    }

    /**
     * Store a newly created UserStory in storage.
     *
     * @param CreateUserStoryRequest $request
     *
     * @return Response
     */
    public function store(CreateUserStoryRequest $request) {
        $input = $request->all();

        $userStory = $this->userStoryRepository->create($input);

        Flash::success('UserStory saved successfully.');

        return redirect(route('userStories.index'));
    }

    /**
     * Display the specified UserStory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $userStory = $this->userStoryRepository->findWithoutFail($id);

        if (empty($userStory)) {
            Flash::error('UserStory not found');

            return redirect(route('userStories.index'));
        }

        return view('userStories.show')->with('userStory', $userStory);
    }

    /**
     * Show the form for editing the specified UserStory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $userStory = $this->userStoryRepository->findWithoutFail($id);

        if (empty($userStory)) {
            Flash::error('UserStory not found');

            return redirect(route('userStories.index'));
        }

        return view('userStories.edit')->with('userStory', $userStory);
    }

    /**
     * Update the specified UserStory in storage.
     *
     * @param  int              $id
     * @param UpdateUserStoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserStoryRequest $request) {
        $userStory = $this->userStoryRepository->findWithoutFail($id);

        if (empty($userStory)) {
            Flash::error('UserStory not found');

            return redirect(route('userStories.index'));
        }

        $userStory = $this->userStoryRepository->update($request->all(), $id);

        Flash::success('UserStory updated successfully.');

        return redirect(route('userStories.index'));
    }

    /**
     * Remove the specified UserStory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $userStory = $this->userStoryRepository->findWithoutFail($id);

        if (empty($userStory)) {
            Flash::error('UserStory not found');

            return redirect(route('userStories.index'));
        }

        $this->userStoryRepository->delete($id);

        Flash::success('UserStory deleted successfully.');

        return redirect(route('userStories.index'));
    }

    public function getUserStories() {
        $result = ['' => 'Select user story'];
        foreach ($this->userStoryRepository->getUseStories() as $key => $value) {
            $result[$value->id] = $value->description;
        }
        return $result;
    }

}
