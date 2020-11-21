@extends('backend.layouts.master')
@push('styles')

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="content-wrapper" style="min-height: 1244.06px;">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-md-center">

                    <div class="col-lg-12">

                        <div class="card card-info mt-2">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }}</h3>
                            </div>
                            {!! Form::open([ 'route' => ['admin.purchase.store' ],'name'=>'supplierForm' ,'id' => 'supplierForm', 'method' => 'post']) !!}
                            @csrf
                            <div class="card-body">
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label>Date</label>

                                        <div class="input-group">
                                            <input class="form-control" name="date" id="datepicker" placeholder="MM-DD-YY"/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Purchase No</label>

                                        <div class="input-group">
                                            <input class="form-control" name="purchase_no" id="purchase_no" placeholder="Enter purchase no"/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group col-md-4">


                                            <label for="cuntry">Select Product</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option>Product name</option>
                                                @foreach($categories as $data_row)
                                                    <option value="{{ $data_row->id}}">{{ $data_row->name }}</option>
                                                @endforeach
                                            </select>

                                    </div>

                                    <div class="form-group col-md-4">
                                    @if($brands->count() < 1)
                                        <!-- Button trigger modal -->
                                            <a type="button" class="btn btn-outline-info mt-md-4" style="margin-top: 30px !important;" data-toggle="modal" data-target="#addBrandModal">
                                                Add Brand <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>

                                        @else
                                            <label for="cuntry">Select Brand</label>
                                            <select class="form-control" id="brand_id" name="brand_id">
                                                <option>Select brand</option>
                                                @foreach($brands as $data_row)
                                                    <option value="{{ $data_row->id}}">{{ $data_row->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-4">
                                        @if($categories->count() < 1)
                                            <!-- Button trigger modal -->
                                            <a type="button" class="btn btn-outline-info mt-md-4" style="margin-top: 30px !important;" data-toggle="modal" data-target="#addCatgModal">
                                                Add Category <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>

                                        @else
                                            <label for="cuntry">Select Category</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option>Select category</option>
                                                @foreach($categories as $data_row)
                                                    <option value="{{ $data_row->id}}">{{ $data_row->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-4">
                                    @if($sub_categories->count() < 1)
                                        <!-- Button trigger modal -->
                                            <a type="button" class="btn btn-outline-info mt-md-4" style="margin-top: 30px !important;" data-toggle="modal" data-target="#addCatgModal">
                                                Add Subcategory <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>

                                        @else
                                            <label for="cuntry">Select Subcategory</label>
                                            <select class="form-control" id="sub_category_id" name="sub_category_id">
                                                <option>Select Subcategory</option>
                                                @foreach($sub_categories as $data_row)
                                                    <option value="{{ $data_row->id}}">{{ $data_row->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>


                                    <div class="form-group col-md-4">
                                        @if($suppliers->count() < 1)
                                                <!-- Button trigger modal -->
                                                <a type="button" class="btn btn-outline-info mt-md-4" style="margin-top: 30px !important;" data-toggle="modal" data-target="#addSupplierModal">
                                                    Add Supplier <i class="fa fa-plus" aria-hidden="true"></i>
                                                </a>
                                        @else
                                            <label for="cuntry">Select Supplier</label>
                                            <select class="form-control" id="supplier_id" name="supplier_id">
                                                <option>Select supplier</option>
                                                @foreach($suppliers as $data_row)
                                                    <option value="{{ $data_row->id}}">{{ $data_row->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="status">Quantity</label>
                                        <input type="text" class="form-control" name="quantity" id="quantity">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="status">Purchase Price</label>
                                        <input type="text" class="form-control" name="price" id="price">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="status">Sale Price</label>
                                        <input type="text" class="form-control" name="sale_price" id="sale_price">
                                    </div>
                                    <div class="form-group col-md-4">
                                    @if($units->count() < 1)
                                        <!-- Button trigger modal -->
                                            <a type="button" class="btn btn-outline-info mt-md-4" style="margin-top: 30px !important;" data-toggle="modal" data-target="#addUnitModal">
                                                Add Unit <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>

                                        @else
                                            <label for="unit_id">Select Unit</label>
                                            <select class="form-control" id="unit_id" name="unit_id">
                                                <option>Select unit</option>
                                                @foreach($units as $data_row)
                                                    <option value="{{ $data_row->id}}">{{ $data_row->name }}</option>--}}
                                                @endforeach


                                            </select>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">@lang('form.btn_save')</button>
                                <a href="{{ route('admin.purchase.view') }}" class="btn btn-danger"><i
                                        class="fas fa-undo"></i></a>
                            </div>
                            {!! Form::close() !!}


                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">

                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section>

    </div>

    <!-- Category Modal-->
    <div class="modal fade" id="addCatgModal" tabindex="-1" role="dialog" aria-labelledby="addCatgModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open([ 'route' => ['admin.category.store'], 'id' => 'prdForm','method' => 'post']) !!}
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('form.name')<span class="text-danger">*</span></label>
                            {!! Form::text('name', null, [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter category name']) !!}
                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                        </div>

                        <div class="form-group">
                            <label for="code">@lang('form.code')<span class="text-danger">*</span></label>
                            {!! Form::text('code', null, [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter category code']) !!}
                            {!! $errors->first('code', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label for="status">@lang('form.status')</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <a href="{{ route('admin.category.view') }}" class="btn btn-danger"><i class="fas fa-undo"></i></a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <<!-- Supplier Modal-->
    <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open([ 'route' => ['admin.supplier.store'], 'id' => 'prdForm','method' => 'post']) !!}
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('form.name')<span class="text-danger">*</span></label>
                            <input class="form-control" name="name" placeholder="Enter supplier name"/>
                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                        </div>

                        <div class="form-group">
                            <label for="email">@lang('form.email')<span class="text-danger">*</span></label>
                            <input class="form-control" name="email" placeholder="Enter supplier email"/>
                            {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">@lang('form.mobile_no')<span
                                    class="text-danger">*</span></label>

                            <input class="form-control" name="mobile_no"
                                   placeholder="Enter supplier mobile no"/>
                            {!! $errors->first('mobile_no', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label for="address">@lang('form.address')<span class="text-danger">*</span></label>
                            <input class="form-control" name="address" placeholder="Enter supplier address"/>
                            {!! $errors->first('address', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option>Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">@lang('form.btn_save')</button>
                        <a href="{{ route('admin.suppliers.view') }}" class="btn btn-danger"><i class="fas fa-undo"></i></a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    <<!-- Brand Modal-->
    <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="addBrandModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open([ 'route' => ['admin.brand.store'], 'name'=>'brandForm' , 'id' => 'brandForm', 'method' => 'post']) !!}

                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('form.name')<span class="text-danger">*</span></label>

                            <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name" placeholder="Enter brand name"/>

                            @if ($errors->has('name'))
                                <div class="error">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="code">@lang('form.code')<span class="text-danger">*</span></label>

                            <input class="form-control" name="code" placeholder="Enter brand code"/>

                            {!! $errors->first('code', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label>@lang('form.body')</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter short desc...."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <select class="form-control" name="status">
                                <option>Select Option</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>





                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">@lang('form.btn_save')</button>
                        <a href="{{ route('admin.brand.view') }}" class="btn btn-danger"><i class="fas fa-undo"></i></a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="addUnitModal" tabindex="-1" role="dialog" aria-labelledby="addUnitModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open([ 'route' => ['admin.units.store'], 'id' => 'customerForm','method' => 'post']) !!}
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('form.name')<span class="text-danger">*</span></label>
                            {!! Form::text('name', null, [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter category name']) !!}
                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                        </div>

                        <div class="form-group">
                            <label for="status">@lang('form.brand')</label>
                            <select class="form-control" id="brand_id" name="brand_id">

                                <option>Select brand</option>
                                @foreach ($brands as $key => $brand_data)
                                    <option value="{{ $brand_data->id }}">{{ $brand_data->name }}</option>
                                @endforeach



                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">@lang('form.status')</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <a href="{{ route('admin.units.view') }}" class="btn btn-danger"><i class="fas fa-undo"></i></a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>



@endsection
@push('scripts')
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script type="text/javascript">


        $(document).ready(function () {
            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });

            $("#prdForm").submit(function (event) {
                loadAjax();
                event.preventDefault()
            });

            $('#supplierForm').validate({
                rules: {
                    name: {
                        required: true,
                        name: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    mobile_no: {
                        required: true,
                        mobile_no: true,
                    },
                    address: {
                        required: true,
                        address: true
                    },

                },
                messages: {
                    name: {
                        required: "Please enter a name",
                        name: "Please enter name"
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a email"
                    },
                    mobile_no: {
                        required: "Please enter a mobile no",
                        mobile_no: "Please enter a mobile"
                    },
                    address: {
                        required: "Please provide a address",
                        address: "Please write address"
                    }

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>


@endpush