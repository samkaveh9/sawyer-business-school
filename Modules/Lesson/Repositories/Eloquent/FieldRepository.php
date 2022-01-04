<?php

namespace Modules\Lesson\Repositories\Eloquent;

use Illuminate\Support\Collection;
use Modules\Lesson\Models\Field;
use Modules\Lesson\Repositories\Eloquent\BaseRepository;
use Modules\Lesson\Repositories\FieldRepositoryInterface;


class FieldRepository extends BaseRepository implements FieldRepositoryInterface
{
    
    /**
     *  FieldRepository constructor.
     *
     * @param Field $model
     */
    public function __construct(Field $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection 
     */
    public function allFields(): Collection
    {
        return $this->model->all();
    }


    public function storeField($request)
    {
        Field::create(array_merge($request->validated(), ['id_number' => rand(100000, 999999)])) == true
            ? toast('اطلاعات رشته تحصیلی با موفقیت ثبت شد!', 'success', 'top-right')->showCloseButton()
            : toast('مشکلی رخ داده دوباره تلاش کنید!', 'error', 'top-right')->showCloseButton();
        return redirect(route('fields.index'));
    }


    public function editOrShowInformationOfField($id, $view)
    {
        return view("lesson::fields.$view", [
            'field' => Field::findOrFail($id),
        ]);
    }


    public function updateField($request, $id)
    {
        $lesson = Field::findOrFail($id);
        $lesson->update($request->validated()) == true
            ? toast('اطلاعات رشته تحصیلی با موفقیت ویرایش شد!', 'success', 'top-right')->showCloseButton()
            : toast('مشکلی رخ داده دوباره تلاش کنید!', 'error', 'top-right')->showCloseButton();
        return redirect(route('fields.index'));
    }

    public function deleteField($id)
    {
        Field::findOrFail($id)->delete();
        toast('اطلاعات رشته تحصیلی با موفقیت حذف شد!', 'success', 'top-right')->showCloseButton();
        return back();
    }
}
