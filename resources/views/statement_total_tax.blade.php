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
<h1>{{$bill_details[0]['company']['name']}}</h1>
<h2>Statement Entirely</h2>
<table border="1" width="100%">
    <tr>
        <td>
            <table border="1" width="100%">
                <tr>
                    <th>Bill No.</th>
                    <th>Bill Date</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>IGST</th>
                    <th>Total Tax</th>
                </tr>

                @foreach ($bill_details as $details)
                    <tr>
                        <td>{{$short_name}}/G/{{$details['bill_no']}}/{{$year}}-{{$next_year}}</td>
                        <td>{{$details['bill_date']}}</td>
                        <td>{{$details['after_cgst']}}</td>
                        <td>{{$details['after_sgst']}}</td>
                        <td>{{$details['after_igst']}}</td>
                        <td>{{$details['total_gst']}}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="2"><b>Total</b></td>
                    <td><b>{{$total_cgst}}</b></td>
                    <td><b>{{$total_sgst}}</b></td>
                    <td><b>{{$total_igst}}</b></td>
                    <td><b>{{$total_gst}}</b></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>