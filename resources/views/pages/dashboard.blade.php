@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <!-- <div class="alert alert-warning" role="alert">
            <strong>Warning!</strong> This is a warning alert—check it out!
        </div> -->
    {{--<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>Warning!</strong> This is a warning alert—check it out!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>--}}
    <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Patients</p>
                                <h5 class="font-weight-bolder">
                                    {{ $patients }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow-primary text-center rounded-circle">
                                <i class="fa-solid fa-hospital-user text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Scheduled Patients</p>
                                <h5 class="font-weight-bolder">
                                    {{ $schedule }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-xl-12 col-md-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <h6 class="font-weight-bolder text-uppercase pb-0 mb-0">YEAR {{ now()->year }} FORECAST</h6>
                        <small class="mt-0">highest probability rate of illness this year</small>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">JAN <i class="fa fa-eye"></i></p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">FEB <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">MAR <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">APR <i class="fa fa-eye"></i></p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">MAY <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">JUN <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">JUL <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">AUG <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">SEPT <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">OCT <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">NOV <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xs-4 col-sm-12 col-mb-3 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">DEC <i class="fa fa-eye"></i>
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            {{ $inventory['cardiac-drugs'] }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-xl-12 col-md-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <h6 class="font-weight-bolder text-uppercase">Inventory</h6>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Cardiac Drugs
                                                </p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $inventory['cardiac-drugs'] }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div
                                                class="icon icon-shape bg-gradient-info shadow-primary text-center rounded-circle">
                                                <i class="fa-solid fa-pills text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Antibiotics</p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $inventory['antibiotics'] }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div
                                                class="icon icon-shape bg-gradient-info shadow-primary text-center rounded-circle">
                                                <i class="fa-solid fa-capsules text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Ear Meds</p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $inventory['ear-meds'] }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div
                                                class="icon icon-shape bg-gradient-info shadow-primary text-center rounded-circle">
                                                <i class="fa-solid fa-tablets text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Topicals</p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $inventory['topicals'] }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div
                                                class="icon icon-shape bg-gradient-info shadow-primary text-center rounded-circle">
                                                <i class="fa-solid fa-prescription text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                                    Anti-Inflammatory</p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $inventory['anti-inflammatory'] }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div
                                                class="icon icon-shape bg-gradient-info shadow-primary text-center rounded-circle">
                                                <i class="fa-solid fa-prescription-bottle text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="font-weight-bolder text-uppercase">Top Five Illness</h6>
                    {{--<div class="col-3 float-right">
                        @component('components.inputs.select')
                        @slot('label', 'Year')
                        @slot('options', ["2021" => '2021', "2022" => '2022'])
                        @slot('attributes', [
                        'class' => 'form-control',
                        'name' => 'illness_year',
                        'id' => 'illness_year',
                        'value' => '',
                        'placeholder' => 'Select'
                        ])
                        @endcomponent
                    </div>--}}
                    <div id="topFiveIllnessChart" class="mx-auto"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <h6 class="font-weight-bolder text-uppercase">Top 5 Most Used Medicines</h6>
                    </div>
                    <div id="topFiveMedsChart" class="mx-auto d-flex justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row mb-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="columnchart_material" class="mx-auto" style="width: 730px; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="piechart" class="mx-auto" style="width: 770px; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div> -->
</div>
@endsection

@push('js')
<script type="text/javascript">
    drawChartBar();
    drawChartPie();
    function drawChartBar() {

        // const illnesses = JSON.parse('{!! $illnesses !!}');
        // var illnessNameArr = [];
        // var illnessCountArr = [];

        // illnesses.forEach(element => {
        //     var newIllnessNameArr = [`${element.main_reason_for_consultation}`]
        //     var newIllnessCountArr = [parseInt(`${element.illnessCount}`)]

        //     illnessNameArr.push(newIllnessNameArr)
        //     illnessCountArr.push(newIllnessCountArr)
        // })

        // const flatIllnessNameArr = illnessNameArr.flat(1);
        // const flatIllnessCountArr = illnessCountArr.flat(1);

        // console.log(flatIllnessNameArr, flatIllnessCountArr)


        // var dataBar = google.visualization.arrayToDataTable([
        //     ['Year', ...flatIllnessNameArr],
        //     ['2022', ...flatIllnessCountArr]
        // ]);

        // var optionsBar = {
        //     chart: {
        //         title: 'Patient with Illness Forecast',
        //         subtitle: 'Low, Medium and Severe Cases: 2022',
        //     }
        // };

        // var chartBar = new google.charts.Bar(document.getElementById('columnchart_material'));

        // chartBar.draw(dataBar, google.charts.Bar.convertOptions(optionsBar));





        var options = {
        chart: {
            height: 350,
            type: 'area'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        markers: {
            size: 5,
        },
        series: [
            {
                name: 'Sore Throat',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, 
            {
                name: 'Asthma',
                data: [11, 32, 20, 32, 34, 52, 41]
            }, 
            {
                name: 'Urinary Tract Infection',
                data: [11, 20, 45, 30, 10, 100, 200,32]
            }
        ],
        // series: [],
        xaxis: {
            type: 'datetime',
            categories: ["2017-09-19", "2018-09-19", "2020-09-19", "2020-10-20", "2021-09-19", "2022-09-19", "2023-1-19", "2023-1-22"]
            // categories: []
        },
        tooltip: {
            x: {
                format: 'MMMM dd, yyyy HH:mm'
            },
        },
        };

        var chart = new ApexCharts(document.querySelector("#topFiveIllnessChart"), options);
        chart.render();
    }

    function drawChartPie() {
        var options = {
            series: [],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: [],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        const topMedicines = JSON.parse('{!! $getTopMedicines !!}');
        topMedicines.filter(function (element) {
            options.series.push(parseInt(`${element.stock_balance}`));
            options.labels.push(`${element.medicine_name}`);
        });

        var chart = new ApexCharts(document.querySelector("#topFiveMedsChart"), options);
        chart.render();
    }
</script>
@endpush