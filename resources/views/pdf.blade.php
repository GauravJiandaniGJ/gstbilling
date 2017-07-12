<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <style>
        table{
            border-collapse: collapse;
        }
        td,th{
            border: 1px solid;
        }
        </style>
</head>
    <body>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Password</th>
    </tr>

    @foreach($client as $cli)
        <tr>
            <th>$cli->name</th>
            <th>$cli->company</th>
        </tr>

        @endforeach
</table>

</body>

</html>>