<html>
<head></head>
<body>


<form action="{{url('add/classsubject')}}"  method="post" class="mx-1 mx-md-4">
    @csrf

{{--    @if(session()->has('success'))--}}
{{--        {{session()->get('success')}}--}}
{{--    @endif--}}
    <div class="container">
        <h1>classes</h1>
        <hr>

       <label>select class</label>
        <select  name="class_id[]" class="form-control" multiple >
            <option > select class</option>
            @foreach($class as $class)
            <option value="{{$class['id']}}" >
                {{$class['name']}}
            </option>
            @endforeach
        </select>
        <label>select subject</label>
        <select  name="subject_id" class="form-control" >
            <option> select subject</option>
            @foreach($subject as $subject)
                <option value="{{$subject['id']}}">
                    {{$subject['name']}}
                </option>
            @endforeach
        </select>


{{--        <label for="status"><b>status</b></label>--}}
{{--        <input type="number" placeholder="Enter status" name="status" id="status" >--}}


        <button type="submit" class="registerbtn">ADD</button>
    </div>


</form>

</body>
</html>
