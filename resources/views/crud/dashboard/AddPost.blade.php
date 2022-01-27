<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('crud.includes.header')
    <title>Add Post</title>
</head>
<body>
@if(Session::has('success'))
    <div class="alert alert-success"> {{Session::get('success')}} </div>
@endif
@if(Session::has('errMsg'))
    <div class="alert alert-danger"> {{Session::get('errMsg')}} </div>
@endif
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Add Post</h1>
    
  </div>
</div>
    <form method="post" action="{{route('store')}}">
        @csrf()
        <div class="form-group">
            <label for="exampleInputEmail1">Post</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post">
            
        </div>
        @if($errors->has('name'))
            <label class="alert alert-danger">{{$errors->first('name')}}</label>
        @endif
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea class="form-control" name="description" id="exampleInputPassword1" placeholder="Enter Description"></textarea>
        </div>
        @if($errors->has('description'))
            <label class="alert alert-danger">{{$errors->first('description')}}</label>
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include('crud.includes.footer')


</body>
</html>