<?php

namespace Modules\Lesson\Repositories\Eloquent;

use Exception;
use Illuminate\Support\Collection;
use Modules\Lesson\Models\Lesson;
use Modules\Lesson\Repositories\LessonRepositoryInterface;
use Modules\Teacher\Models\Teacher;

class LessonRepository extends BaseRepository implements LessonRepositoryInterface
{
    
    /**
     * LessonRepository constructor.
     *
     * @param Lesson $model
     */
    public function __construct(Lesson $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection 
     */
    public function allLessons(): Collection
    {
        return $this->model->all();
    }

    public function allTeachers(): Collection
    {
        return Teacher::all();
    }

    public function storeLesson($request)
    {
        Lesson::create(array_merge($request->validated(), ['id_number' => rand(100000, 999999)])) == true
            ? toast('اطلاعات درس با موفقیت ثبت شد!', 'success', 'top-right')->showCloseButton()
            : toast('مشکلی رخ داده دوباره تلاش کنید!', 'error', 'top-right')->showCloseButton();
        return redirect(route('lessons.index'));
    }


    public function editOrShowInformationOfLesson($id, $view)
    {
        return view("lesson::lessons.$view", [
            'lesson' => Lesson::findOrFail($id),
            'lessons' => $this->allLessons(),
            'teachers' => $this->allTeachers(),
        ]);
    }


    public function updateLesson($request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->validated()) == true
            ? toast('اطلاعات درس با موفقیت ویرایش شد!', 'success', 'top-right')->showCloseButton()
            : toast('مشکلی رخ داده دوباره تلاش کنید!', 'error', 'top-right')->showCloseButton();
        return redirect(route('lessons.index'));
    }

    public function deleteLesson($id)
    {
        Lesson::findOrFail($id)->delete();
        toast('اطلاعات درس با موفقیت حذف شد!', 'success', 'top-right')->showCloseButton();
        return back();
    }
}
