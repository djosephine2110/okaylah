
@extends('layouts.app')
@section('content')


   
        <div class="row">
             <!-- Main Section -->
    
            <div class="col-md-5 col-md-offset-4">
                
                <div class="tablet" style="margin-top:-35%!important; background-color:rgba(255, 255, 255, 0.685);">
                    
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                                <p>Error! Can't register</p>     
                        </div>  
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    <h1 class="text-center" style="font-size:50px; font-family: 'Fredericka the Great', cursive!important;">Era Project Management</h1>
                    

                    <form action="{{ url('/registerPost') }}" method="post" style="margin-top:10%;">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="alamat">Full Name:</label>
                            <input type="text"  class="form-control" id="name" name="name" >
                            @if($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name')}}
                        </div>
                    @endif
                        </div>
                        

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @if($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email')}}
                        </div>
                    @endif
                        </div>
                        <div class="form-group">
                            <label for="alamat">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <input type="checkbox" onclick="myFunction()">Show Password

                            @if($errors->has('password'))
                        <div class="text-danger">
                            <p>Please enter at least 8 characters</p>
                        </div>
                    @endif
                        </div>
                        

                        
                        <div class="form-group">
                            <label for="flag">Division:</label>
                            <select name="flag" id="flag">
                                @foreach($getDiv as $i)
                                <option value="{{$i->id}}">{{$i->division}}</option>
                                @endforeach
                            </select>
 
                        </div>
                       

                        
                      <div class="row">
                        
                        <div class="form-group" style="margin-bottom:10%;">
                            <div class="col-md-12">
                            
                                <button type="submit" class="btn btn-success btn-lg btn-block" style="border-radius: 2px; box-shadow: 0px 2px 4px rgba(0,0,0,0.18);   background: #536be2; border: none;">
                                    <i class="fa fa-btn fa-sign-in"></i>Sign Up
                                </button>
                            </div>
                            <div class="col-md-6 col-md-offset-2" style="padding-left: 60px;">
                                <a class="btn btn-link" href="{{ url('/login') }}" style="color:#333; margin-top:8px;">Already have account?</a>
                            </div>
                        </div>
                      </div>
                        
                    </form>
                    </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
@endsection