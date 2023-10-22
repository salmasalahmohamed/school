<html>
<head></head>
<body>


<form action="{{url('add/subject')}}"  method="post" class="mx-1 mx-md-4">
    @csrf

    @if(session()->has('success'))
        {{session()->get('success')}}
    @endif
    <div class="container">
        <h1>subjects</h1>
        <hr>

        <label for="name"><b>name</b></label>
        <input type="text" placeholder="Enter name" name="name" id="name" >
        <label for="type"><b>type</b></label>
        <input type="text" placeholder="Enter type" name="type" id="type" >


        <label for="status"><b>status</b></label>
        <input type="number" placeholder="Enter status" name="status" id="status" >
        <label for="status"><b>is_deleted</b></label>
        <input type="number" placeholder="Enter is_deleted" name="is_deleted" id="is_deleted" >


        <button type="submit" class="registerbtn">ADD</button>
    </div>


</form>

</body>
</html>
