

<!-- Modal -->
<div class="modal fade addregister" wire:ignore.self role="dialog" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title btn_down" id="staticBackdropLabel" style="cursor:pointer;" wire:click="showlogin()">login</h5>
          <h5 class="modal-title btn_up" id="staticBackdropLabel" style="cursor:pointer;" wire:click="showsignup()" >sign up</h5>
           
      </div>
      <div class="modal-body" style="height:390px; overflow:hidden;">
     
        
        <form wire:submit.prevent="register" >
          <div class="hidemodal">
            <div class="form-group">
               <label for="">user name</label>
               <input type="text" class="form-control" placeholder="Enter username" wire:model="name">
               <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               <label for="">password</label>
               <input type="password" class="form-control" placeholder="Enter password" wire:model="pass">
               <span class="text-danger">@error('pass') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               <label for="">confirm password</label>
               <input type="password" class="form-control" placeholder="Enter confirm password" wire:model="cpass">
               <span class="text-danger">@error('cpass') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               
               <button type="submit" class="btn btn-primary btn-sm">register</button>
            </div>
          </div>
         </form>
      </div>
      
    </div>
  </div>
</div>


