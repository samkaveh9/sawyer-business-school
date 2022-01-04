<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\UserRequest;
use Modules\User\Repository\UserRepositoryInterface;

class UserController extends Controller
{

    private $repository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;   
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('user::index', [
            'users' => $this->repository->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(UserRequest $request)
    {
       return $this->repository->storeInformationOfUser($request); 
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       return $this->repository->editOrShowInformationOfUser($id, 'show'); 
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return $this->repository->editOrShowInformationOfUser($id, 'edit'); 
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UserRequest $request, $id)
    {
       return $this->repository->UpdateInformationOfUser($request, $id); 
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
       return $this->repository->moveToArchive($id); 
    }

    public function archive()
    {
        return view('user::archive' ,[
            'users' => $this->repository->archivedUsers()
        ]);
    }

    public function restore($id)
    {
        return $this->repository->restoreUser($id);
    }

    public function delete($id)
    {
        return $this->repository->deleteUser($id);
    }
}
