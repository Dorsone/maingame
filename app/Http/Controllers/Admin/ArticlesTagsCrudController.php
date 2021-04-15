<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticlesTagsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticlesTagsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticlesTagsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ArticlesTags::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/articlestags');
        CRUD::setEntityNameStrings('Тег', 'Теги для статей');
    }


    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => 'Заголовок',
                'type' => 'text',
            ],
            [
                'name' => 'slug',
                'label' => 'url',
                'type' => 'text',
            ]
        ]);
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(ArticlesTagsRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Заголовок',
                'type' => 'text',
            ],
            [
                'name' => 'slug',
                'label' => 'Url',
                'type' => 'text',
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
}
