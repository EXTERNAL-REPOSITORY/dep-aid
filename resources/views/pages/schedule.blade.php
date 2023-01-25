@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Schedule'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div id="scheduler_here" class="dhx_cal_container scheduler-calendar" style='width:100%; height:750px;'>
                        <div class="dhx_cal_navline">
                            <div class="dhx_cal_prev_button">&nbsp;</div>
                            <div class="dhx_cal_next_button">&nbsp;</div>
                            <div class="dhx_cal_today_button"></div>
                            <div class="dhx_cal_date"></div>
                            <div class="dhx_cal_tab" name="day_tab"></div>
                            <div class="dhx_cal_tab" name="week_tab"></div>
                            <div class="dhx_cal_tab" name="month_tab"></div>
                        </div>
                        <div class="dhx_cal_header"></div>
                        <div class="dhx_cal_data"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        scheduler.config.dblclick_create = false;
        // scheduler.config.details_on_dblclick = true;
        // scheduler.attachEvent("onDblClick", function (id, e){
        //     return false;
        // })
        // scheduler.config.readonly = true;

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        const compactHeader = {
            rows: [
                { 
                    cols: [
                        "prev",
                        "date",
                        "next",
                    ]
                },
                { 
                    cols: [
                        "day",
                        "week",
                        "month",
                        "spacer",
                        "today"
                    ]
                }
            ]
        };
        
        const fullHeader = [
            "day",
            "week",
            "month",
            "date",
            "prev",
            "today",
            "next"
        ];
        
        // add a switch to select an appropriate config for a current screen size
        
        function resetConfig(){
            let header;
            if (window.innerWidth < 1000) {
                header = compactHeader;
            } else {
                header = fullHeader;
        
            }
            scheduler.config.header = header;
            return true;
        }
        
        // apply the config initially and each time scheduler repaints or resizes:
        
        resetConfig();
        scheduler.attachEvent("onBeforeViewChange", resetConfig);
        scheduler.attachEvent("onSchedulerResize", resetConfig);
        
        // scheduler.init("scheduler_here");
        scheduler.config.date_format = "%Y-%m-%d %H:%i:%s";
        scheduler.init("scheduler_here", today, "month");
        
        scheduler.load("/api/data", "json");
    </script>
@endpush
