<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticlesRequest;
use App\Models\ArticlesCategories;
use App\Models\ArticlesTags;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticlesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticlesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Articles::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/articles');
        CRUD::setEntityNameStrings('Статью', 'Статьи');
    }


    protected function setupListOperation()
    {
        $this->crud->addFilter([
            'name' => 'category_id',
            'type' => 'select2',
            'label' => 'Категория'
        ],
            ArticlesCategories::orderBy('title')->get()->pluck('title', 'id')->toArray(),
            function ($value) {
                $this->crud->addClause('where', 'category_id', $value);
            }
        );

        $this->crud->addColumns([
            [
                'name' => 'active',
                'label' => 'Активность',
                'type' => 'boolean',
            ],
            [
                'name' => 'date',
                'label' => 'Дата',
                'type' => 'date',
            ],
            [
                'name' => 'category',
                'label' => 'Категория',
                'type' => 'relationship',
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
            ],
            [
                'name' => 'updated_at',
                'label' => 'Изменена',
                'type' => 'date',
            ],
            [
                'name' => 'created_at',
                'label' => 'Создана',
                'type' => 'date',
            ],
        ]);

        $this->crud->orderBy('created_at');
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(ArticlesRequest::class);

        $this->crud->addFields([
            [
                'name' => 'active',
                'label' => 'Активность',
                'type' => 'boolean',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-3',
                ],
            ],
            [
                'name' => 'time_read',
                'label' => 'Время прочтения',
                'type' => 'number',
                'hint' => 'в минутах',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-3',
                ],
            ],
            [
                'name' => 'category_id',
                'label' => 'Категория',
                'type' => 'select2',
                'entity' => 'category',
                'attribute' => 'title',
                'allows_null' => false,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
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
                'attribute' => 'email',
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
                'name' => 'content_preview',
                'label' => 'Анонс для списка',
                'type' => 'textarea',
            ],
            [
                'name' => 'content',
                'label' => 'Текст статьи',
                'type' => 'summernote',
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'browse',
                'hint' => ''
            ],
            [
                'label' => 'Теги',
                'type' => "relationship",
                'name' => 'tags',
                'ajax' => true,
                'inline_create' => [
                    'entity' => 'articlestags'
                ],
            ],
            [
                'name' => 'separator',
                'type' => 'custom_html',
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
        ]);
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function fetchTags()
    {
        return $this->fetch(ArticlesTags::class);
    }
}
