<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StaticInfoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class StaticInfoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StaticInfoCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkCloneOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;


    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\StaticInfo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/static-info');
        CRUD::setEntityNameStrings('статичную информацию', '');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('active');
        CRUD::column('title');
        CRUD::column('slug');
        CRUD::column('date');
        CRUD::column('created_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StaticInfoRequest::class);

        $this->crud->addFields([
            [
                'name' => 'active',
                'label' => 'Активность',
                'type' => 'boolean',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-12',
                ],
            ],
            [
                'name' => 'date',
                'label' => 'Дата',
                'type' => 'date',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            [
                'name' => 'user_id',
                'label' => 'Автор',
                'type' => 'select2',
                'entity' => 'user',
                'attribute' => 'name',
                'allows_null' => false,
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
                'name' => 'slug',
                'label' => 'Url',
                'type' => 'text',
                'hint' => 'Будет автоматически сгенерирован из вашего заголовка, если оставить его пустым.',
            ],
            [
                'name' => 'content',
                'label' => 'Текст статьи',
                'type' => 'summernote',
            ],
            [
                'name' => 'separator',
                'type' => 'custom_html',
                'value' => '<hr><h2>SEO</h2>'
            ],
            [
                'name' => 'seo_breadcrumbs_title',
                'label' => 'Заголовок для хлебных крошек',
                'type' => 'text',
            ],
            'seo_title' => [
                'name' => 'seo_title',
                'label' => 'SEO Title',
                'type' => 'text',
            ],
            'seo_h1' => [
                'name' => 'seo_h1',
                'label' => 'SEO H1',
                'type' => 'text',
                'hint' => '',
            ],
            'seo_keywords' => [
                'name' => 'seo_keywords',
                'label' => 'SEO keywords',
                'type' => 'textarea',
            ],
            'seo_description' => [
                'name' => 'seo_description',
                'label' => 'SEO description',
                'type' => 'textarea',
            ],
        ]);

//        CRUD::field('active');
//        CRUD::field('user_id');
//        CRUD::field('title');
//        CRUD::field('slug');
//        CRUD::field('content');
//        CRUD::field('date');
//        CRUD::field('breadcrumbs_title');
//        CRUD::field('seo_title');
//        CRUD::field('seo_h1');
//        CRUD::field('seo_keywords');
//        CRUD::field('seo_description');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
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
