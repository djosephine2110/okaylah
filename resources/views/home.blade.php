@extends('layouts.master')

@section('content')
<div class="card shadows" style="background-color:white!important;">
    <div class="card-body" style="padding:5%;">
        <div class="container">
            <div class="row justify-content-center">
                    <div class="card" >
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                          
                        </div>
                        <div class="card-body text-center" >
                            
                            <h1 style="margin-bottom:5%;">
                                @if(Auth::user()->image !== NULL)  
                            
                                <span class="user__list-icon" style="display:flex; justify-content:center;">
                                   <img src="{{Auth::user()->image}}" class="thumbnail" alt="" srcset="" style="max-width: 70px!important; border-radius:100px; margin-right:12px;">
                                </span>
                                
                            
                @else
                            
                    <span class="user__list-icon" style="display:flex; justify-content:center;">
                       <img src="https://p.kindpng.com/picc/s/451-4517876_default-profile-hd-png-download.png" class="thumbnail" alt="" srcset="" style="max-width: 70px!important; border-radius:100px; margin-right:12px;">
                    </span>
                    
                
                @endif     Hello <strong>{{Auth::user()->name}}</strong>, <br>Welcome to your dashboard</h1>
                           

                            <form action="{{route('avatar.upload')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="display:flex!important; justify-content:center!important;">
                                    <div class="col-sm-6" style="display:flex!important; justify-content:center!important;">
                                        <input  type="file" name="image" accept="img/*">
                                        
                                           
                                    </div>
                                    
                                    <div class="col-sm-6" style="display:flex!important; justify-content:center!important;">
                                        <input type="submit" value="Upload" >

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection