@extends('layouts.master')
    
  @section('content')
        <div class="container">
            <div class="card mt-5" style="background-color:white; padding:5%; margin-left:-10%;">
                <div class="container">
                    <div class="card-header text-center">
                        <h1 ><strong>LABELS AVAILABLE 
                        </strong><a href="/pegawai/tambah" class="btn btn-primary" style="margin-left: 2%;"><i class="fas fa-plus" ></i></a>
                        </h1>
                    </div>
                    <div class="card-body" >
                        
                        <br/>
                        <br/>
                        <table class="table table-responsive  table-striped" style="max-width: 100%;">
                            <thead>
                                <tr style="text-align: center;">
                                    <th style="text-align: center;">Title</th>
                                    <th style="text-align: center;">Color</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pegawai as $p)
                                <tr style="text-align: center;">
                                    <td>{{ $p->nama }}</td>
                                    <td><button class="btn" style="background-color: {{ $p->alamat }}; width:100px; pointer-events: none!important; "></button></td>
                                    <td>
                                       
                                        <a href="/pegawai/hapus/{{ $p->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
   @endsection