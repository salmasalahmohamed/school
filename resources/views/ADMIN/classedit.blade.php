<html>
<head></head>
<body>


<form action="{{url('update/classes/'.$class['id'])}}"  method="post" class="mx-1 mx-md-4">
    @csrf

@method('POST')
    <div class="container">
        <h1>classes</h1>
        <hr>

        <label for="name"><b>name</b></label>
        <input type="text" placeholder="Enter Email" value="{{$class['name']}}" name="name" id="name" >

        <label for="status"><b>status</b></label>
        <input type="number" placeholder="Enter status" value="{{$class['status']}}" name="status" id="status" >

        <label for="name"><b>created_by</b></label>
        <input type="text" placeholder="Enter Email" value="{{$class['created_by']}}" name="name" id="name" >

        <button type="submit" class="registerbtn">update</button>
    </div>


</form>

</body>
</html>
