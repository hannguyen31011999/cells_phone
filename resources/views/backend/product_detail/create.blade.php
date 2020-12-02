@extends('backend.master')

@section('css')
<style type="text/css">
	.alert{
		margin-top: 5px;
	}
</style>
@endsection

@section('content')
<br></br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Trang chi tiết sản phẩm</h4>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @if(Session::has('error'))
                            <div class="alert alert-danger" style="margin-top: 5px;">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        @if(isset($product))
                        <form action="{{route('product_detail.create',['id'=>$product->id])}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Tên sản phẩm</label>
                                <div class="col-lg-10">
                                    <input type="text" name="price_product" class="form-control" value="{{$product->product_name}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Bộ nhớ trong</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="rom">
                                        <option value="32">
                                            32GB
                                        </option>
                                        <option value="64">
                                            64GB
                                        </option>
                                        <option value="128">
                                            128GB
                                        </option>
                                        <option value="256">
                                            256GB
                                        </option>
                                        <option value="512">
                                            512GB
                                        </option>
                                    </select>
                                    @if($errors->has('rom'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('rom')}}
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Giá tiền</label>
                                <div class="col-lg-10">
                                    <input type="number" name="price_product" class="form-control" value="{{old('price_product')}}" placeholder="Nhập giá tiền">
                                    @if($errors->has('price_product'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('price_product')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"><input type="submit" class="btn btn-primary waves-effect width-md waves-light" value="Tạo mới"></div>
                                <div class="col-lg-2"><a href="{{route('product_detail.list',['id'=>$product])}}" class="btn btn-warning waves-effect width-md waves-light" style="margin-left: 25px;">Quay lại</a></div>
                                <div class="col-lg-2"></div>
                            </div>
                        </form>
                        @endif
                    </div>
                    <div class="col-2"></div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('js')
@endsection