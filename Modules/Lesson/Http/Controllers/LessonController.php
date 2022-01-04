<?php

namespace Modules\Lesson\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Lesson\Http\Requests\LessonRequest;
use Modules\Lesson\Repositories\LessonRepositoryInterface;

class LessonController extends Controller
{
    
    private $repository;

    public function __construct(LessonRepositoryInterface $lessonRepositoryInterface)
    {
        $this->repository = $lessonRepositoryInterface;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('lesson::lessons.index',[
            'lessons' => $this->repository->allLessons()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('lesson::lessons.create',[
            'lessons' => $this->repository->allLessons(),
            'teachers' => $this->repository->allTeachers()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(LessonRequest $request)
    {
        return $this->repository->storeLesson($request);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return $this->repository->editOrShowInformationOfLesson($id, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return $this->repository->editOrShowInformationOfLesson($id, 'edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(LessonRequest $request, $id)
    {
        return $this->repository->UpdateLesson($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        return $this->repository->deleteLesson($id);
    }
}
