<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MissionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MissionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MissionCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Mission::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mission');
        CRUD::setEntityNameStrings('mission', 'missions');
        $user = backpack_user()->hasRole('consultant');
        if ($user) {
            $consultant = \DB::table('consultant')->where('emailPerso',backpack_user()->email)->first();
            $id = $consultant->id;
            // dd($id);
            $this->crud->addClause('where', 'id_consultant', '=', $id);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */

    protected function setupListOperation()
    {
        $this->crud->addButtonFromModelFunction('line', 'feuille', 'openFeuille', '');
        $this->crud->addColumn([
            'name' => 'date_debut',
            'type' => 'date',
            'label' => 'Date de debut',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addColumn([
            'name' => 'date_fin',
            'type' => 'date',
            'label' => 'Date de fin',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addColumn([
            'name' => 'id_entreprise_conseil',
            'type' => 'select',
            'label' => 'Entreprise Conseil',
            'entity' => 'entreprisesco',
            'attribute' => 'nom',
            'model' => 'App\Models\Entreprise',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addColumn([
            'name' => 'id_entreprise_cliente',
            'type' => 'select',
            'label' => 'Entreprise Cliente',
            'entity' => 'entreprisescl',
            'attribute' => 'nom',
            'model' => 'App\Models\Entreprise',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addColumn([
            'name' => 'id_consultant',
            'type' => 'select',
            'label' => 'Consultant',
            'entity' => 'consultants',
            'attribute' => 'nom',
            'model' => 'App\Models\Consultant',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        CRUD::addColumn(
            [
                'name' => 'base_calcul', 'type' => 'select_from_array',
                'label' => "Base de calcul de rénumeration ", 'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
                'options' => ["heure" => "Heure", "jour" => "Jour", "mois" => "Mois", "annee" => "Année"],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6 '
                ],
            ]
        );




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
        CRUD::setValidation(MissionRequest::class);

        // CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name' => 'date_debut',
            'type' => 'date',
            'label' => 'Date de debut',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name' => 'date_fin',
            'type' => 'date',
            'label' => 'Date de fin',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name' => 'id_entreprise_conseil',
            'type' => 'select2',
            'label' => 'Entreprise Conseil',
            // 'entity' => 'produits',
            'attribute' => 'nom',
            'model' => 'App\Models\Entreprise',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name' => 'id_entreprise_cliente',
            'type' => 'select2',
            'label' => 'Entreprise Cliente',
            // 'entity' => 'produits',
            'attribute' => 'nom',
            'model' => 'App\Models\Entreprise',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name' => 'id_consultant',
            'type' => 'select2',
            'label' => 'Consultant',
            // 'entity' => 'produits',
            'attribute' => 'nom',
            'model' => 'App\Models\Consultant',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        CRUD::addField(
            [
                'name' => 'base_calcul', 'type' => 'select_from_array',
                'label' => "Base de calcul de rénumeration ", 'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
                'options' => ["heure" => "Heure", "jour" => "Jour", "mois" => "Mois", "annee" => "Année"],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6 '
                ],
            ]
        );

        $this->crud->addField([
            'name' => 'id_devise',
            'type' => 'select2',
            'label' => 'Devise renumeration',
            // 'entity' => 'produits',
            'attribute' => 'libelle',
            'model' => 'App\Models\Devises',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name' => 'poste',
            'type' => 'text',
            'label' => 'poste',

            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name' => 'description_poste',
            'type' => 'text',
            'label' => 'Description du Poste',

            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name' => 'nbre_heure',
            'type' => 'text',
            'label' => 'Nbre d\'heures légales de travail par jour',

            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        $this->crud->addField([
            'name' => 'code_t',
            'type' => 'text',
            'label' => 'Code renumeration jour de travail',
            'type' => 'select2',
            'attribute' => 'code',
            'model' => 'App\Models\CaractRenum',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],

        ]);
        $this->crud->addField([
            'name' => 'code_nt',
            'type' => 'text',
            'label' => 'Code renumeration jour de repos',
            'type' => 'select2',
            'attribute' => 'code',
            'model' => 'App\Models\CaractRenum',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],

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
