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
