<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ConsultantRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ConsultantCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ConsultantCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Consultant::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/consultant');
        CRUD::setEntityNameStrings('consultant', 'consultants');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns'
        CRUD::addColumn(['name' => 'nom', 'type' => 'text','label'=>'Nom & Prenoms' ]);
        CRUD::addColumn(['name' => 'poste', 'type' => 'text','label'=>'Poste ' ]);
        CRUD::addColumn(['name' => 'emailprof', 'type' => 'text','label'=>'EmailPro ' ]);
        CRUD::addColumn(['name' => 'contact', 'type' => 'text','label'=>'Contact ' ]);
        CRUD::addColumn(['name' => 'adresse', 'type' => 'text','label'=>'Adresse ' ]);
        // CRUD::addColumn(['name' => 'numero_cni', 'type' => 'text','label'=>'CNI' ]);
        // CRUD::addColumn(['name' => 'cv', 'type' => 'text','label'=>'Cv' ]);






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
        CRUD::setValidation(ConsultantRequest::class);

        // CRUD::setFromDb(); // fields

        CRUD::addField(['name' => 'nom', 'type' => 'text','label'=>'Nom & Prenoms' ]);
        CRUD::addField(['name' => 'emailperso', 'type' => 'text','label'=>'Email Personnel ' ,'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],]);
        CRUD::addField(['name' => 'emailprof', 'type' => 'text','label'=>'Email Professionel ','wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ], ]);
        CRUD::addField(['name' => 'poste', 'type' => 'text','label'=>'Poste ' ,'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],]);
        CRUD::addField(['name' => 'contact', 'type' => 'number','label'=>'Contact ' ,'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],]);
        CRUD::addField(['name' => 'adresse', 'type' => 'text','label'=>'Adresse ' ,'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],]);
        CRUD::addField(['name' => 'paysd', 'type' => 'text','label'=>"Pays d'origine " ,'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],]);
        CRUD::addField(['name' => 'typepiece', 'type' => 'select_from_array','label'=>"Piéce d'identité " ,'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],
        'options' => ["CNI"=>"CNI","PassPort"=>"PassPort","Attestation"=>"Attestation", ]
    ]);
        CRUD::addField(['name' => 'npiece', 'type' => 'text','label'=>"Numéro de la Pièce " ,'wrapperAttributes' => [
            'class' => 'form-group col-md-6'

        ],]);
        CRUD::addField(['name' => 'daten', 'type' => 'date','label'=>"Date de Naissance " ,'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],]);
        //

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
