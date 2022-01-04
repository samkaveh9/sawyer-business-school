<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Student\Http\Requests\StudentRequest;
use Modules\Student\Repositories\StudentRepositoryInterface;

class StudentController extends Controller
{

    private $repository;

    public function __construct(StudentRepositoryInterface $studentRepositoryInterface)
    {
        $this->repository = $studentRepositoryInterface;   
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('student::index',[
            'students' => $this->repository->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('student::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StudentRequest $request)
    {
        return $this->repository->storeInformationOfStudent($request);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return $this->repository->editOrShowInformationOfStudent($id, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return $this->repository->editOrShowInformationOfStudent($id, 'edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(StudentRequest $request, $id)
    {
        return $this->repository->UpdateInformationOfStudent($request, $id);
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
        return view('student::archive' ,[
            'students' => $this->repository->archivedStudents()
        ]);
    }

    public function restore($id)
    {
        return $this->repository->restoreStudent($id);
    }

    public function delete($id)
    {
        return $this->repository->deleteStudent($id);
    }
}
