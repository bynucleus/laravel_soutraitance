@extends('backpack::layouts.top_left')
@section('content')
    <div id="app">
        @php

            function getDayFr($jouren)
            {
                $jours = ['lundi' => 'monday', 'mardi' => 'tuesday', 'mercredi' => 'wednesday', 'jeudi' => 'thursday', 'vendredi' => 'friday', 'samedi' => 'saturday', 'dimanche' => 'sunday'];

                return array_search($jouren, $jours);
            }
            function getNumberD($jouren)
            {
                $jours = [1 => 'lundi', 2 => 'mardi', 3 => 'mercredi', 4 => 'jeudi', 5 => 'vendredi', 6 => 'samedi', 7 => 'dimanche'];

                return array_search($jouren, $jours);
            }

            function datediffInWeeks($date1, $date2)
            {
                // $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);

                // echo $formatter->format(strtotime($date1));
                // $date = DateTimeImmutable::createFromFormat('U', time());
                // echo $date->format('l-m-Y');
                if ($date1 > $date2) {
                    return datediffInWeeks($date2, $date1);
                }
                $first = DateTime::createFromFormat('d-m-Y', date('d-m-Y', strtotime($date1)));
                $second = DateTime::createFromFormat('d-m-Y', date('d-m-Y', strtotime($date2)));


                // $next_week = date('d/m/Y', strtotime('19-05-2014 +1 week')); // 26/05/2014
                // $next_week = strtotime('12-11-2022 +7 days');

                // $difference = $next_week - time(); // next weeks date minus todays date
                // $difference = date('j', $difference);
                // echo date('d-m-Y', time());

                // echo $difference . (($difference > 1) ? ' days ' : ' day ') . ' left';
                // should output: 1 day left

                return floor($first->diff($second)->days / 7);
            }
            // dd($mission);
            function calculweek($dated, $datef, $jour_semaine)
            {
                $nber_jour_semaine = getNumberD($jour_semaine); //number du 1 er jour de semaine de l'entr
    $dd = date('d-m-Y', strtotime($dated)); //date de debut
    $df = date('d-m-Y', strtotime($datef)); //date de debut
    $jd = getDayFr(strtolower(date('l', strtotime($dated)))); //jour de semaine de date de debut
    $nber_jd = getNumberD($jd);
    #on determine la premiere semaine
    $debut_1_semaine = $jd;
    $fin_1_semaine = date('d-m-Y', strtotime($debut_1_semaine . ' +6 days'));
    if ($jd != $jour_semaine) {
        if ($nber_jd > $nber_jour_semaine) {
            $dif = $nber_jd - $nber_jour_semaine;
            $debut_1_semaine = date('d-m-Y', strtotime($dd . ' -' . $dif . ' days'));

            $fin_1_semaine = date('d-m-Y', strtotime($debut_1_semaine . ' +6 days'));

            // dd(date('l',strtotime($fin_1_semaine)));
        }
    }
    $liste_semaine = [$debut_1_semaine => $fin_1_semaine];
    $fin_semaine = $fin_1_semaine;

    // dd(strtotime("07-11-2022") >strtotime($df));
    while (strtotime($fin_semaine) < strtotime($df)) {
        $debut_semaine = date('d-m-Y', strtotime($fin_semaine . ' +1 days'));
        $fin_semaine = date('d-m-Y', strtotime($debut_semaine . ' +6 days'));
                    $liste_semaine[$debut_semaine] = $fin_semaine;
                }
                // echo $dd;
                // echo $df;
                return $liste_semaine;
            }

            // $ns = datediffInWeeks($mission->date_debut, $mission->date_fin);
            $semaines = calculweek($mission->date_debut, $mission->date_fin, $mission->jour_debut_semaine);
            // var_dump(datediffInWeeks($mission->date_debut, $mission->date_fin)); // 21
        @endphp
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
                    <div class="col-6 text-left">
                        <h3 class="text-primary">FEUILLE DE TEMPS
                            <small><a href="/admin/mission" class="d-print-none font-sm"><i class="la la-angle-double-left"></i> Retour à la liste des <span>missions</span></a></small>

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
                    {{-- <div class="col-md-6 mt-2 ">
                        <h4>consultant : {{ backpack_user()->name }}</h4>
                        <div>

                            <div> <br>
                                <b> Information de la mission </b> <br>

                                <b>Date de debut </b> :{{ $mission->date_debut }} <br>
                                <b>Date de fin </b> :{{ $mission->date_fin }} <br>
                                <span>Nombre de semaine </span> :{{ $ns }} <br>
                            </div>

                        </div>
                    </div> --}}
                </div>


                <div class="row">




                </div>
                <br><br>
                <b> Information de la mission </b>
                <span>Date de debut  : {{ $mission->date_debut }}</span>

                <span>Date de fin : {{ $mission->date_fin }}</span>
                {{-- <span>Nombre de semaine : {{ datediffInWeeks($mission->date_debut, $mission->date_fin) }}</span> --}}

                {{-- @dd($details) --}}
                <br>
                <div class="row  bg-white mt-2">
                    <div class="col-12">
                        <table class="table table-bordered w-100">
                            <tr>
                                <th>Periode</th>
                                <!-- <th>Boutique</th> -->
                                <th>Total Heures</th>

                                <th>Etat</th>
                                {{-- <th>Approbateur suivant</th> --}}
                                <th>Commentaires</th>
                                <th>Action</th>

                            </tr>
                            @foreach (array_keys($semaines) as $semaine)
                                @php
                                    $ac = \DB::table('feuille_temps')
                                        ->where('date_debut', date('Y-m-d', strtotime($semaine)))
                                        ->where('id_mission',$mission->id)
                                        ->first();
                                    // dd($ac==null);
                                    $etat = $ac == null ? 'non soumis' : $ac->etat;
                                @endphp
                                <tr>
                                    <td>du {{ $semaine }} au {{ $semaines[$semaine] }}</td>
                                    <td></td>
                                    <td>{{ $etat }}</td>
                                    <td></td>
                                    <td>
                                        <a href="/admin/feuille_temps/{{$mission->id}}/details?debut={{$semaine}}&fin={{ $semaines[$semaine] }}">

                                            <i class="la la-edit"></i> editer
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                {{-- <center>
                    <button class="btn btn-outline-dark">Enregistrer</button>
                    <button class="btn btn-primary">Soumettre</button>

                </center> --}}

            </div>
        </div>

    </div>
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
