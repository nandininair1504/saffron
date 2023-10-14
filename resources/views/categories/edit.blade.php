<!-- The Modal -->
<div class="modal" id="editCategoryModal_{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="row g-3 needs-validation" novalidate action="{{ route('categories.edit', ['id' => $id]) }}" >
                    @csrf
                    <div class="col-md-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $title }}"
                               required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





