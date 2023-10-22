<html>
<head></head>
<body>


<form action="{{url('add/classes')}}"  method="post" class="mx-1 mx-md-4">
    @csrf

    @if(session()->has('success'))
        {{session()->get('success')}}
    @endif
    <div class="container">
        <h1>classes</h1>
        <hr>

        <label for="name"><b>name</b></label>
        <input type="text" placeholder="Enter Email" name="name" id="name" >

        <label for="status"><b>status</b></label>
        <input type="number" placeholder="Enter status" name="status" id="status" >


        <button type="submit" class="registerbtn">ADD</button>
    </div>


</form>

</body>
</html>
