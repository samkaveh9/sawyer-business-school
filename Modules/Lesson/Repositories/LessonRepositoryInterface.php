<?php 

namespace Modules\Lesson\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;


interface LessonRepositoryInterface
{
   public function allLessons(): Collection;

   public function allTeachers(): Collection;

   public function storeLesson(Request $request);

   public function editOrShowInformationOfLesson($id, $view);

   public function UpdateLesson($request, $id);

   public function deleteLesson($id);

}