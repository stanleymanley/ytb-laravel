@extends('admin.layouts.base')
@section('title',$content->title)
@section('content')

<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Konten</h6>

    </div>
    <!-- Card Body -->
    <div class="card-body">
        <form method="POST" action="{{url('/admin/content/update/'.$content->id)}}" enctype="multipart/form-data" autocomplete="off" class="@if($errors->any()) needs-validation was-validated @endif" novalidate>
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="input_judul">Judul :</label>
                        <input type="text" name="judul" class="form-control" id="input_judul" placeholder="Masukan judul" value="{{$content->title}}" required>
                        @error('judul')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="input_konten">Konten :</label>
                        <textarea rows="3" id="input_konten" class="form-control" name="konten">{{$content->content}}</textarea>
                        @error('konten')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="input_cover">Cover :</label>
                        <input type="file" name="cover" class="form-control" id="input_cover" accept="image/*">
                        @error('judul')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        @if ($content->cover != null)
                        <img class="img-thumbnail" src="{{asset('/media/cover/'.$content->cover)}}"/>
                        @else
                        <p><i>Cover tidak tersedia</i></p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="input_status">Status :</label>
                        <select class="form-control" id="input_status" name="status">
                            <option value="draft" @if($content->status == 'draft') selected @endif>Draft</option>
                            <option value="publish" @if($content->status == 'publish') selected @endif>Publish</option>
                        </select>
                        @error('input_status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{url('/admin/content')}}" class="btn btn-light">Kembali</a>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('/assets/vendor/tinymce/tinymce.min.js')}}"></script>
{{-- <script src="{{asset('/assets/vendor/ckeditor/adapters/jquery.js')}}"></script> --}}
<script>
    $(function(){
        // $('#input_konten').ckeditor()
        tinymce.init({
            selector: 'textarea#input_konten',
            theme: 'modern',
            urlconverter_callback : 'myCustomURLConverter',
            paste_data_images: true,
            // images_upload_url: 'postAcceptor.php',
            setup: function(editor){
                editor.on('focus', function(e) {
                    $('button.btn-checkout-media').removeAttr('disabled');
                    //console.log('focus');
                });
                editor.on('focusout', function(e) {
                    //$('button.btn-checkout-media').attr('disabled','disabled');
                    //console.log('focus out');
                });
            },
            menu: {
                file: {title: 'File', items: 'newdocument'},
                edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
                //insert: {title: 'Insert', items: 'link media | template hr'},
                insert: {title: 'Insert', items: 'link template hr pagebreak'},
                view: {title: 'View', items: 'visualchars preview'},
                format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
                table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
                tools: {title: 'Tools', items: 'spellchecker code'}
            },
            plugins: [
                'autoresize advlist autolink lists link charmap preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code',
                'insertdatetime nonbreaking save table contextmenu directionality',
                'paste textcolor colorpicker textpattern codesample image'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | image',
            toolbar2: 'preview | forecolor backcolor fontselect fontsizeselect | codesample',
            extended_valid_elements: "iframe[src|width|height|name|align], embed[width|height|name|flashvars|src|bgcolor|align|play|loop|quality|allowscriptaccess|type|pluginspage]"

            });
    });

    function myCustomURLConverter(url, node, on_save, name) {
        // Do some custom URL conversion
        url = url.substring(0);

        // Return new URL
        return url;
    }
</script>
@endpush
