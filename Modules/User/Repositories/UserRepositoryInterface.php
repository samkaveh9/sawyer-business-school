<?php 

namespace Modules\User\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;


interface UserRepositoryInterface
{
   public function all(): Collection;

   public function storeInformationOfUser(Request $request);

   public function editOrShowInformationOfUser($id, $view);

   public function UpdateInformationOfUser($request, $id);

   public function moveToArchive($id);

   public function archivedUsers();

   public function restoreUser($id);

   public function deleteUser($id);

}