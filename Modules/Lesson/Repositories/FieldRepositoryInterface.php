<?php 

namespace Modules\Lesson\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;


interface FieldRepositoryInterface
{
   public function allFields(): Collection;

   public function storeField(Request $request);

   public function editOrShowInformationOfField($id, $view);

   public function UpdateField($request, $id);

   public function deleteField($id);

}