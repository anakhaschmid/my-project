
<!DOCTYPE html>
<html lang="en">

    @include('layouts.head')

    <body class="no-skin">

    @include('layouts.top_menu')
        <div class="main-container" id="main-container">

        @php $nav='profile'; @endphp

        @include('layouts.navigation')

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="./">Home</a>
                            </li>
                            <li class="active">Dashboard</li>
                        </ul>
                    </div>


                    <div class="page-content">

                    <div class="page-header">
                            <h1> <b>USER PROFILE</b></h1>
                        </div>
                        <div class="row">

                        @if(session()->has('message'))
                        <div class="alert alert-success" role="alert">
                        <strong>Message: </strong>{{ session()->get('message') }}
                        </div>
                        @endif                    
                            
                            <div class="col-xs-12">
                                
                                <div class="table-header">
                                    User Profile Details
                                   
                                </div>                                
                                
                                <!-- PAGE CONTENT BEGINS -->
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">Username</th>
                                            <th class="center">Email</th>
                                            <th class="center">Date Of Birth</th>
                                            <th class="center">City</th>
                                            <th class="center">Edit</th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>

                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                       {{ $user->username }} 
                                                    </label>
                                                </td>
                                                <td class="center">
                                                {{ $userdetails->email }} 
                                                </td >  
                                                <td class="center">
                                                {{ $userdetails->dob }} 
                                                </td >   
                                                <td class="center">
                                                {{ $userdetails->city }} 
                                                </td >                                                                                                                                           
                                                <td class="center">
                                                    <div class="hidden-sm hidden-xs action-buttons">

                                                        <a class="green" href="{{ asset('/users/edit/profile') }}" title="Edit">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>

                                    </tbody>
                                </table>


                                <!-- PAGE CONTENT ENDS -->

                               
                            </div>

                            </div>

                       
                    </div>
                        
                        
                    <div class="card">
                      <div class="card-header">
                         <form method="POST"  id="url_create" action=" ">
                        
                           <div class="input-group mb-3">

                            
                                <input  id="url_title"  type="text" name="title" placeholder="Enter Title.....">
                                    <span style="display:none; color:red;">The Field Title Required</span>
                                    <input  id="url_link"  type="text" name="link" placeholder="Enter URL...">
                                <span style="display:none; color:red;">The Field Link Required</span>
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                               <!-- <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2"> -->
                                   
                                     <button class="btn btn-success" id="url_shorten" type="button">Generate Shorten Link</button>
                                    
                                </div>
                            </form>
                         </div>
      
                    </div>
                    

                    <div class="page-content">

                    <div class="page-header">
                            <h1> <b>Short URL</b></h1>
                        </div>
                        <div class="row">

                        @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif                   
                            
                            <div class="col-xs-12">
                                

                            @if (Session::has('copy'))
                             <div class="alert alert-success">
                                          <p>{{ Session::get('copy') }}</p>
                                       </div>
                                     @endif 
                                <div class="table-header">
                                    Short Url Details
                                   
                                </div>                                
                                
                                <!-- PAGE CONTENT BEGINS -->
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">Title</th>
                                            
                                            <th class="center">Original Url</th>
                                            <th class="center">Short url</th>
                                            <th class="center">Created By</th>
                                            
                                            <th class="center">Copy</th>                                        
                                        </tr>
                                    </thead>
                                    <tbody id="short_link_body">
                                      @forelse($shortlink as $short)                   
                                      <tr>
                                      <td> {{$short->title}}</td>
                                      <td> <a>{{$short->link}}</a></td>
                                      <td><a href="{{ route('home', $short->code) }}" target="_blank">{{ route('home', $short->code) }}</a></td>
                                      <td> {{$short->created_at}}</td>
                                      <td>
                                      <a href="{{ route('url_copy')}}" class="btn btn-danger remove">
                                         <i class="fa fa-times"></i>
                                         </a>
                                      <!-- <a class="fa fa-fw fa-eye" href="{{ route('url_copy') }}" title="Edit"> -->
                                                           
                                                        </a></td>
                                      </tr>
                                      @empty
                                      <p>No links</p>
                                         @endforelse

                                    </tbody>
                                </table>


                                <!-- PAGE CONTENT ENDS -->

                               
                            </div>

                            </div>

                       
                    </div>

     <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-6">
           <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$linkCount->count()}}</h3>
                <p>Total URLs</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="orange-block">
              <div class="inner">
               
               <h3>{{$duplicate->count()}}</h3>
               <p>Duplicate URLs</p>
              </div>
              
              
            </div>
          </div>
          
          <!-- ./col -->
       
          <!-- ./col -->
         
          <!-- ./col -->
        </div>

                </div>
            </div>
        </div>
          

        @include('layouts.footer')
        
<script>

// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
$(document).ready(function (){

$(document).on("click", "#url_shorten", function(){

var validations = true;
if($("#url_title").val() == ""){
    $("#url_title").next("span").show();
    validations = false;
}else if($("#url_link").val() == ""){
    $("#url_link").next("span").show();
    validations = false;
}

if(validations){
    $("#url_link, #url_title").next("span").hide();
     
   $title = $("#url_title").val();
   $link = $("#url_link").val();

//    $.ajaxSetup({
//            headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            }
//       });
//       const value = $(this).children("option:selected").val();
    //   $.ajax({
    //        url: "/urlshorten",
    //        method: "POST",
    //        data: {title: $title,link: $link},
    //        dataType: 'json',
    //        success: function(data) {
    //             
    //        }
    //   })

    $.ajax({
            url: "{{ route('urlshorten') }}",
            // dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: "title=" + $title + "&link=" + $link,
            success: function(dataHTML) {
                // $('#ajax-area').html(dataHTML);
                $("#short_link_body").empty();
                $.each(dataHTML, function (key, val){
                 
                    $("#short_link_body").append("<tr><td>" + val.title + "</td>"
                   
                    + "<td>" + val.link + "</td>"
                    + "<td>" + val.code + "</td>"
                    + "<td>" + val.created_at + "</td>"
                    + "<td>"+
                    '<a href="{{ route('url_copy')}}" class="btn btn-danger remove">'+
                        '<i class="fa fa-times"></i>'+
                    '</a>'+
                    "</td>"
                    // + "<td><i class="far fa-save"></i></td>"
                    )
                });
                console.log(dataHTML);
            }

        });
//     $.ajax({
// type: "POST",
// url: "/urlshorten",
// cache: false,
// data: "title=" + $title + "&link=" + $link,
// contentType: false,
// processData: false,
// success: function(result) {
// console.log(result);


// }
// });
// var datamain = {title: $title,link: $link,}
// // var data = { id : $(this).val() };
// $.post('/urlshorten', datamain, function(response){ // Shortcut for $.ajax({type: "post"})
// if(response.success)
//     {
//     console.log(response);
//     }
// });

}
});
});
</script>



    </body>
</html>
