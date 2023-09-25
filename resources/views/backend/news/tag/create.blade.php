@extends('backend.layouts.app')

@section('title')
    Create Tag News
@endsection

@section('content')
    <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">News</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tag</a></li>
                    <li class="breadcrumb-item active">Create Tag</li>
                </ol>
            </div>
            <h4 class="page-title">Create Tag</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form autocomplete="off" action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="title">Tag</label>
                        <input type="text" class="form-control {{$errors->first('title')
                        ? "is-invalid": ""}}" id="title" name="title" placeholder="Enter Tag">
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="slug">Slug</label>
                        <input type="text" class="form-control {{$errors->first('slug')
                        ? "is-invalid": ""}}" id="slug" name="slug" placeholder="Auto Generate" readonly>
                        <div class="invalid-feedback">
                            {{$errors->first('slug')}}
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        function generateSlug(value) {
            return value.trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, '-')
                .replace(/-+/g, '-').replace(/^-|-$/g, "");
        }

        //event: input title
        $('#title').change(function(){
            let title = $(this).val();
            $('#slug').val(generateSlug(title));
        });
    });

</script>
@endsection