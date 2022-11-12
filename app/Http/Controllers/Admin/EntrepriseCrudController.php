<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EntrepriseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EntrepriseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EntrepriseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Entreprise::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/entreprise');
        CRUD::setEntityNameStrings('entreprise', 'entreprises');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns
        CRUD::addColumn(['name' => 'nom', 'type' => 'text', 'label'=>"Nom"]);
        CRUD::addColumn(['name' => 'secteurActivite', 'type' => 'text', 'label'=>"Secteur d'activité"]);
        CRUD::addColumn(['name' => 'adresse', 'type' => 'text', 'label'=>"Adresse"]);
        $this->crud->addColumn([
            'name' => 'id_user',
            'type' => 'select',
            'label' => 'Admin attitré',
            'entity' => 'users',
            'attribute' => 'name',
            'model' => 'App\Models\Users'
        ]);
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
        CRUD::setValidation(EntrepriseRequest::class);

        // CRUD::setFromDb(); // fields
        CRUD::addField(['name' => 'nom', 'type' => 'text', 'label'=>"Nom"]);
        CRUD::addField(['name' => 'secteurActivite', 'type' => 'text', 'label'=>"Secteur d'activité"]);
        CRUD::addField(['name' => 'adresse', 'type' => 'text', 'label'=>"Adresse du siège"]);
        // CRUD::addField(['name' => 'id_user', 'type' => 'text', 'label'=>"Admin attitré"]);
        $this->crud->addField([
            'name' => 'id_user',
            'type' => 'select2',
            'label' => 'Admin attitré',
            // 'entity' => 'produits',
            'attribute' => 'name',
            'model' => 'App\Models\Users',
            /*'options'   => (function ($query) {


// dd(\DB::table('model_has_roles')->where("model_id","users.id")->first()->role_id==2);
                    // return \DB::table('model_has_roles')->where("model_id",6)->first()->role_id==2?

                    // >where('users.id','users.id')->get():$query->get();

                    $query->where('id', function($query)
                {
                    // dd('users.id');
                    $query->select(\DB::raw('*'))
                          ->from('model_has_roles')
                          ->whereRaw('model_has_roles.role_id = users.id');
                })->get();
            }),*/
            // 'searchLogic'   => function ($query, $column, $searchTerm) {
            //     $query->Where('email', 'like', '%'.$searchTerm.'%');
            //     // $query->orWhere('text', 'like', '%'.$searchTerm.'%');
            // },
        ]);

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
