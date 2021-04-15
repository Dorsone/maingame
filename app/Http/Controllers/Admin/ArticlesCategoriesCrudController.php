<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticlesCategoriesRequest;
use App\Models\ArticlesCategories;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticlesCategoriesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticlesCategoriesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\ArticlesCategories::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/articlescategories');
        CRUD::setEntityNameStrings('Категорию', 'Категории статей');
    }

    protected function setupReorderOperation()
    {
        $this->crud->set('reorder.label', 'title');
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
                'name' => 'image',
                'label' => 'Картинка',
                'type' => 'image',
                'width' => '100px',
                'height' => 'auto',
            ],
            [
                'name' => 'title',
                'label' => 'Заголовок',
                'type' => 'text',
            ],
            [
                'name' => 'slug',
                'label' => 'url',
                'type' => 'text',
            ]
        ]);

        $this->crud->orderBy('lft');

    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ArticlesCategoriesRequest::class);

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
                'name' => 'parent_id',
                'label' => 'Родительская категория',
                'type' => 'select2',
                'entity' => 'parent',
                'attribute' => 'title',
                'allows_null' => true,
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
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'textarea',
            ],
            [
                'name' => 'slug',
                'label' => 'Url',
                'type' => 'text',
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'browse',
                'hint' => ''
            ],
            [
                'name'  => 'separator',
                'type'  => 'custom_html',
                'value' => '<hr><h2>SEO</h2>'
            ],
            [
                'name' => 'breadcrumbs_title',
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
            'seo_text_top' => [
                'name' => 'seo_text',
                'label' => 'SEO текст',
                'hint' => '',
                'type' => 'summernote',
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
