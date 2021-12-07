<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Comptible" content="ie=edge">
        <title>Employee-Register</title>
            <!-- Scripts -->
    <script src="http://127.0.0.1:8000/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('sweetalert2.min.css')}}">
     @livewireStyles
    </head>
    <body>
      <div class="container">
            <div class="row">
               <div class="col-md-6 offset-md-3" style="margin-top: 45px;">
                <h4>Employee Dashboard</h4><hr>
                     @livewire('employees')
                
                </div>
               
             </div>
            
           </div>
           <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
           <script src="{{ asset('bootstrap.min.js') }}"></script>
           <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
            <script src="{{asset('sweetalert2.min.js')}}"></script>
           @livewireScripts
            
           <script>
              window.addEventListener('OpenAddEmployeeModal', function(){
                  $('.addEmployee').find('span').html('');
                  $('.addEmployee').find('form')[0].reset();
                  $('.addEmployee').modal('show');
              });
              window.addEventListener('CloseAddEmployeeModal', function(){
                  $('.addEmployee').find('span').html('');
                  $('.addEmployee').find('form')[0].reset();
                  $('.addEmployee').modal('hide');
                  alert('employee has been saved successfully');
               });
               window.addEventListener('OpenEditEmployeeModal',function(event){
                   $('.EditEmployee').find('span').html('');
                   $('.EditEmployee').modal('show');
               });
               window.addEventListener('CloseEditEmployeeModal',function(event){
                    $('.EditEmployee').find('span').html('');
                    $('.EditEmployee').find('form')[0].reset();
                    $('.EditEmployee').modal('hide');
               });
               window.addEventListener('swalconfirm',function(event){
                   swal.fire({
                       title:event.detail.title,
                       imageWidth:48,
                       imageHeight:48,
                       html:event.detail.html,
                       showCloseButton:true,
                       showCancelButton:true,
                       cancelButtonText:'cancel',
                       confirmButtonText:'yes, Delete',
                       cancelButtonColor:'#d33',
                       confirmButtonColor:'#3085d6',
                       width:300,
                       allowOutsideClick:false
                   }).then(function(result){
                       if(result.value){
                          window.livewire.emit('delete',event.detail.id);
                       }
                   })
               });
                
               window.addEventListener('load',function(){
                      $('.addlogin').modal('hide');
                      
                      

               });
               window.addEventListener('showlogin',function(){
                    $('.addlogin').modal('show');
                    $('.addregister').modal('hide');
                   
               });
                window.addEventListener('showsignup',function(){
                      $('.addlogin').modal('hide');
                      $('.addregister').modal('show');
               });

               window.addEventListener('deleted',function(event){
                   alert('employee has been deleted');
                    
               });
               window.addEventListener('registervalidate', function(){
                   $('.addregister').modal('hide');
               })
           </script>
    </body>
</html>
