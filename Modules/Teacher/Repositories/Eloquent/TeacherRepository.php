<?php

namespace Modules\Teacher\Repositories\Eloquent;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Modules\Teacher\Models\Teacher;
use Modules\Teacher\Repositories\TeacherRepositoryInterface;
use Intervention\Image\Facades\Image;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
{

   /**
    * TeacherRepository constructor.
    *
    * @param Teacher $model
    */
   public function __construct(Teacher $model)
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

   public function storeInformationOfTeacher($request)
    {
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileExtension = strtolower($file->getClientOriginalExtension());
                $fileName = date('Ymdhis') . '.' . $fileExtension;
                Image::make($file)->resize(64, 64)->save(storage_path('app/public/') . $fileName);
                $unique_id = rand(1000000, 9999999); 
                Teacher::create(array_merge(
                    $request->validated(),
                    ['password' => Hash::make($request->password)],
                    ['id_number' => $unique_id],
                    ['image' => $fileName])
                );
            }
        } catch (Exception $e) {
            dd($e);
            toast('مشکلی رخ داده دوباره تلاش کنید!','error','top-right')->showCloseButton();
            return back();
        }
        toast('اطلاعات استاد با موفقیت ثبت شد!','success','top-right')->showCloseButton();
        return redirect(route('teachers.index'));
    }


    public function editOrShowInformationOfTeacher($id, $view='show')
    {
        $teacher = Teacher::findOrFail($id);
        return view("teacher::$view", compact('teacher'));
    }

    
    public function UpdateInformationOfTeacher($request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $oldFile = storage_path('app/public/') . $teacher->image; 
        try {
            if ($request->hasFile('image')) {
                unlink($oldFile);
                $file = $request->file('image');
                $fileExtension = strtolower($file->getClientOriginalExtension());
                $fileName = date('Ymdhis') . '.' . $fileExtension;
                Image::make($file)->resize(64, 64)->save(storage_path('app/public/') . $fileName);
                $teacher->update(array_merge(
                    $request->validated(),
                    ['password' => $teacher->password],
                    ['id_number' => $teacher->id_number],
                    ['image' => $fileName]
                ));
            }else {
                $teacher->update(array_merge(
                    $request->validated(),
                    ['password' => $teacher->password],
                    ['id_number' => $teacher->id_number],
                    ['image' => $teacher->image]
                ));
            } 

        } catch (Exception $e) {
            toast('مشکلی رخ داده دوباره تلاش کنید!','error','top-right')->showCloseButton();
            return back();
        }
       toast('اطلاعات استاد با موفقیت ویرایش شد!','success','top-right')->showCloseButton();
        return redirect(route('teachers.index'));
    }


    public function moveToArchive($id)
    {
        Teacher::findOrFail($id)->delete();
        toast('اطلاعات استاد با موفقیت بایگانی شد!','success','top-right')->showCloseButton();
        return back();
    }

    public function archivedTeachers()
    {
        return Teacher::onlyTrashed()->get();
    }

    public function restoreTeacher($id)
    {   
        Teacher::withTrashed()->whereId($id)->restore(); 
        toast('اطلاعات استاد با موفقیت بازیابی شد!','success','top-right')->showCloseButton();
        return back();
    }

    public function deleteTeacher($id)
    {
        Teacher::withTrashed()->whereId($id)->forceDelete(); 
        toast('اطلاعات استاد با موفقیت حذف شد!','success','top-right')->showCloseButton();
        return back();
    }

}
