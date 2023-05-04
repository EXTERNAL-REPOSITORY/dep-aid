<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style type="text/css">  
        table td, table th{  
            border:1px solid black;  
            padding: 25px;
            text-align: center;
        }  
    </style>  
</head>
<body>
    <div>
        <table style="width:100%; border: 0!important;border-style: none!important;" border="0">
            <thead style="border: 0!important;border-style: none!important;" border="0">
                <tr>
                    <th style="border: 0!important;border-style: none!important;" border="0">
                        <img class="mallogo" src="{{asset('img/logos/dep-ed-nbg.png')}}" alt="malabalay logo" width="80">
                    </th>
                    <th class="text-center d-flex flex-row p-0 m-0" style="border: 0!important;border-style: none!important;" border="0">
                        <small>Republic of the Philippines</small><br>
                        <small>Department of Education</small><br>
                        <small>Region X-Northern Mindanao</small><br>
                        <small>DIVISION OF MALAYBALAY CITY</small><br>
                        <small>Purok 6, Casisang Malaybalay City</small><br>
                        <small>Telefax #D88-314-0094</small>
                    </th>
                    <th style="border: 0!important;border-style: none!important;" border="0">
                        <img class="deplogo" src="{{asset('img/logos/deped-malaybalay.png')}}" alt="deped logo" width="80">
                    </th>
                </tr>
            </thead>
        </table>
        <div class="row">
            <div class="col-md-12">
                <p class="font-weight-bold lh-1 text-center">{{ $title }}</p>
            </div>
        </div>
        <table class="mb-5">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Manufacturer Date</th>
                    <th scope="col">Expiration Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->medicine_name }}</td>
                        <td>{{ $row->brand }}</td>
                        <td>{{ date('m/d/Y', strtotime($row->manufacturer_date)) }}</td>
                        <td>{{ date('m/d/Y', strtotime($row->expiration_date)) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Data Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
