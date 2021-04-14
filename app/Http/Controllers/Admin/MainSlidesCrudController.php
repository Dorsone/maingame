<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MainSlidesRequest;
use App\Models\MainSlides;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;

/**
 * Class MainSlidesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MainSlidesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation {
        saveReorder as mainSaveReorder;
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\MainSlides::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/mainslides');
        CRUD::setEntityNameStrings('Слайд', 'Слайды');
    }

    protected function setupReorderOperation()
    {
        $this->crud->set('reorder.label', 'title');
        $this->crud->set('reorder.max_level', 1);
    }


    protected function setupListOperation()
    {
        $this->crud->addColumns([
            'active' => [
                'name' => 'active',
                'label' => 'Активность',
                'type' => 'boolean',
            ],
            'image' => [
                'name' => 'image',
                'label' => 'Картинка',
                'type' => 'image',
                'width' => '100px',
                'height' => 'auto',
            ],
            'title' => [
                'name' => 'title',
                'label' => 'Заголовок',
                'type' => 'text',
            ]
        ]);

        $this->crud->orderBy('lft');
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(MainSlidesRequest::class);

        $this->crud->addFields([
            'active' => [
                'name' => 'active',
                'label' => 'Активность',
                'type' => 'boolean',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            'title' => [
                'name' => 'title',
                'label' => 'Заголовок',
                'type' => 'text',
            ],
            'link' => [
                'name' => 'link',
                'label' => 'Ссылка',
                'type' => 'text',
            ],
            'image' => [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'browse',
                'hint' => ''
            ],

        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function saveReorder()
    {
        $response = $this->mainSaveReorder();
        Cache::delete(MainSlides::CACHE_KEY);
        return $response;
    }
}
