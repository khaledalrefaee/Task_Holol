<div id="add_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="dpzMultipleFiles" class="dropzone"  action="{{route('admin.store.product')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="col-form-label">Name Product <span class="text-danger">*</span></label>
                                <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" type="text">
                                @error('name')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">qty </label>
                                <input class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}"  name="qty" type="number">
                                @error('qty')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">short description </label>
                                <input class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" name="description" type="text">
                                @error('description')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">selling price product</label>
                                <input class="form-control @error('selling_price') is-invalid @enderror" value="{{ old('selling_price') }}" name="selling_price" type="number">
                                @error('selling_price')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">Image product : <span class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control @error('photos') is-invalid @enderror" id="imageInput" name="photos[]" multiple>
                                @error('photos')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>




                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Category</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    @foreach($category as $item)
                                    <option    value="{{$item->id}}"{{ old('category_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                            <!--end::Dropzone-->
                        </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn"  >Submit</button>
                    </div>
                </form>

                <div id="imagePreview" class="row">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // عند تغيير الملفات المحددة في حقل الإدخال
        $("#imageInput").change(function() {
            // إفراغ معاينة الصور الحالية
            $("#imagePreview").empty();

            // تحقق من وجود ملفات محددة
            if (this.files && this.files.length > 0) {
                // عرض كل صورة محددة
                for (let i = 0; i < this.files.length; i++) {
                    const file = this.files[i];
                    if (file.type.match('image.*')) {
                        // إضافة عنصر img لمعاينة الصورة
                        const img = document.createElement('img');
                        img.className = 'col-md-3'; // تعديل الأصناف حسب احتياجك
                        img.src = URL.createObjectURL(file);

                        // إضافة الصورة إلى معاينة الصور
                        $("#imagePreview").append(img);
                    }
                }
            }
        });
    });
</script>




