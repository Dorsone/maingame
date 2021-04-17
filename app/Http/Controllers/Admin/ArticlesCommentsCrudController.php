<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticlesCommentsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class ArticlesCommentsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\ArticlesComments::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/articlescomments');
        CRUD::setEntityNameStrings('Комментарий', 'Комментарии');
    }


    protected function setupListOperation()
    {
        $this->crud->addFilter([
            'type' => 'simple',
            'name' => 'active',
            'label' => 'Не проверенные'
        ],
            false,
            function ($values) {
                $this->crud->addClause('where', 'active', false);
            });

        $this->crud->addColumns([
            [
                'name' => 'active',
                'label' => 'Активность',
                'type' => 'boolean',
            ],
            [
                'name' => 'article',
                'label' => 'Статья',
                'type' => 'relationship',
            ],
            [
                'name' => 'name',
                'label' => 'Имя',
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'label' => 'email',
                'type' => 'text',
            ],
            [
                'name' => 'comment',
                'label' => 'Коммент',
                'type' => 'text',
            ],
            [
                'name' => 'answer',
                'label' => 'Ответ',
                'type' => 'text',
            ],
        ]);

        $this->crud->orderBy('created_at', 'desc');
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(ArticlesCommentsRequest::class);

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
                'name' => 'article_id',
                'entity' => 'article',
                'label' => 'Статья',
                'type' => 'relationship',
            ],
            [
                'name' => 'name',
                'label' => 'Имя',
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
            ],
            [
                'name' => 'comment',
                'label' => 'Коммент',
                'type' => 'textarea',
            ],
            [
                'name' => 'answer',
                'label' => 'Ответ',
                'type' => 'textarea',
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
