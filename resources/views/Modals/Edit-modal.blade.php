

<!-- Modal -->
<div class="modal fade EditEmployee" wire:ignore.self role="dialog" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="update">
             <input type="hidden" wire:model="cid">
            <div class="form-group">
              <label for="">Employee Role</label>
              <select class="form-control" wire:model="upd_employee">
                  <option value="">no selected</option>
                  <option value="outside">outside</option>
                  <option value="inside">intside</option>
              </select>
              <span class="text-danger">@error('upd_employee') {{ $message }} @enderror</span>
            </div>
            <div class="form-group" >
                <label for="">Employee Name</label>
                <input type="text" class="form-control" placeholder="employee name" wire:model="upd_employee_name">
                 <span class="text-danger">@error('upd_employee_name') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="">Employee address</label>
                <input type="text" class="form-control" placeholder="employee address" wire:model="upd_employee_address">
                <span class="text-danger">@error('upd_employee_address') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="">Employee ID</label>
                <input type="number" class="form-control" placeholder="employee ID" wire:model="upd_employee_id">
                <span class="text-danger">@error('upd_employee_id') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-sm">save change</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
