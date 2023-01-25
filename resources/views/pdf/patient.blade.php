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
        <div class="row">
            <div class="col-md-12">
                <p class="font-weight-bold lh-1 text-center">{{ $title }}</p>
            </div>
        </div>
        <table class="mb-5">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Scheduled Appointment</th>
                    <th scope="col">Reason/s for Consultation</th>
                    <th scope="col">Remarks</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->patient_name }}</td>
                        <td>{{ date('m/d/Y', strtotime($row->scheduled_appointment)) }}</td>
                        <td>{{ $row->reasons_for_consultation }}</td>
                        <td>{{ $row->remarks }}</td>
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
