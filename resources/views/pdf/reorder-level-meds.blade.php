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
                    <th class="">ID</th>
                    <th class="">Medicine Name</th>
                    <th class="">Brand</th>
                    <th class="">Beginning Balance</th>
                    <th class="">Stock Balance</th>
                    <th class="">Reorder Level</th>
                    <th class="">Manufacturer Date</th>
                    <th class="">Expiration Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $row)
                    <tr>
                        <th scope="row">
                            <p class="text-xs font-weight-bold table-text mb-0">{{ $row->id }}</p>
                        </th>
                        <td>
                            <p class="text-xs font-weight-bold table-text mb-0 text-uppercase">{{ ($row->medicine_name) }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold table-text text-uppercase">{{ ($row->brand) }}</span>
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
                        <td colspan="5">No Data Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
