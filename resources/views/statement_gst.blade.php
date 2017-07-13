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
<h1>{{$bill_in_detail[0]['company']['name']}}</h1>
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

                @foreach ($bill_in_detail as $details)
                    <tr>
                        <td>{{$short_name}}/G/{{$details['bill_no']}}/{{$year}}-{{$next_year}}</td>
                        <td>{{$details['bill_date']}}</td>
                        <td>{{$details['client_address']['client']['name']}}</td>
                        <td>{{$details['description']}}</td>
                        <td>{{$details['final_amount']}}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="4"><b>Total</b></td>
                    <td><b>{{$total_bill}}</b></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>