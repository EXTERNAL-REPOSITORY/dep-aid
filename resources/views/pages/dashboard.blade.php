@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@push('links')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
.month-forecast{
    cursor:pointer;
}
</style>
@endpush
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
                    <div class="col">
                        <h6 class="font-weight-bolder text-uppercase">Top 5 Most Used Medicines</h6>
                    </div>
                    <div id="topFiveMedsChart" class="mx-auto d-flex justify-content-center"><center><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Loading...</center></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="font-weight-bolder text-uppercase">Illness History</h6>
                    <!-- <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">Year <i class="fa fa-eye"></i></p>
                    <div id="reportrange" class="history-view" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <hr> -->
                    <div id="topFiveIllnessChart" class="mx-auto"><center><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Loading...</center></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-3 mb-3">
        <div class="col-xl-12 col-md-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <h6 class="font-weight-bolder text-uppercase pb-0 mb-0">YEAR {{ now()->year }} PROBABILISTIC FORECAST</h6>
                        <small class="mt-0">highest probability rate of illness this year</small>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-xl-12 col-xs-12 col-sm-12 col-mb-12 mb-xl-0 mb-1">
                            <div class="card" title="view list of possible illnesses">
                                <div class="card-body p-3">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold text-nowrap">Month <i class="fa fa-eye"></i></p>
                                        <label for="month-forecast">Select:</label>
                                        <select class="month-forecast" style="
                                        display: block;
                                        padding: 0.5rem 0.75rem;
                                        font-size: 0.875rem;
                                        font-weight: 400;
                                        line-height: 1.4rem;
                                        color: #495057;
                                        background-color: #fff;
                                        background-clip: padding-box;
                                        border: 1px solid #d2d6da;
                                        -webkit-appearance: none;
                                        -moz-appearance: none;
                                        appearance: none;
                                        border-radius: 0.5rem;
                                        transition: box-shadow 0.15s ease, border-color 0.15s ease;">
                                            <option value="1">JANUARY</option>
                                            <option value="2">FEBRUARY</option>
                                            <option value="3">MARCH</option>
                                            <option value="4">APRIL</option>
                                            <option value="5">MAY</option>
                                            <option value="6">JUNE</option>
                                            <option value="7">JULY</option>
                                            <option value="8">AUGUST</option>
                                            <option value="9">SEPTEMBER</option>
                                            <option value="10">OCTOBER</option>
                                            <option value="11">NOVEMBER</option>
                                            <option value="12">DECEMBER</option>
                                        </select>
                                        <hr>
                                        <div class="font-weight-bold text-small table-responsive">
                                            <table class="table">
                                                <thead class="text-center">
                                                    <tr class="bg-dark text-light">
                                                        <th scope="col">#</th>
                                                        <th scope="col" class="text-start">Diagnosis</th>
                                                        <th scope="col">Probabilistic Rate(%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="forecasting_table" class="text-center">
                                                    <tr class="text-center">
                                                        <td scope="col" colspan="3"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
@endsection

@push('js')
{{--<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>--}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
    drawChartBar();
    drawChartPie();
    monthlyForecast(1);
    
    function getIllness(ill)
    {
        console.log(ill);
        // data.push(ill);
    }

    function drawChartBar() {

        const illnesses = JSON.parse('{!! $illnesses !!}');
        var year =[];
        var tempIllness=[];
        var data = [];
        var tempData = [];

        illnesses.forEach(element => {
            year.push(element.created_at);
            tempIllness.push(element.diagnosis);
        });

        const illness = new Set(tempIllness);
        illness.forEach(diagnosis => {
            illnesses.forEach(element => {
                if(diagnosis==element.diagnosis){
                    tempData.push(element.consultation)
                    console.log(element.consultation);
                }else{
                    tempData.push(0);
                }
            });
            
            data.push({
                name: diagnosis,
                data: [...tempData]
            });
            tempData=[];
        });
            
        console.log(data);

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
        series: data,
        // [
        //     {
        //         name: 'Sore Throat',
        //         data: [31, 40, 28, 51, 42, 109, 100,0]
        //     }, 
        //     {
        //         name: 'Asthma',
        //         data: [11, 32, 20, 32, 34, 52, 41,0]
        //     }, 
        //     {
        //         name: 'Urinary Tract Infection',
        //         data: [11, 20, 45, 30, 10, 100, 200,32]
        //     }
        // ],
        // series: [],
        xaxis: {
            type: 'datetime',
            categories: year
            // categories: []
        },
        tooltip: {
            x: {
                format: 'MMMM dd, yyyy HH:mm'
            },
        },
        };
        setTimeout(function () {
            $("#topFiveIllnessChart").html("");
            var chart = new ApexCharts(document.querySelector("#topFiveIllnessChart"), options);
            chart.render();
        },3000);
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

        setTimeout(function () {
            $("#topFiveMedsChart").html("");
            var chart = new ApexCharts(document.querySelector("#topFiveMedsChart"), options);
            chart.render();
        },3000);
    }

    function monthlyForecast(month){
        $('#forecasting_table').html('<tr class="text-center">\
            <td scope="col" colspan="3"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Loading...</td>\
        </tr>');
        $.get( "{{route('top-illness.topTen')}}", { month: month } )
        .done(function( data ) {
            data = JSON.parse(data);
            console.log("----------------------------------------------");
            var denom=sequence=0;
            data.forEach(element => {
                denom+=element.consultation;
            });
            var body="";
            data.forEach(element => {
                console.log(element.diagnosis+ " : "+element.consultation);
                sequence++;
                body +='<tr>\
                            <td scope="row">'+sequence+'</td>\
                            <td class="text-start"><span class="text-nowrap">'+element.diagnosis+'</span></td>\
                            <td>'+(element.consultation/denom*100).toFixed(2)+'%</td>\
                        </tr>';
            });
            setTimeout(function () {$('#forecasting_table').html(body!=""?body:"No Data")},1000);
        });
    }

    function historyView(year){
        console.log(year.from+" - "+year.to);
    }
</script>

<script type="text/javascript">
$('.month-forecast').on('change',function(e){
    monthlyForecast($(this).val());
});

// $('#reportrange').on('change',function(e){
//     console.log($(this).val());
//     // monthlyForecast($(this).val());
// });

</script>

<!-- <script type="text/javascript">
    $(function() {
    
        var start = moment().subtract(12, 'month');
        var end = moment();
    
        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
               'This Year': [moment().startOf('year'), moment().endOf('year')],
               'Last Year To This Year': [moment().startOf('year').subtract(1,'year'), moment().endOf('year')],
            }
        }, cb);
        
        cb(start, end);
    
    });
    </script> -->
@endpush