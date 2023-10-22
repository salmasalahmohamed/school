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


            <label for="name"><b>nameof classes </b></label>
            <input type="name" placeholder="Enter name" name="name" id="name" >
            <button type="submit">search</button>
        </div>
    </form>
</div>

<table style="width:100%">
    <tr>
        <th>name of classes</th>
        <th>status</th>
        <th>admin</th>
        <th>edit</th>
        <th>delete</th>

    </tr>
    @foreach($class as $class)
        <tr>
            <td>{{$class['name']}}</td>
            <td>{{ $class->status=$class->status==1?'active':'not active'}}</td>
            <td>{{$class['created_by']}}</td>
            <td> <a href="{{url('class/edit/'.$class['id'])}}">edit</a></td>

            <td> <a href="{{url('delete/classes/'.$class['id'])}}">delete</a></td>
        </tr>

    @endforeach
</table>
</body>

</html>
