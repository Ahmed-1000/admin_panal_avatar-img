<div>
    <style>
           html{
               
                overflow-x:hidden;
           }
                  
         
         
         
           aside{
             position: absolute;
             top:-45px;
             left: 145%;
             height:450%;
             padding: 20%;
             background: #073b4c;
             width:1600px;
             box-shadow: -5px -5px #eee;
            
            }
            .avatar{
    width: fit-content;
    position: relative;
     right: 55px;
     top:-50px;
    
}
.avatar-container{
    cursor: pointer;
    border-radius: 50%;
    border: 1px solid #dadce0;
    overflow: hidden;
    position: relative;
}
.avatar-image{
    border-radius: 50%;
    width: auto;
    height: 100%;
}
.avater-size{
    width: 6rem;
    height: 6rem;
}
.edit-container{
    opacity: 0;
    transition: opacity 0.2s ease-in-out;
    background-color:  rgba(32,33,36,0.6);
    bottom: 0;
    height: 33%;
    left: 0;
    position: absolute;
    right: 0;
    opacity: 0;
    text-align: center;
    font-size: 100%; 
}
input[type="file"]{
    background:none;
    outline:none;
    border:none;
    color: transparent;
    
}
input[type="file"]::-webkit-file-upload-button{
        visibility: hidden;
}
input[type="file"]::before{
    content: 'upload';
    font-family: fontAwesome;
    font-size: 16px;
    color: #fff;
    padding-left:22px;
    cursor: pointer;
}
.avatar-container:hover .edit-container{
    opacity: 1;
}
#admin_name{
    margin-left:20px;
    color:#fff;
}

</style>
    <button class="btn btn-primary btn-sm mb-3" wire:click="OpenAddEmployeeModal()">Add new Employee</button>
    <table class="table table-hover table-inverse table-responsive">
                    <thead class="thead-inverse">
                       <tr>
                          <th>id</th>
                           <th>name</th>
                            <th>address</th>
                            <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                       @forelse ($employees as $employee)
                         <tr>
                           <td>{{ $employee->employee_id }}</td>
                           <td>{{ $employee->employee_name }}</td>
                           <td>{{ $employee->address }}</td>
                           <td>
                               <button class="btn btn-danger btn-sm" wire:click="deleteconfirm({{$employee->id}})">Delete</button>
                               <button class="btn btn-success btn-sm" wire:click="OpenEditEmployeeModal({{$employee->id}})">update</button>
                           </td>
                        </tr>
                       @empty
                           <code>No Employee found!</code>
                       @endforelse
                    </tbody>
                    
               
     </table>
     <aside>
            <div class="avatar">
                <div class="avatar-container avater-size">
                   <img src="{{ $adminslists->avatars_url }}" class="avatar-image">
                   <div class="edit-container">
                      <input type="file" wire:model="photo">
                      @if ($photo)
                        {{ $photo->getClientOriginalName() }}
                      @else
                        upload
                      @endif
                   </div>
                </div>
                <p id="admin_name">{{$name}}<p>
            </div>
            
     </aside>
        @include('Modals.Add-modal')
        @include('Modals.Edit-modal')
         @include('Modals.login')
         @include('Modals.register')
</div>
