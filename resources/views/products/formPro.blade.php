@extends("layout")
@section("main")
    <div class="content-wrapper">
        <div class="container">
            <h2>Thêm category</h2>
            <div class=" col-md-6">
                <form action="{{url("/products/save")}}" method="post">
                    @csrf
                    <div class="form-group">
                        <lable><h5>Tên sản phẩm:</h5></lable>
                        <input type="text" class="form-control" placeholder="Tên..." name="name" value="">
                    </div>
                    <div class="form-group">
                        <lable><h5>Hình ảnh(chỉ link ảnh):</h5></lable>
                        <input type="text" class="form-control" placeholder="Ảnh..." name="image" value="">
                    </div>
                    <div class="form-group">
                        <lable><h5>Mô tả:</h5></lable>
                        <input type="text" class="form-control" placeholder="Mô tả..." name="description" value="">
                    </div>
                    <div class="form-group">
                        <lable><h5>Giá:</h5></lable>
                        <input type="number" class="form-control" min="0" placeholder="Giá..." name="price" value="">
                    </div>
                    <div class="form-group">
                        <lable><h5>Số lượng:</h5></lable>
                        <input type="number" class="form-control" min="0" placeholder="Số lượng..." name="qty" value="">
                    </div>
                    <div class="form-group">
                        <lable><h5>Loại bánh:</h5></lable>
                        <select required name="category_id" class="form-control" >
                            <option selected value="" disabled>Chọn 1 loại bánh</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary my-5 me-5 px-5">Lưu</button>
                    <button type="reset" class="btn btn-warning my-5 me-3 px-5">Reset</button>
                    <a href="/">
                        <button type="button" class="btn btn-success my-5 me-3 px-5">Về trang chủ</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
