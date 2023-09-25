<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Add Hero</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form id="addTeacherForm" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Title Hero</label>
                        <input type="text" name="judul_hero" class="form-control" placeholder="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Background</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button id="button-background" data-input="input_post_background"
                                    class="btn btn-primary" type="button">
                                    Browse
                                </button>
                            </div>
                            <input id="input_post_background" name="gambar" value="{{ old('gambar') }}" type="text" class="form-control" placeholder="" readonly />
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" placeholder="">
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add_teacher">Submit Form</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
