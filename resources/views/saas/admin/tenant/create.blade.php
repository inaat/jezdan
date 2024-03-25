<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add Tenent Information') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form create" action="{{ route('admin.tenant.new_tenant_store') }}" method="post">
          @csrf

          <div class="form-group">
            <label for="">{{ __('Name') . '*' }}</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name">
            <p id="err_name" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">{{ __('Email') . '*' }}</label>
            <input type="text" class="form-control" name="email" placeholder="Enter email">
            <p id="err_email" class="mt-1 mb-0 text-danger em"></p>
          </div>

       <div class="form-group">
            <label for="">{{ __('Username') . '*' }}</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username">
            <p id="err_username" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">{{ __('Mobile') . '*' }}</label>
            <input type="text" class="form-control" name="mobile" placeholder="Enter mobile">
            <p id="err_mobile" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">{{ __('School Name') . '*' }}</label>
            <input type="text" class="form-control" name="school_name" placeholder="Enter school Name">
            <p id="err_school_name" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">{{ __('subdomain') . '*' }}</label>
            <input type="text" class="form-control" name="subdomain" placeholder="Enter subdomain">
            <p id="err_subdomain" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">{{ __('Address') . '*' }}</label>
            <input type="text" class="form-control" name="address" placeholder="Enter address">
            <p id="err_address" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for="">{{ __('City') . '*' }}</label>
            <input type="text" class="form-control" name="city" placeholder="Enter Your city">
            <p id="err_city" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="">{{ __('Country') . '*' }}</label>
            <input type="text" class="form-control" name="country" placeholder="Enter Your country Name">
            <p id="err_country" class="mt-1 mb-0 text-danger em"></p>
          </div>
          
          <div class="form-group">
            <label for="">{{ __('State') . '*' }}</label>
            <input type="text" class="form-control" name="state" placeholder="Enter Your state">
            <p id="err_state" class="mt-1 mb-0 text-danger em"></p>
          </div>

        


        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="submitBtn" type="button" class="btn btn-primary btn-sm">
          {{ __('Save') }}
        </button>
      </div>
    </div>
  </div>
</div>
