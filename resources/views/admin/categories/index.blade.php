@extends('admin.master')

@section('title')
    categories 
@stop

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Categories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url(route('home'))}}">Home</a></li>
            <li class="breadcrumb-item active">categories</li>
          </ol>
        </div>
      </div>
@stop

@section('content')
<a href = "{{url(route('category.create'))}}" class = "btn btn-info mx-3 float-right"><i class = "fa fa-plus"></i>  New Category</a><br><br>
@include('admin.includes.flash-message')
@if(count($categories) > 0)
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Restaurants Categories</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class = "text-center">Edit</th>  
                    <th class = "text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td class = "text-center">
                              <a href = "{{url(route('category.edit' , $category->id))}}" class = "btn btn-success btn-sm"><i class = "fa fa-edit"></i></a>
                            </td>
                            <td class = "text-center">
                                <button    onclick = "deleteData(this)" class = "btn btn-danger btn-xs"><i class = "fa fa-trash"></i></button>
                                {!!Form::open([
                                    'route' => ['category.destroy' , $category->id ] , 
                                    'method' => 'delete'
                                ]) !!}
                                
                                
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </div>
@else 
    <p>No categories available</p> 
@endif


@endsection