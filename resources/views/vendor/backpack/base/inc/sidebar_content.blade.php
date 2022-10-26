<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@if(backpack_user()->hasRole('admin'))
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('sliders') }}'><i class='nav-icon la la-images'></i> Sliders</a></li> --}}
@else
    {{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('/partenaire/commandes') }}'><i class="nav-icon la la-first-order"></i>&nbsp; commandes</a></li> --}}
    {{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('/v/#/partenaire/commandes') }}'><i class="nav-icon la la-first-order"></i>&nbsp; commandes</a></li> --}}
@endif
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('messages') }}'><i class='nav-icon la la-sms'></i> Messages Défilant</a></li> --}}
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('bonreductions') }}'><i class="las la-money-bill-wave"></i>&nbsp; Bon de Reductions</a></li> -->


<li class="nav-title">Gestion Entreprise</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('entreprise') }}'><i class='nav-icon la la-building'></i> Entreprises</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('consultant') }}'><i class='nav-icon la la-user-friends'></i> Consultants</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('mission') }}'><i class='nav-icon la la-user-graduate'></i> Missions</a></li>
<li class="nav-title">Gestion Facture</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('facture') }}'><i class='nav-icon la la-book'></i> Factures</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('comptabilisation') }}'><i class='nav-icon la la-dollar'></i> Comptabilisations</a></li>

{{-- <li class="nav-title">Paramètres de base</li> --}}
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('marques') }}'><i class="las la-registered"></i> Marques</a></li> --}}
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('couleurs') }}'><i class='nav-icon la la-palette'></i> Couleurs</a></li> --}}
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('villes') }}'><i class="las la-city"></i> Villes</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('communes') }}'><i class="las la-city"></i> Communes</a></li> --}}



<!-- Users, Roles, Permissions -->


@if(backpack_user()->hasRole('admin'))
<li class="nav-title">Paramètres utilisateurs</li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Admins</span></a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-edit'></i> <span>Settings</span></a></li> --}}
@endif


