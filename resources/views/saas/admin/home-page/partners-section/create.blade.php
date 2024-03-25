<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Partner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ajaxForm" class="modal-form create"
                    action="{{ route('admin.home_page.store_partner', ['language' => request()->input('language')]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">{{ __('Image') . '*' }}</label>
                                <br>
                                <div class="thumb-preview">
                                    <img src="{{ asset('assets/saas/admin/img/noimage.jpg') }}" alt="..."
                                        class="uploaded-img">
                                </div>

                                <div class="mt-3">
                                    <div role="button" class="btn btn-primary btn-sm upload-btn">
                                        {{ __('Choose Image') }}
                                        <input type="file" class="img-input" name="image">
                                    </div>
                                </div>
                                <p id="err_image" class="mt-1 mb-0 text-danger em"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Language') . '*' }}</label>
                        <select name="language_id" class="form-control">
                            <option selected disabled>{{ __('Select a Language') }}</option>
                            @foreach ($langs as $lang)
                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        <p id="err_language_id" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('URL') }} **</label>
                        <input type="text" class="form-control ltr" name="url" value=""
                            placeholder="Enter URL">
                        <p id="err_url" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Serial Number') }} **</label>
                        <input type="number" class="form-control ltr" name="serial_number" value=""
                            placeholder="Enter Serial Number">
                        <p id="err_serial_number" class="mb-0 text-danger em"></p>
                        <p class="text-warning">
                            <small>{{ __('The higher the serial number is, the later the partner will be
                                                                                        shown') }}</small>
                        </p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button id="submitBtn" type="button" class="btn btn-primary">{{ __('Submit') }}</button>
            </div>
        </div>
    </div>
</div>
