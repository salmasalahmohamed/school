<html>
<head></head>
<body>


                                <form action="{{url('add/admin')}}"  method="post" class="mx-1 mx-md-4">
                                       @csrf

                                    @if(session()->has('success'))
                                        {{session()->get('success')}}
                                    @endif
                                        <div class="container">
                                            <h1>Register</h1>
                                            <p>Please fill in this form to create an account.</p>
                                            <hr>

                                            <label for="email"><b>name</b></label>
                                            <input type="text" placeholder="Enter Email" name="name" id="email" >

                                            <label for="psw"><b>email</b></label>
                                            <input type="email" placeholder="Enter Password" name="email" id="psw" >

                                            <label for="password"><b> Password</b></label>
                                            <input type="password" placeholder=" Password" name="password" id="password" >
                                            <hr>

                                            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                                            <button type="submit" class="registerbtn">Register</button>
                                        </div>

                                        <div class="container signin">
                                            <p>Already have an account? <a href="#">Sign in</a>.</p>
                                        </div>
                                    </form>

</body>
</html>
