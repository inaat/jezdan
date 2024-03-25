<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('Curriculum\ClassSubjectLessonController@update', [$subject_lesson->id]), 'method' => 'PUT', 'id' => 'lesson_edit_form','files' => true ]) !!}

        <div class="modal-header bg-primary">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">@lang('english.add_new_lesson')For<small>(@lang('english.subject_detail') - {{ $class_subject->name }} of class {{ $class_subject->classes->title }})</small></h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
 @php
                             $urdu_input=($class_subject->subject_input == 'ur') ? 'urdu_input urdu' : '';
                         @endphp
        <div class="modal-body">
            <div class="row m-0">
                 <div class="col-md-4 p-2 ">
                    {!! Form::label('chapter_id', __('english.chapters') . ':*') !!}
                    {!! Form::select('chapter_id', $chapters,$subject_lesson->chapter_id, ['class' => 'form-select select2 ', 'required', 'style' => 'width:100%', 'placeholder' => __('english.please_select')]) !!}
                </div>
                <div class="col-md-8 p-2 ">
                    {!! Form::label('name', __('english.lesson_title') . ':*') !!}
                    {!! Form::text('name',$subject_lesson->name, ['class' => 'form-control  ' . ' '. $urdu_input, 'required','placeholder' => __('english.lesson_title')]) !!}
                </div>
                <div class="clearfix"></div>
                 <div class="col-md-12 p-2">
                    {!! Form::label('description', __( 'english.description' ) . ':') !!}
                    {!! Form::textarea('description',$subject_lesson->description ,['class' => 'form-control', 'rows=4','placeholder' => __( 'english.description' ) ]); !!}
                </div> 

                <h4 class="mb-3">{{ __('files') }}</h4>
                @if (count($subject_lesson->file) > 0)
                    @foreach ($subject_lesson->file as $key => $file)
                        <div class="form-group">
                            <div class="row file_type_div" id="file_type_div">
                                <input type="hidden" id="edit_file_id"name="edit_file[{{ $key }}][id]"
                                    value="{{ $file->id }}" />

                                <div class="form-group col-md-2">
                                    <label>{{ __('type') }} </label>

                                    {!! Form::select(
                                        'edit_file[' . $key . '][type]',
                                        __('english.files_link'),
                                        getTypeDetailAttribute($file->type),
                                        [
                                            //'id' => 'file_type',
                                            'class' => 'form-select  file_type ',
                                            'style' => 'width:100%',
                                            'placeholder' => __('english.please_select'),
                                        ],
                                    ) !!}

                                </div>
                                <div class="form-group col-md-3" id="file_name_div">
                                    <label>{{ __('file_name') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="edit_file[{{ $key }}][name]"
                                        class="file_name form-control" placeholder="{{ __('file_name') }}"
                                        value="{{ $file->file_name }}" required>
                                </div>


                                <div class="form-group col-md-3" id="file_thumbnail_div"
                                    @if ($file->type == 1) style="display: none" @endif>
                                    <label>{{ __('thumbnail') }} <span class="text-danger">*</span></label>
                                    <input type="file" name="edit_file[{{ $key }}][thumbnail]"
                                        class="file_thumbnail form-control">
                                    <div style="width: 60px">
                                        <img src="{{ $file->file_thumbnail }}" id="file_thumbnail_preview"
                                            class="w-100"
                                            @if ($file->type == 1) style="display: none" @endif>
                                    </div>
                                </div>


                                <div class="form-group col-md-3" id="file_div"
                                    @if ($file->type != 1) style="display: none" @endif>
                                    <label>{{ __('file_upload') }} <span class="text-danger">*</span></label>
                                    <input type="file" name="edit_file[{{ $key }}][file]"
                                        class="file form-control" placeholder="">
                                    <a href="{{ $file->file_url }}" target="_blank" id="file_preview" class="w-100"
                                        @if ($file->type != 1) style="display: none" @endif>{{ $file->file_name }}</a>

                                </div>


                                <div class="form-group col-md-3" id="file_link_div"
                                    @if ($file->type == 1) style="display: none" @endif>
                                    <label>{{ __('link') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="edit_file[{{ $key }}][link]"
                                        class="file_link form-control" value="{{ $file->file_url }}"
                                        placeholder="{{ __('link') }}">
                                </div>

                                <div class="form-group col-md-1 mt-4 pl-0">
                                    <button type="button" class="btn btn-icon btn-danger remove-lesson-file"
                                        name="" data-id="{{ $file->id }}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="edit-extra-files mt-3"></div>
                    <div>
                        <div class="form-group mt-4 pl-0">
                            <button type="button" class="col-md-3 btn btn-inverse-success edit-lesson-file">
                                {{ __('add_new_files') }} <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                @else
                    <div class="form-group">

                        <div class="row file_type_div" id="file_type_div">
                            <div class="form-group col-md-2">
                                <label>{{ __('type') }} </label>
                                <select id="file_type" name="file[0][type]" class="form-control file_type ">
                                    <option value="">--{{ __('select') }}--</option>
                                    <option value="file_upload">{{ __('file_upload') }}</option>
                                    <option value="youtube_link">{{ __('youtube_link') }}</option>
                                    <option value="video_upload">{{ __('video_upload') }}</option>
                                    {{-- <option value="other_link">{{ __('other_link') }}</option> --}}
                                </select>
                            </div>
                            <div class="form-group col-md-3" id="file_name_div" style="display: none">
                                <label>{{ __('file_name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="file[0][name]" class="file_name form-control"
                                    placeholder="{{ __('file_name') }}" >
                            </div>
                            <div class="form-group col-md-3" id="file_thumbnail_div" style="display: none">
                                <label>{{ __('thumbnail') }} <span class="text-danger">*</span></label>
                                <input type="file" name="file[0][thumbnail]" class="file_thumbnail form-control">
                            </div>
                            <div class="form-group col-md-3" id="file_div" style="display: none">
                                <label>{{ __('file_upload') }} <span class="text-danger">*</span></label>
                                <input type="file" name="file[0][file]" class="file form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-3" id="file_link_div" style="display: none">
                                <label>{{ __('link') }} <span class="text-danger">*</span></label>
                                <input type="text" name="file[0][link]" class="file_link form-control"
                                    placeholder="{{ __('link') }}">
                            </div>

                            <div class="form-group col-md-1 col-md-1 mt-4 pl-0">
                                <button type="button" class="btn btn-inverse-success btn-icon add-lesson-file">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="extra-files mt-3"></div>
                    </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">

            <button type="submit" class="btn btn-primary">@lang( 'english.update' )</button>
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">@lang( 'english.close' )</button>
        </div>
    </div>

    {!! Form::close() !!}

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
