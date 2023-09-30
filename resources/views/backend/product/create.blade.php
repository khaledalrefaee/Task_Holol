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
                <form method="post" action="{{route('admin.store.product')}}" enctype="multipart/form-data">
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
                                <input type="file" accept="image/*" class="form-control @error('photos') is-invalid @enderror"   name="photos[]" multiple>
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

                    </div>


                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function initMap() {
        // Create a new map centered on your current location
        navigator.geolocation.getCurrentPosition(function(position) {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                },
                zoom: 17
            });

            // Create a marker at your current location
            var marker = new google.maps.Marker({
                position: {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                },
                map: map,
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                }
            });

            // Allow the user to drag the marker
            marker.setDraggable(true);

            // Update the marker's position when the user drags it
            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById("latitude").value = this.getPosition().lat();
                document.getElementById("longitude").value = this.getPosition().lng();
            });
        });
    }
</script>
