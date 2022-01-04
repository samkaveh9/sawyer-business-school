<?php

namespace Modules\Teacher\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Teacher\Http\Requests\TeacherRequest;
use Modules\Teacher\Repositories\TeacherRepositoryInterface;

class TeacherController extends Controller
{

    private $repository;
    

    public function __construct(TeacherRepositoryInterface $teacherRepository)
    {
        $this->repository = $teacherRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('teacher::index', [
            'teachers' => $this->repository->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('teacher::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param TeacherRequest $teacherRequest
     * @return Renderable
     */
    public function store(TeacherRequest $teacherRequest)
    {
        return $this->repository->storeInformationOfTeacher($teacherRequest);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return $this->repository->editOrShowInformationOfTeacher($id, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    { 
        return $this->repository->editOrShowInformationOfTeacher($id, 'edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TeacherRequest $request, $id)
    {
       return $this->repository->UpdateInformationOfTeacher($request, $id);
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
        return view('teacher::archive' ,[
            'teachers' => $this->repository->archivedTeachers()
        ]);
    }

    public function restore($id)
    {
        return $this->repository->restoreTeacher($id);
    }

    public function delete($id)
    {
        return $this->repository->deleteTeacher($id);
    }
}
