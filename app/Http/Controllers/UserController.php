<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Hash;

class UserController extends InfyOmBaseController {

    /** @var  UserRepository */
    private $userRepository;
    private $pathImages;
    private $pathUserImages;

    public function __construct(UserRepository $userRepo) {
        $this->middleware('auth');
        $this->userRepository = $userRepo;
        $this->pathImages = public_path() . "/images";
        $this->pathUserImages = $this->pathImages . "/users/";
    }

    public function getPathUserImage() {
        return $this->pathUserImages;
    }

    public function getPathPublicUserImage($image) {

        if (!empty($image) && file_exists($this->pathUserImages . $image)) {
            return asset('images/users/') . '/' . $image;
        } else {
            return asset('images/') . '/nouser.png';
        }
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();

        return view('users.index')
                        ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create() {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request) {
        $input = $request->all();
        $filename = $request->file('image');
        if ($input['password'] == '') {
            $input['password'] = Hash::make(123456);
        } else {
            $input['password'] = Hash::make($input['password']);
        }
        $user = $this->userRepository->create($input);
        $this->saveFiles($user, $filename);
        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request) {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $filename = $request->file('image');
        $input = $request->all();

        if ($input['password'] == '') {
            unset($input['password']);
        } else {
            $input['password'] = Hash::make($input['password']);
        }
        $user = $this->userRepository->update($input, $id);
        $this->saveFiles($user, $filename);
        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    public function saveFiles($user, $file) {

        if ($user) {
            $dirImage = $this->pathImages;
            $dirUser = $this->pathUserImages;
            if (!file_exists($dirImage)) {
                mkdir($dirImage);
            }
            if (!file_exists($dirUser)) {
                mkdir($dirUser);
            }
            if (!empty($file)) {
                $nameFile = md5($user->id) . "." . $file->getClientOriginalExtension();
                \File::copy($file->getRealPath(), $dirUser . $nameFile);
                $user->image = $nameFile;
            }
            $user->save();
        }
    }

    public function getDownloadfile($nameFile) {
        $pathFile = "$this->pathUserImages/$nameFile";
        if (file_exists($pathFile)) {
            return response()->download($pathFile);
        }
        Flash::warning('Imposible descargar, la imagen solicitada no esta disponible.');
        return redirect(\URL::previous());
    }

    public function getDeletefile($id, $nameFile) {
        $user = $this->userRepository->findWithoutFail($id);
        $pathFile = "$this->pathUserImages/$nameFile";
        if (file_exists($pathFile) && $user) {
            unlink($pathFile);
            if (!file_exists($pathFile)) {
                $user->image = '';
                $user->save();
                Flash::success('Imagen eliminada correctamente.');
            } else {
                Flash::error('No fue posible eliminar la imagen.');
            }
        } else {
            $user->image = '';
            $user->save();
            Flash::warning('La imagen que intenta eliminar no existe.');
        }
        return redirect(\URL::previous());
    }

    public function getConfigfilter() {
        return response()->json($this->userRepository->configFilter());
    }

    public function getUsers() {
        $result = ['' => 'Select user'];
        foreach ($this->userRepository->getUsers() as $key => $value) {
            $result[$value->id] = $value->name;
        }
        return $result;
    }

    

}
