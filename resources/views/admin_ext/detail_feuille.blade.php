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
                        <h2 class="text-primary">RENSEIGNER VOTRE FEUILLE DE TEMPS</h2>
                        <small class="text-black-50">Numero de la fiche #h </small>
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
                <span>
                    Semaine
                    du {{ request()->debut }} au {{ request()->fin }}</span>
                <br>
                <span class="text-grey">*H : Heures</span>
                <div class="row  bg-white mt-2">
                    <div class="col-12">
                        <form id="form" action="{{route('save_feuille')}}" method="post">
                            <input type="hidden" name="debut" value="{{request()->debut}}">
                            <input type="hidden" name="fin" value="{{request()->fin}}">
                            <input type="hidden" name="id_mission" value="{{$mission->id}}">
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

                            @for ($i = 0; $i <= 3; $i++)
                                <tr>

                                    <td>
                                        <select name="code_lundi{{$i+1}}" id="code" style="width:100%">
                                            {{-- <option label="...">
                                            </option> --}}
                                            @foreach (\DB::table('caract_renum')->get() as $cr)
                                                <option
                                                value="{{ $cr->code }}"
                                                @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif
                                                    >
                                                    {{ $cr->code }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input name="hre_lundi{{$i+1}}" id="hre" value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                            type="text" placeholder="nbre d'heure"
                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                            style="text-align:center;font-size:18px;width:40%">
                                        <label for="hre">H</label>
                                    </td>
                                    <td>
                                        <select name="code_mardi{{$i+1}}" id="code" style="width:100%">
                                            {{-- <option label="...">
                                            </option> --}}
                                            @foreach (\DB::table('caract_renum')->get() as $cr)
                                                <option @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif
                                                    value="{{ $cr->code }}">
                                                    {{ $cr->code }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input name="hre_mardi{{$i+1}}" id="hre" value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                            type="text" placeholder="nbre d'heure"
                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                            style="text-align:center;font-size:18px;width:40%">
                                        <label for="hre">H</label>
                                    </td>
                                    <td>
                                        <select name="code_mercredi{{$i+1}}" id="code" style="width:100%">
                                            {{-- <option label="...">
                                            </option> --}}
                                            @foreach (\DB::table('caract_renum')->get() as $cr)
                                                <option @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif
                                                    value="{{ $cr->code }}">
                                                    {{ $cr->code }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input name="hre_mercredi{{$i+1}}" id="hre" value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                            type="text" placeholder="nbre d'heure"
                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                            style="text-align:center;font-size:18px;width:40%">
                                        <label for="hre">H</label>
                                    </td>
                                    <td>

                                        <select name="code_jeudi{{$i+1}}" id="code" style="width:100%">
                                            {{-- <option label="...">
                                            </option> --}}
                                            @foreach (\DB::table('caract_renum')->get() as $cr)
                                                <option @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif
                                                    value="{{ $cr->code }}">
                                                    {{ $cr->code }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input name="hre_jeudi{{$i+1}}" id="hre" value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                            type="text" placeholder="nbre d'heure"
                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                            style="text-align:center;font-size:18px;width:40%">
                                        <label for="hre">H</label>
                                    </td>
                                    <td>

                                        <select name="code_vendredi{{$i+1}}" id="code" style="width:100%">
                                            {{-- <option label="...">
                                            </option> --}}
                                            @foreach (\DB::table('caract_renum')->get() as $cr)
                                                <option @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif
                                                    value="{{ $cr->code }}">
                                                    {{ $cr->code }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input name="hre_vendredi{{$i+1}}" id="hre" value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                            type="text" placeholder="nbre d'heure"
                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                            style="text-align:center;font-size:18px;width:40%">
                                        <label for="hre">H</label>
                                    </td>
                                    <td>

                                        <select name="code_samedi{{$i+1}}" id="code" style="width:100%">
                                            {{-- <option label="...">
                                            </option> --}}
                                            @foreach (\DB::table('caract_renum')->get() as $cr)
                                                <option @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif
                                                    value="{{ $cr->code }}">
                                                    {{ $cr->code }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input name="hre_samedi{{$i+1}}" id="hre" value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
                                            type="text" placeholder="nbre d'heure"
                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="mt-2"
                                            style="text-align:center;font-size:18px;width:40%">
                                        <label for="hre">H</label>
                                    </td>
                                    <td>

                                        <select name="code_dimanche{{$i+1}}" id="code" style="width:100%">
                                            {{-- <option label="...">
                                            </option> --}}
                                            @foreach (\DB::table('caract_renum')->get() as $cr)
                                                <option @if ($i == 0 && $cr->code == $mission->code_t) selected @endif
                                                    @if ($i >= 1 && $cr->code == $mission->code_nt) selected @endif
                                                    value="{{ $cr->code }}">
                                                    {{ $cr->code }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input name="hre_dimanche{{$i+1}}" id="hre" value="{{ $i == 0 ? $mission->nbre_heure : '' }}"
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
                    <button id="enreg" onclick="enreg()" class="btn btn-outline-dark">Enregistrer</button>
                    <button class="btn btn-primary">Soumettre</button>

                </center>

            </div>
        </div>

    </div>
<script>
function enreg(){
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
