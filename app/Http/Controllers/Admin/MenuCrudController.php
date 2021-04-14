<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;

/**
 * Class MenuCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MenuCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation {
        saveReorder as mainSaveReorder;
    }

    public function setup()
    {
        CRUD::setModel(\App\Models\Menu::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/menu');
        CRUD::setEntityNameStrings('Пункт меню', 'Меню');
    }

    protected function setupReorderOperation()
    {
        $this->crud->set('reorder.label', 'title');
        $this->crud->set('reorder.max_level', 1);
    }


    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'active',
                'label' => 'Активность',
                'type' => 'boolean',
            ],
            [
                'name' => 'title',
                'label' => 'Заголовок',
                'type' => 'text',
            ],
            [
                'name' => 'link',
                'label' => 'Ссылка',
                'type' => 'text',
            ]
        ]);

        $this->crud->orderBy('lft');
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(MenuRequest::class);

        $this->crud->addFields([
            [
                'name' => 'active',
                'label' => 'Активность',
                'type' => 'boolean',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            [
                'name' => 'title',
                'label' => 'Заголовок',
                'type' => 'text',
            ],
            [
                'name' => 'link',
                'label' => 'Ссылка',
                'type' => 'text',
            ],
            [
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'textarea',
                'hint' => 'Выводиться в верхнем меню'
            ],

        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function saveReorder()
    {
        $response = $this->mainSaveReorder();
        Cache::delete(Menu::CACHE_KEY);
        return $response;
    }
}
