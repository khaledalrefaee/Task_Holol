@extends('backend.index')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Product</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Accounts</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_categories"><i class="fa fa-plus"></i> edit Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form novalidate="novalidate" action="{{route('admin.product.update',$Product->id)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <strong>name Category</strong>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{ old('name', $Product->name) }}"  placeholder="Enter name clincs">
                                @error('name')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">qty </label>
                                    <input class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty', $Product->qty) }}"  name="qty" type="number">
                                    @error('qty')
                                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">short description </label>
                                    <input class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $Product->description) }}" name="description" type="text">
                                    @error('description')
                                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">selling price product</label>
                                    <input class="form-control @error('selling_price') is-invalid @enderror" value="{{ old('selling_price', $Product->selling_price) }}" name="selling_price" type="number">
                                    @error('selling_price')
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
                        </div>
                        <div class="form-group">
                            <label for="academic_year">Image product : <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" class="form-control @error('photos') is-invalid @enderror" id="imageInput" name="photos[]" multiple>
                            @error('photos')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="imagePreview" class="row">
                            image update
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Go!</button>
                        </div>
                    </form>


                    <div class="row">
                        Image Old
                        @if($Product)
                            <div class="row">

                                @foreach($Product->images as $image)
                                    <div class="text-center">
                                        <img id="avatar-preview" src="{{ asset('back/assets/imag/product/' . $image->filename) }}"
                                        class="rounded-circle" style="width: 150px;" alt="Avatar" />
                                    </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>المنتج غير موجود.</p>
                        @endif
                    </div>
                </div>
                <!-- /.card -->
            </div>
@endsection


<script>
    document.getElementById('avter-input').addEventListener('change', function () {
        const fileInput = this;
        const previewImage = document.getElementById('imagePreview');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>


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
