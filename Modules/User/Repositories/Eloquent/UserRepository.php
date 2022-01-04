<?php

namespace Modules\User\Repositories\Eloquent;

use Exception;
use Illuminate\Support\Collection;
use Modules\User\Models\User;
use Modules\User\Repositories\UserRepositoryInterface;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(User $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection 
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }

    public function storeInformationOfUser($request)
    {
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileExtension = strtolower($file->getClientOriginalExtension());
                $fileName = date('Ymdhis') . '.' . $fileExtension;
                Image::make($file)->resize(64, 64)->save(storage_path('app/public/') . $fileName);
                $unique_id = rand(1000000, 9999999);
                User::create(array_merge(
                    $request->validated(),
                    ['password' => Hash::make($request->password)],
                    ['id_number' => $unique_id],
                    ['image' => $fileName])
                );
            }
 
        } catch (Exception $e) {
            toast('مشکلی رخ داده دوباره تلاش کنید!','error','top-right')->showCloseButton();
            return back();
        }
        toast('اطلاعات پرسنل با موفقیت ثبت شد!','success','top-right')->showCloseButton();
        return redirect(route('users.index'));
    }


   public function editOrShowInformationOfUser($id, $view)
   {
       $user = User::findOrFail($id);
       return view("user::$view",compact('user'));
   }

   
  public function updateInformationOfUser($request, $id)
  {
      $user = User::findOrFail($id);
      $oldFile = storage_path('app/public/') . $user->image;
      try {
          if ($request->hasFile('image')) {
              unlink($oldFile);
              $file = $request->file('image');
              $fileExtension = strtolower($file->getClientOriginalExtension());
              $fileName = date('Ymdhis') . '.' . $fileExtension;
              Image::make($file)->resize(64, 64)->save(storage_path('app/public/') . $fileName);
              $user->update(array_merge(
                   $request->validated(),
                  ['password' => $user->password],
                  ['id_number' => $user->id_number],
                  ['image' => $fileName]
              ));  

          } else {
              $user->update(array_merge(
                   $request->validated(),
                  ['password' => $user->password],
                  ['id_number' => $user->id_number],
                  ['image' => $user->image]
              ));  
          }            
      } catch (Exception $e) {
           toast('مشکلی رخ داده دوباره تلاش کنید!','error','top-right')->showCloseButton();
           return back();
      }
      toast('اطلاعات پرسنل با موفقیت ویرایش شد!','success','top-right')->showCloseButton();
      return redirect(route('users.index'));
  }

  public function moveToArchive($id)
  {
      User::findOrFail($id)->delete();
      toast('اطلاعات پرسنل با موفقیت بایگانی شد!','success','top-right')->showCloseButton();
      return back();
  }

  public function archivedUsers()
  {
      $users = User::onlyTrashed()->get();
      return view('user::archive', compact('users'));
  }

   public function restoreUser($id)
   {   
       User::withTrashed()->whereId($id)->restore(); 
       toast('اطلاعات پرسنل با موفقیت بازیابی شد!','success','top-right')->showCloseButton();
       return back();
   }

   public function deleteUser($id)
   {   
       User::withTrashed()->whereId($id)->forceDelete(); 
      toast('اطلاعات پرسنل با موفقیت حذف شد!','success','top-right')->showCloseButton();
       return back();
   }
}