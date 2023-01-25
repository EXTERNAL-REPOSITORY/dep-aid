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
                    <tr>
                        <th scope="row">{{ $row->employee_id }}</th>
                        <td>{{ $row->first_name }}</td>
                        <td>{{ $row->middle_name }}</td>
                        <td>{{ $row->last_name }}</td>
                        <td>{{ $row->position }}</td>
                        <td>{{ $row->availability_days }}</td>
                        <td>{{ isset($row->available_from) ? date('H:i:s', strtotime($row->available_from)) : 'Not Available' }}</td>
                        <td>{{ isset($row->available_to) ? date('H:i:s', strtotime($row->available_to)) : 'Not Available' }}</td>
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
