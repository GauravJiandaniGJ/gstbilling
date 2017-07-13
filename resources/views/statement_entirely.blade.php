<!DOCTYPE html>
<html>
<head>
    <title>HTML Table</title>
    <style>
        table{
            border-collapse: collapse;
            text-align: center;
        }
        td,th{
            border: 1px solid;
        }
        h1{
            text-align: center;
        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
<h1>{{$debit_details[0]['company']['name']}}</h1>
<h2>Statement Entirely</h2>
<table border="1" width="100%">
    <tr>
        <td>
            <table border="1" width="100%">
                <tr>
                    <th>Bill No.</th>
                    <th>Bill Date</th>
                    <th>Client Name</th>
                    <th>Description</th>
                    <th>Final Amount</th>
                </tr>

                @foreach ($debit_details as $detail)
                    <tr>
                        <td>{{$short_name}}/{{$detail['debit_no']}}/{{$year}}-{{$next_year}}</td>
                        <td>{{$detail['debit_date']}}</td>
                        <td>{{$detail['client_address']['client']['name']}}</td>
                        <td>{{$detail['description']}}</td>
                        <td>{{$detail['final_amount']}}</td>
                    </tr>
                @endforeach

                @foreach ($bill_details as $details)
                    <tr>
                        <td>{{$short_name}}/G/{{$details['bill_no']}}/{{$year}}-{{$next_year}}</td>
                        <td>{{$details['bill_date']}}</td>
                        <td>{{$details['client_address']['client']['name']}}</td>
                        <td>{{$details['description']}}</td>
                        <td>{{$details['final_amount']}}</td>
                    </tr>
                @endforeach

            </table>
        </td>
    </tr>
</table>
</body>
</html>