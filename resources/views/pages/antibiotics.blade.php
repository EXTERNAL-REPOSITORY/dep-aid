@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Inventory / Antibiotics'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <button class="btn bg-gradient-info z-index-2 me-2" data-bs-toggle="modal" data-bs-target="#filterAntibiotics">Filter</button>
                        <button type="button" class="btn bg-gradient-info z-index-2 me-2" onclick="generateReport();">Generate Report</button>
                        <button type="button" class="btn bg-gradient-success z-index-2" data-bs-toggle="modal" data-bs-target="#addAntibiotics">Add Antibiotics</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="{{route('antibiotics.index')}}" method="GET">
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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Stock Balance</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Manufacturer Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Expiration Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($antibiotic as $index => $row)
                                    <tr class="text-center">
                                        <td>
                                            <p class="text-xs font-weight-bold table-text mb-0">{{ $row->id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold table-text mb-0 text-uppercase">{{ ucfirst($row->medicine_name) }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold table-text text-uppercase">{{ ucfirst($row->brand) }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ $row->stock_balance }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ date('m/d/Y', strtotime($row->manufacturer_date)) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ date('m/d/Y', strtotime($row->expiration_date)) }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <input type="hidden" id="antibiotics-details-{{$row->id}}" data-detail="{{ $row }}">
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-warning z-index-2" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editAntibiotics" 
                                                onclick = "editAntibiotics('{{$row->id}}')">
                                                <i class="fa-solid fa-pencil text-sm opacity-10"></i>
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-danger z-index-2 drop" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal"
                                                data-url="{{ route('antibiotics.destroy', $row->id) }}"
                                                onclick = "deleteAntibiotics(this)">
                                                <i class="fa-solid fa-trash text-sm opacity-10"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="font-weight-bold text-center table-text">No Data Available</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                        </div>
                        <div class="table-pagination p-5">
                            <div class="row">
                                <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600"">
                                    {{$antibiotic->appends(['search' => isset($requestData->search) ? $requestData->search : null])->links('components.pagination')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.inventory.antibiotics.create')
    @include('modals.inventory.antibiotics.edit')
    @include('modals.inventory.antibiotics.filter')
    @include('modals.delete')
@endsection

@push('js')
    <script>
        function generateReport(){
            $.ajax({
                type: 'GET',
                url: `{{ route('antibiotics.generatePdf') }}${window.location.search}`,
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response){
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "DEP-AID Inventory - Antibiotics Report.pdf";
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

        function editAntibiotics(id) {
            const detail = $(`#antibiotics-details-${id}`).data().detail;     
            newManufacturerDate = formatDate(detail.manufacturer_date);
            newExpirationDate = formatDate(detail.expiration_date);

            $('#edit_medicine_name').val(detail.medicine_name);            
            $('#edit_brand').val(detail.brand);            
            $('#edit_beginning_balance').val(detail.beginning_balance); 
            $('#edit_reorder_level').val(detail.reorder_level); 
            $('#edit_stock_balance').val(detail.stock_balance); 
            $('#edit_manufacturer_date').val(newManufacturerDate);
            $('#edit_expiration_date').val(newExpirationDate);
            $('#edit-antibiotics-form').attr('action', `/antibiotics/update/${detail.id}`)
        }

        function deleteAntibiotics(btn) {
            var data = $(btn).data();
            var url = data.url;
            $('#delete-form').attr('action', url);
        }

        $('.stock-balance-btn').on('click', function(){
            console.log($(this).attr('id'))

            if ($(this).attr('id') == 'add-btn') {
                var getInput = $('#edit_stock_balance').val();
                var newValue = $('#edit_stock_balance').val(parseInt(getInput) + 1)
            } else {
                var getInput = $('#edit_stock_balance').val();
                var newValue = $('#edit_stock_balance').val(parseInt(getInput) - 1)
            }

        })
    </script>
@endpush
