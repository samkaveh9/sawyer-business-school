<?php

namespace Modules\Teacher\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;


interface TeacherRepositoryInterface
{
   
   public function all(): Collection;

   public function storeInformationOfTeacher(Request $request);

   public function editOrShowInformationOfTeacher($id, $view);

   public function UpdateInformationOfTeacher($request, $id);

   public function moveToArchive($id);

   public function archivedTeachers();

   public function restoreTeacher($id);

   public function deleteTeacher($id);
   
}