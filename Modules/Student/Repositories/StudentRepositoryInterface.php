<?php

namespace Modules\Student\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface StudentRepositoryInterface
{
   public function all(): Collection;

   public function storeInformationOfStudent(Request $request);

   public function editOrShowInformationOfStudent($id, $view);

   public function UpdateInformationOfStudent($request, $id);

   public function moveToArchive($id);

   public function archivedStudents();

   public function restoreStudent($id);

   public function deleteStudent($id);
   
}