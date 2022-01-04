<?php

namespace Modules\Student\Repositories\Eloquent;

use Exception;
use Illuminate\Support\Collection;
use Modules\Student\Models\Student;
use Intervention\Image\Facades\Image;
use Modules\Student\Repositories\StudentRepositoryInterface;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{

   /**
    * StudentRepository constructor.
    *
    * @param Student $model
    */
   public function __construct(Student $model)
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

   public function storeInformationOfStudent($request)
   {
       try {
           if ($request->hasFile('image')) {
               $file = $request->file('image');
               $fileExtension = strtolower($file->getClientOriginalExtension());
               $fileName = date('Ymdhis') . '.' . $fileExtension;
               Image::make($file)->resize(64, 64)->save(storage_path('app/public/') . $fileName);
               $unique_id = rand(1000000000, 9999999999);
               Student::create(array_merge(
                   $request->validated(),
                   ['id_number' => $unique_id],
                   ['image' => $fileName])
               );
           }
       } catch (Exception $e) {
           dd($e);
           toast('مشکلی رخ داده دوباره تلاش کنید!','error','top-right')->showCloseButton();
           return back();
       }
       toast('اطلاعات دانشجو با موفقیت ثبت شد!','success','top-right')->showCloseButton();
       return redirect(route('students.index'));
   }


   public function editOrShowInformationOfStudent($id, $view='show')
   {
       $student = Student::findOrFail($id);
       return view("student::$view", compact('student'));
   }


   public function UpdateInformationOfStudent($request, $id)
   {
       try {
           $student = Student::findOrFail($id);
           $oldFile = $student->image;
           if ($request->hasFile('image')) {
               unlink(storage_path('app/public/') . $oldFile);
               $file = $request->file('image');
               $fileExtension = strtolower($file->getClientOriginalExtension());
               $fileName = date('Ymdhis') . '.' . $fileExtension;
               Image::make($file)->resize(64, 64)->save(storage_path('app/public/') . $fileName);
               $student->update(array_merge(
                   $request->validated(),
                   ['image' => $fileName])
               );
           }else {
               $student->update(array_merge(
                   $request->validated(),
                   ['image' => $student->image])
               );
           }

       } catch (Exception $e) {
           toast('مشکلی رخ داده دوباره تلاش کنید!','error','top-right')->showCloseButton();
           return back();
       }
      toast('اطلاعات دانشجو با موفقیت ویرایش شد!','success','top-right')->showCloseButton();
       return redirect(route('students.index'));
   }


   public function moveToArchive($id)
   {
       Student::findOrFail($id)->delete();
      toast('اطلاعات دانشجو با موفقیت بایگانی شد!','success','top-right')->showCloseButton();
       return back();
   }

   public function archivedstudents()
   {
       return Student::onlyTrashed()->get();
   }

   public function restoreStudent($id)
   {   
       Student::withTrashed()->whereId($id)->restore(); 
       toast('اطلاعات دانشجو با موفقیت بازیابی شد!','success','top-right')->showCloseButton();
       return back();
   }

   public function deleteStudent($id)
   {
       Student::withTrashed()->whereId($id)->forceDelete(); 
      toast('اطلاعات دانشجو با موفقیت حذف شد!','success','top-right')->showCloseButton();
       return back();
   }

}