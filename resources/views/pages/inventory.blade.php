@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Inventory'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-center">
                        <a href="#" class="btn btn-secondary z-index-2 me-2 active">Cardiac Drugs</a>
                        <a href="#" class="btn btn-secondary z-index-2 me-2">Antibiotics</a>
                        <a href="#" class="btn btn-secondary z-index-2 me-2">Anti-inflammatory</a>
                        <a href="#" class="btn btn-secondary z-index-2 me-2">Ear Meds</a>
                        <a href="#" class="btn btn-secondary z-index-2 me-2">Topicals</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
@endsection

@push('js')
    
@endpush
