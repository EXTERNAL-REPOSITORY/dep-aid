@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Inventory / Reorder Level Medicines'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <button class="btn bg-gradient-info z-index-2 me-2" data-bs-toggle="modal" data-bs-target="#filterReorderLvlMeds">Filter</button>
                        <button type="button" class="btn bg-gradient-info z-index-2 me-2" onclick="generateReport();">Generate Report</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="{{route('reorder-lvl-meds.index')}}" method="GET">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search.." name="search" value="{{ $requestData['search'] }}">
                            <button class="search-btn" type="submit" style="border: none; border-top-right-radius: 10px; border-bottom-right-radius: 10px; background-color: #ededed;"><i class="ni ni-zoom-split-in" style="padding-left: 5px; padding-right: 5px"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">ID</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Medicine Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Brand</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Beginning Balance</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Stock Balance</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Reorder Level</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Manufacturer Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Expiration Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($reorderLevelMeds as $index => $row)
                                    <tr class="text-center" style="color:#e96b0b"  title="Reorder Level Medicines">
                                        <td>
                                            <p class="text-xs font-weight-bold table-text mb-0">{{ $row->id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold table-text mb-0 text-uppercase">{{ ucfirst($row->medicine_name) }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold table-text text-uppercase">{{ ucfirst($row->brand) }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold table-text">{{ $row->beginning_balance }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold table-text">{{ $row->stock_balance }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold table-text">{{ $row->reorder_level!=""?$row->reorder_level.'%':'' }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-xs font-weight-bold table-text">{{ date('m/d/Y', strtotime($row->manufacturer_date)) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-xs font-weight-bold table-text">{{ date('m/d/Y', strtotime($row->expiration_date)) }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="font-weight-bold text-center table-text">No Data Available</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                        </div>
                        <div class="table-pagination p-5">
                            <div class="row">
                                <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600"">
                                    {{$reorderLevelMeds->appends(['search' => isset($requestData->search) ? $requestData->search : null])->links('components.pagination')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.inventory.reorder-lvl-meds.filter')
@endsection

@push('js')
    <script>
        function generateReport(){
            $.ajax({
                type: 'GET',
                url: `{{ route('reorder-lvl-meds.generatePdf') }}${window.location.search}`,
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response){
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "DEP-AID Inventory - Reorder Level Meds Report.pdf";
                    link.click();
                },
                error: function(blob){
                    console.log(blob);
                }
            });
        }
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [year, month, day].join('-');
        }
    </script>
@endpush
