<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Post</title>
    @include('crud.includes.header')

</head>
<body>
<div class="container text-center  w-100">
    <a href="{{route('AddPost')}}">ADD Post</a>
    </div>
    <br></br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Posts</th>
            <th scope="col">Decription</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($AllPost as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->description}}</td>
                    <td>
                        <a href="/EditPost/{{$post->id}}" class="btn btn-success dtlpro" role="button">Edit</a> | 
                    
                        <a href="javascript:void(0)" class="btn btn-danger dtlpro" aid="{{ $post->id }}" role="button">Delete</a>
                    </td>

                </tr>
            @endforeach
            
        </tbody>
</table>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $(".dtlpro").click(function(e){
                        var aid = $(this).attr("aid");
                        if(confirm(" Your Data will be deleted !!")){
                            //alert(aid);
                            $.ajax({
                                url:"{{url('/DeletePost')}}/"+aid,
                                type:'get',
                                data:{_token:'{{csrf_token()}}',aid:aid},
                                success:function(response){
                                  alert('Data deleted');
                                  window.location.reload();
                              },
                              error: function(jqXHR, status, err){

                                  window.location.reload();
                              }
                            })
                        }
                        else{
                            alert(" Action Cancelled !")
                        }
                    })
                });
                
            </script>
          
          

@include('crud.includes.footer')

</body>
</html>