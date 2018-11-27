@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop
@section('page_title', __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content container-fluid" id="app">
        <form role="form"
              class="form-edit-add"
              action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
              method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if(!is_null($dataTypeContent->getKey()))
                {{ method_field("PUT") }}
            @endif

            <!-- CSRF TOKEN -->
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">
                    <!-- ### TITLE ### -->
                    <div class="panel">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="voyager-character"></i> Product Information
                                    <span class="panel-desc">The name of your product</span>
                                </h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('voyager::generic.name') }}" value="@if(isset($dataTypeContent->name)){{ $dataTypeContent->name }}@endif">
                            </div>
                        </div>
                    <!-- ### Details ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                            <div class="panel-body">
                                <input type="text" class="form-control" name="details" id="details" required="" placeholder="{{ __('voyager::generic.details') }}" value="@if(isset($dataTypeContent->details)){{ $dataTypeContent->details }}@endif">
                            </div>
                    </div>
                    <!-- ### Price ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Price</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <input type="number" class="form-control" name="price" id="price" required="" placeholder="{{ __('voyager::generic.price') }}" value="@if(isset($dataTypeContent->price)){{ $dataTypeContent->price }}@endif">
                        </div>
                    </div>

                    <!-- ### Description ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Description</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>
                        @php
                            $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                            $row = $dataTypeRows->where('field', 'description')->first();
                        @endphp

                        <div class="panel-body">
                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                        </div>
                    </div><!-- .panel -->

                    <!-- ### FEATUREDS ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Featureds</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>

                        <div class="panel-body" id="featuredsContainer">
                            <span style="border: 2px solid green; padding: 1rem 2rem; cursor: pointer;" id="add-feature">Add feature</span>
                            <div style="margin-top: 2rem;" class="feature-form">
                                <select name="feature_id[]">
                                    @foreach($allCategories as $category)
                                            <optgroup label="{{ $category->name }}">
                                                @foreach($category->featureds as $featured)
                                                    <option value="{{ $featured->slug }}">{{ $featured->name }}</option>
                                                @endforeach
                                            </optgroup>
                                    @endforeach
                                </select>
                                <input type="text" name="value_feature[]" placeholder="Value of feature"/>
                                <span onclick="$(this).parent().remove()" class="feature_delete" style="border: 2px solid red; padding: 1rem 2rem; cursor: pointer;">Delete</span>
                            </div>
                        </div>
                    </div><!-- .panel -->

                </div>
                <div class="col-md-4">
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i>Details</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" data-slug-origin="name" id="slug" name="slug"
                                       placeholder="slug"
                                       {{!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "slug") !!}}
                                       value="@if(isset($dataTypeContent->slug)){{ $dataTypeContent->slug }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="featured">Featrued</label>
                                @php
                                    $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                                    $row = $dataTypeRows->where('field', 'featured')->first();
                                @endphp

                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}

                            </div>
                        </div>

                    <!-- ### CATEGORIES ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i>Categories</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul>
                                @foreach($allCategories as $category)
                                    <li><label><input data-id="{{ $category->id }}" type="checkbox" class="category" value="{{ $category->id }}" name="categories[]" {{ $categoriesForProduct->contains($category) ? 'checked' : '' }}>{{ $category->name }}</label>
                                        <ul>
                                            @foreach($category->featureds as $featured)
                                                <li>{{ $featured->name }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- ### IMAGE ### -->
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i>Product Image</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(isset($dataTypeContent->image))
                                <img src="{{ filter_var($dataTypeContent->image, FILTER_VALIDATE_URL) ? $dataTypeContent->image : Voyager::image( $dataTypeContent->image ) }}" style="width:100%" />
                            @endif
                            <input type="file" name="image">
                        </div>
                    </div>
                    <!--## IMAGES ##-->
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i>Product Images</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                @php
                                    $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                                    $row = $dataTypeRows->where('field', 'images')->first();
                                @endphp

                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-left">
                @if(isset($dataTypeContent->id)) Update @else <i class="icon wb-plus-circle"></i> Add @endif
            </button>
            </div>
        </form>
    </div>
        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
               enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                <input name="image" id="upload_file" type="file"
                       onchange="$('#my_form').submit();this.value='';">
                <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                {{ csrf_field() }}
        </form>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script src="/js/axios.js"></script>
    <script>
        //window.axios.defaults.headers.common['X-CSRF-TOKEN'] = Laravel.csrfToken;
        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        //window.axios.defaults.headers.common['Authorization'] = 'Bearer' + Laravel.apiToken;
        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                e.preventDefault();
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataType->slug }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
            var price = $('input[name="price"]').val();
            $('input[name="price"]').val(price / 100);

            $('#add-feature').click(function (e) {
                $('#featuredsContainer').append($('.feature-form').first().clone());
            });
        });

        (function () {
            let categories = [];
            const category = document.querySelectorAll('.category');


            Array.from(category).forEach(function (element) {
                if (element.checked) {
                    categories.push(element.getAttribute('data-id'))
                }
                element.addEventListener('change', function () {
                    categories = []
                    Array.from(category).forEach(function (e) {
                        if (e.checked) {
                            categories.push(e.getAttribute('data-id'))
                        }
                    })
                })
            })
        })()
    </script>
@stop
