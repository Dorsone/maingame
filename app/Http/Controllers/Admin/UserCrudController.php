<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }


    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/user');
        CRUD::setEntityNameStrings('Пользователя', 'Пользователи');
    }


    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'username',
                'label' => 'Имя',
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'label' => 'email',
                'type' => 'text',
            ],
        ]);

        $this->crud->orderBy('id');

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(UsersCreateRequest::class);
        $this->userFields();
    }


    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(UsersUpdateRequest::class);
        $this->userFields();
    }

    protected function userFields()
    {
        $this->crud->addFields([
            [
                'username' => 'username',
                'label' => 'Имя пользователя',
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
            ],
            [
                'name' => 'description',
                'label' => 'Об авторе',
                'type' => 'textarea',
            ],
            [
                'name' => 'image',
                'label' => 'Аватар',
                'type' => 'image',
                'crop' => true,
                'aspect_ratio' => 1,
            ],
            [
                'name' => 'interests',
                'label' => 'Интересы',
                'type' => 'table',
                'entity_singular' => 'Строку',
                'columns' => [
                    'title' => 'Название',
                ],
            ],
            [
                'name' => 'password',
                'label' => 'Пароль',
                'type' => 'password',
            ],
            [
                'name' => 'password_confirmation',
                'label' => 'Пароль еще раз',
                'type' => 'password',
            ]
        ]);
    }

    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->editPasswordInput($this->crud->getRequest()));
        $this->crud->unsetValidation();

        return $this->traitStore();
    }

    public function update()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->editPasswordInput($this->crud->getRequest()));
        $this->crud->unsetValidation();

        return $this->traitUpdate();
    }

    protected function editPasswordInput($request)
    {
        $request->request->remove('password_confirmation');

        if ($request->input('password')) {
            $request->request->set('password', \Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }
}
