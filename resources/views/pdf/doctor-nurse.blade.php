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
            padding: 5px;
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
                    <th scope="col">Employee ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Available From</th>
                    <th scope="col">Available To</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $row)
                    @php($tday="")
                    @switch($row->availability_days)
                        @case(0):
                            $tday = "Monday"
                            @break
                        @case(1):
                            $tday = "Tuesday"
                            @break
                        @case(2):
                            $tday = "Wednesday"
                            @break
                        @case(3):
                            $tday = "Thursday"
                            @break
                        @case(4):
                            $tday = "Friday"
                            @break
                        @case(5):
                            $tday = "Saturday"
                            @break
                        @case(6):
                            $tday = "Sunday"
                            @break
                    @endswitch
                    <tr>
                        <th scope="row">{{ $row->employee_id }}</th>
                        <td>{{ $row->first_name }}</td>
                        <td>{{ $row->middle_name }}</td>
                        <td>{{ $row->last_name }}</td>
                        <td>{{ $row->position }}</td>
                        <td>{{ $tday }}</td>
                        <td>{{ isset($row->available_from) ? date('H:i A', strtotime($row->available_from)) : 'Not Available' }}</td>
                        <td>{{ isset($row->available_to) ? date('H:i A', strtotime($row->available_to)) : 'Not Available' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">No Data Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
