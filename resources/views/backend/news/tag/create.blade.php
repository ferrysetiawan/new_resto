@extends('backend.layouts.global')

@section('title')
    Create Tag News
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Tag News</h1>
    </div>
    <div class="section-body">
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
    </div>
</section>
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
