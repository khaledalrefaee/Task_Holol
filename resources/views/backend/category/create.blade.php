<div class="modal custom-modal fade" id="add_categories" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('admin.store.category')}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label>Categories Name <span class="text-danger">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" type="text">
                        @error('name')
                        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                        @enderror
                        <br>


                    </div>



                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
