

<!-- Modal -->
<div class="modal fade addlogin" wire:ignore.self role="dialog" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title btn_down" id="staticBackdropLabel" style="cursor:pointer;" wire:click="showlogin()">login</h5>
          <h5 class="modal-title btn_up" id="staticBackdropLabel" style="cursor:pointer;" wire:click="showsignup()" >sign up</h5>
           
      </div>
      <div class="modal-body" style="height:320px; overflow:hidden;">
     
        <form wire:submit.prevent="check" >
          <div class="showmodal">
            <div class="form-group">
               <label for="">user name</label>
               <input type="text" class="form-control" placeholder="Enter username" wire:model="username">
                <span class="text-danger">@error('username') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               <label for="">password</label>
               <input type="password" class="form-control" placeholder="Enter password" wire:model="password">
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               
               <button type="submit" class="btn btn-primary btn-sm">login</button>
            </div>
          </div>
         
        </form>
        
      </div>
      
    </div>
  </div>
</div>
