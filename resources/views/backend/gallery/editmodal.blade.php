<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Title Hero</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form id="editTeacherForm" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title Hero</label>
                        <input type="text" id="judul_hero" name="judul_hero" class="form-control" placeholder="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary update_teacher">Submit Form</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
