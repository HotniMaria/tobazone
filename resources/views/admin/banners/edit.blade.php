@extends('admin.layouts.app')
@section('title') {{ "edit" }}
@endsection

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Banner
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="POST" action="{{ url('/banner/update', $banner->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" name="title" value={{ $banner->title}} />
                </div>

                <div class="form-group">
                    <label for="name">Link</label>
                    <input type="text" class="form-control" name="link" value={{ $banner->link}} />
                </div>
                
                <div class="form-group">
                    <label for="summernote">Description</label>
                    <textarea id="summernote"   class="form-control summernote"  name="description" value={{ $banner->description}}>{{ $banner->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="file-input" class=" form-control-label">Upload Foto</label>
                    <input type="file" name="image" class="form-control" />
                </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({});
            var body = {!! json_encode( $banner->description) !!};
            $('.summernote').summernote('code', body);
        });
    </script>
@endsection