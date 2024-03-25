<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Edit Package Feature') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form" action="{{ route('admin.package-feature.update') }}" method="post">
          
          @method('PUT')
          @csrf
          <input type="hidden" id="in_id" name="id">

          <div class="form-group">
            <label for="">{{ __('Name') . '*' }}</label>
            <input type="text" id="in_name" class="form-control" name="name" placeholder="Enter  Name">
            <p id="editErr_name" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">{{ __('Description') }}</label>
            <input type="text" id="in_description" class="form-control" name="description" placeholder="Enter Description">
            <p id="editErr_description" class="mt-1 mb-0 text-danger em"></p>
          </div>

      

       
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="updateBtn" type="button" class="btn btn-primary btn-sm">
          {{ __('Update') }}
        </button>
      </div>
    </div>
  </div>
</div>
