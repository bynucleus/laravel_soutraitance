@extends('backpack::layouts.top_left')
@section('content')
    <div id="app">

        <div class="container-fluid">
            <main class="main mt-2">
                <nav aria-label="breadcrumb" class="d-none d-lg-block">
                    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                        <li class="breadcrumb-item text-capitalize">Fiche de temps</li>
                        <li class="breadcrumb-item text-capitalize active" aria-current="page">
                            <a href="#">Liste</a>
                        </li>
                    </ol>
                </nav>
            </main>
            <div class="card bg-white p-4">
                <div class="row">
                    <div class="col-12 text-">
                        <h3 class="text-primary">RENSEIGNER VOTRE FEUILLE DE TEMPS
                            <small><a href="/admin/feuille_temps/{{$mission->id}}/semaine" class="d-print-none font-sm"><i class="la la-angle-double-left"></i> Retour à la liste des <span>feuilles de temps</span></a></small>
                        </h3>
                        {{-- <small class="text-black-50">Numero de la fiche #h </small> --}}
                    </div>

                    {{-- <div class="col-6">
                        <div class="d-flex justify-content-end pb-3 pl-2">
                            <select id="select" class="select" style="float: right">
                                <option label="... Actions">
                                </option>
                                <option label="Valider la fiche" value="0">
                                </option>
                                <option label="annuler" value="1">
                                </option>

                            </select>
                        </div>
                    </div> --}}

                </div>

                @php

                    function datediffInWeeks($date1, $date2)
                    {
                        if ($date1 > $date2) {
                            return datediffInWeeks($date2, $date1);
                        }
                        $first = DateTime::createFromFormat('Y-m-d', $date1);
                        $second = DateTime::createFromFormat('Y-m-d', $date2);
                        return floor($first->diff($second)->days / 7);
                    }

                    $ns = datediffInWeeks($mission->date_debut, $mission->date_fin);
                    // var_dump(datediffInWeeks($mission->date_debut, $mission->date_fin));// 21
                @endphp
                <div class="row">
                    <div class="col-md-6 mt-2 text-left">
                        <h4>consultant : {{ backpack_user()->name }}</h4>

                    </div>



                </div>
                <br>
                {{-- <select id="select" class="select" style="float: right">
                    <option label="Selectionner la semaine">
                    </option>
                    @for ($i = 0; $i < $ns; $i++)
                        <option label="semaine {{ $i + 1 }}" value="{{ $i + 1 }}">
                        </option>
                    @endfor
                </select> <br> --}}
                @php
                    $ac = \DB::table('feuille_temps')
                        ->where('date_debut', date('Y-m-d', strtotime(request()->debut)))
                        ->where('id_mission', $mission->id)
                        ->first();

                    $etat = $ac == null ? 'non soumis' : $ac->etat;
                @endphp
                <span>
                    Etat : {{ $etat }}</span>
                <span>
                    Semaine
                    du {{ request()->debut }} au {{ request()->fin }}</span>
                <br>

                <span class="text-grey">*H : Heures</span>
                <div class="row  bg-white mt-2">
                    <div class="col-12">
                        <form id="form" action="{{ route('save_feuille') }}" method="post">
                            <input type="hidden" name="debut" value="{{ request()->debut }}">
                            <input type="hidden" name="fin" value="{{ request()->fin }}">
                            <input type="hidden" name="id_mission" value="{{ $mission->id }}">

                            <input type="hidden" id="methode" name="methode" value="enregistrer">
                            @csrf
                            <table class="table table-bordered w-100">
                                <tr>
                                    <th>Lundi</th>
                                    <!-- <th>Boutique</th> -->
                                    <th>Mardi</th>
                                    <th>Mercredi</th>
                                    <th>Jeudi</th>
                                    <th>Vendredi</th>
                                    <th>Samedi</th>
                                    <th>Dimanche</th>
                                    {{-- <th>Action</th> --}}
                                </tr>

                                @for ($i = 0; $i < 3; $i++)
                                    <tr>
                                        {{-- pour les lundis --}}
                                        <td>
                                            <select name="code_lundi{{ $i + 1 }}" id="code" style="width:100%">

                                                @foreach (\DB::table('caract_renum')->get() as $cr)
                                                    <option value="{{ $cr->code }}"
                                                        @if ($ac == null) @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif @else
                                                        @php
                                                            $enreg=\DB::table('enregistrement')
                                                                ->where('id_feuille_temps', $ac->id)
                                                                ->where("date",date('Y-m-d', strtotime(request()->debut . ' +0 days')))
                                                                ->first();
                                                        @endphp
                                                        @if ($cr->code == $enreg->code_renumeration) selected @endif @endif
                                                        >
                                                        {{ $cr->code }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <input name="hre_lundi{{ $i + 1 }}" id="hre"
                                                @if ($ac == null) value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                                @else value="{{ $i == 0 ? $enreg->nbre_heure : '' }}"
                                                @endif
                                                type="text" placeholder="nbre d'heure"
                                                onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                                style="text-align:center;font-size:18px;width:40%">

                                            <label for="hre">H</label>

                                        </td>

                                        {{-- pour les mardis --}}
                                        <td>
                                            <select name="code_mardi{{ $i + 1 }}" id="code" style="width:100%">

                                                @foreach (\DB::table('caract_renum')->get() as $cr)
                                                <option value="{{ $cr->code }}"
                                                    @if ($ac == null) @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif @else
                                                    @php
                                                        $enreg=\DB::table('enregistrement')
                                                            ->where('id_feuille_temps', $ac->id)
                                                            ->where("date",date('Y-m-d', strtotime(request()->debut . ' +1 days')))
                                                            ->first();
                                                    @endphp
                                                    @if ($cr->code == $enreg->code_renumeration) selected @endif @endif
                                                    >
                                                    {{ $cr->code }}
                                                </option>
                                            @endforeach

                                            </select>
                                            <input name="hre_mardi{{ $i + 1 }}" id="hre"
                                                 @if ($ac == null) value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                                @else value="{{ $i == 0 ? $enreg->nbre_heure : '' }}"
                                                @endif
                                                type="text" placeholder="nbre d'heure"
                                                onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                                style="text-align:center;font-size:18px;width:40%">

                                            <label for="hre">H</label>

                                        </td>

                                        {{-- pour les mercredis --}}
                                        <td>
                                            <select name="code_mercredi{{ $i + 1 }}" id="code" style="width:100%">

                                               @foreach (\DB::table('caract_renum')->get() as $cr)
                                                    <option value="{{ $cr->code }}"
                                                        @if ($ac == null) @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif @else
                                                        @php
                                                            $enreg=\DB::table('enregistrement')
                                                                ->where('id_feuille_temps', $ac->id)
                                                                ->where("date",date('Y-m-d', strtotime(request()->debut . ' +2 days')))
                                                                ->first();
                                                        @endphp
                                                        @if ($cr->code == $enreg->code_renumeration) selected @endif @endif
                                                        >
                                                        {{ $cr->code }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <input name="hre_mercredi{{ $i + 1 }}" id="hre"
                                                @if ($ac == null) value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                                @else value="{{ $i == 0 ? $enreg->nbre_heure : '' }}"
                                                @endif
                                                type="text" placeholder="nbre d'heure"
                                                onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                                style="text-align:center;font-size:18px;width:40%">

                                            <label for="hre">H</label>

                                        </td>

                                        {{-- pour les jeudis --}}
                                        <td>

                                            <select name="code_jeudi{{ $i + 1 }}" id="code" style="width:100%">
                                                @foreach (\DB::table('caract_renum')->get() as $cr)
                                                    <option value="{{ $cr->code }}"
                                                        @if ($ac == null) @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif @else
                                                        @php
                                                            $enreg=\DB::table('enregistrement')
                                                                ->where('id_feuille_temps', $ac->id)
                                                                ->where("date",date('Y-m-d', strtotime(request()->debut . ' +3 days')))
                                                                ->first();
                                                        @endphp
                                                        @if ($cr->code == $enreg->code_renumeration) selected @endif @endif
                                                        >
                                                        {{ $cr->code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input name="hre_jeudi{{ $i + 1 }}" id="hre"
                                                @if ($ac == null) value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                                @else value="{{ $i == 0 ? $enreg->nbre_heure : '' }}"
                                                @endif
                                                type="text" placeholder="nbre d'heure"
                                                onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                                style="text-align:center;font-size:18px;width:40%">

                                            <label for="hre">H</label>

                                        </td>

                                        {{-- pour les vendredi --}}
                                        <td>

                                            <select name="code_vendredi{{ $i + 1 }}" id="code" style="width:100%">
                                                @foreach (\DB::table('caract_renum')->get() as $cr)
                                                    <option value="{{ $cr->code }}"
                                                        @if ($ac == null) @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif @else
                                                        @php
                                                            $enreg=\DB::table('enregistrement')
                                                                ->where('id_feuille_temps', $ac->id)
                                                                ->where("date",date('Y-m-d', strtotime(request()->debut . ' +4 days')))
                                                                ->first();
                                                        @endphp
                                                        @if ($cr->code == $enreg->code_renumeration) selected @endif @endif
                                                        >
                                                        {{ $cr->code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input name="hre_vendredi{{ $i + 1 }}" id="hre"
                                                @if ($ac == null) value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                                @else value="{{ $i == 0 ? $enreg->nbre_heure : '' }}"
                                                @endif
                                                type="text" placeholder="nbre d'heure"
                                                onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                                style="text-align:center;font-size:18px;width:40%">

                                            <label for="hre">H</label>
                                        </td>

                                        {{-- pour les samedis --}}
                                        <td>

                                            <select name="code_samedi{{ $i + 1 }}" id="code" style="width:100%">
                                                @foreach (\DB::table('caract_renum')->get() as $cr)
                                                    <option value="{{ $cr->code }}"
                                                        @if ($ac == null) @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif @else
                                                        @php
                                                            $enreg=\DB::table('enregistrement')
                                                                ->where('id_feuille_temps', $ac->id)
                                                                ->where("date",date('Y-m-d', strtotime(request()->debut . ' +5 days')))
                                                                ->first();
                                                        @endphp
                                                        @if ($cr->code == $enreg->code_renumeration) selected @endif @endif
                                                        >
                                                        {{ $cr->code }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <input name="hre_samedi{{ $i + 1 }}" id="hre"
                                                @if ($ac == null) value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                                @else value="{{ $i == 0 ? $enreg->nbre_heure : '' }}"
                                                @endif
                                                type="text" placeholder="nbre d'heure"
                                                onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                                style="text-align:center;font-size:18px;width:40%">

                                            <label for="hre">H</label>

                                        </td>

                                        {{-- pour les dimanches --}}
                                        <td>

                                            <select name="code_dimanche{{ $i + 1 }}" id="code" style="width:100%">
                                                @foreach (\DB::table('caract_renum')->get() as $cr)
                                                    <option value="{{ $cr->code }}"
                                                        @if ($ac == null) @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif @else
                                                        @php
                                                            $enreg=\DB::table('enregistrement')
                                                                ->where('id_feuille_temps', $ac->id)
                                                                ->where("date",date('Y-m-d', strtotime(request()->debut . ' +6 days')))
                                                                ->first();
                                                        @endphp
                                                        @if ($cr->code == $enreg->code_renumeration) selected @endif @endif
                                                        >
                                                        {{ $cr->code }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <input name="hre_dimanche{{ $i + 1 }}" id="hre"
                                                @if ($ac == null) value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                                @else value="{{ $i == 0 ? $enreg->nbre_heure : '' }}"
                                                @endif
                                                type="text" placeholder="nbre d'heure"
                                                onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                                style="text-align:center;font-size:18px;width:40%">

                                            <label for="hre">H</label>

                                        </td>



                                    </tr>
                                @endfor
                            </table>
                        </form>
                    </div>
                </div>
                <center>
                    <button id="enreg" onclick="enreg('enregistrer')" class="btn btn-outline-dark">Enregistrer</button>
                    <button onclick="enreg('soumis')" class="btn btn-primary">Soumettre</button>

                </center>

            </div>
        </div>

    </div>
    <script>
        function enreg($v) {

            document.getElementById("methode").value=$v;
            document.getElementById("form").submit();
        }
    </script>

    <style>
        .select {
            /* padding: 10px 20px 10px 40px; */

            background-color: #FFF;
            background-image: none;
            border-radius: 4px;
            border: 1px solid #DCDFE6;
            box-sizing: border-box;
            color: #606266;
            display: inline-block;
            font-size: inherit;
            height: 40px;
            width: 250px;

            /* line-height: 40px; */
            outline: 0;
            /* padding: 0 15px; */
            /* padding-right: 15px; */
            transition: border-color .2s cubic-bezier(.645, .045, .355, 1);
            cursor: pointer;
        }
    </style>
@endsection
