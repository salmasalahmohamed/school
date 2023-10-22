<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-spacing: 5px;
        }
    </style>
</head>

<body><div>
    <form action=""  method="get" class="mx-1 mx-md-4">

        <div class="container">


            <label for="psw"><b>email</b></label>
            <input type="email" placeholder="Enter Password" name="email" id="psw" >
            <button type="submit">search</button>
        </div>
    </form>
        </div>

<table style="width:100%">
    <tr>
        <th>Firstname</th>
        <th>email</th>
        <th>delete</th>
    </tr>
    @foreach($admin as $admin)
        <tr>
            <td>{{$admin['name']}}</td>
            <td>{{$admin['email']}}</td>
            <td> <a href="{{url('delete/admin/'.$admin['id'])}}">delete</a></td>
        </tr>

    @endforeach
</table>
</body>

</html>
