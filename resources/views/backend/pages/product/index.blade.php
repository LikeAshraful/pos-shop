@extends('backend.layouts.master')


@section('content')

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">

                        <div class="card mt-2">
                            <div class="card-header">
                                <h3 class="card-title">{{$title}} List</h3>
                                <div class="float-right">
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-outline-info"><i class="fas fa-plus"></i> &nbsp;Add {{$title}}</a>
                                </div>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>@lang('form.th_id')</th>
                                        <th>@lang('form.th_title')</th>
                                        <th>@lang('form.th_supplier')</th>
                                        <th>@lang('form.th_product_category')</th>
                                        <th>@lang('form.th_product_brand')</th>
                                        <th>@lang('form.th_price')</th>
                                        <th>@lang('form.th_quantity')</th>
                                        <th>@lang('form.th_units')</th>
                                        <th>@lang('form.th_created_by')</th>
                                        <th>@lang('form.th_action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if(count($products))
                                        @foreach ($products as $key => $list)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $list->name }}</td>
                                                <td><button type="button" class="btn btn-block btn-info btn-xs">{{ $list->prd_supplier_relation->name }}</button></td>
                                                <td>{{ $list->prd_category_relation->name }}-
                                                    <span class="badge badge-success">{{ $list->sub_category_relation->name }}</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-block bg-gradient-info btn-xs">{{ $list->prd_brand_relation->name }}</button>
                                                </td>
                                                <td><button type="button" class="btn btn-block bg-gradient-success btn-xs">{{ $list->price }}</button></td>
                                                <td><button type="button" class="btn btn-block bg-gradient-warning btn-xs">{{ $list->quantity }}</button></td>
                                                <td>{{ $list->prd_unit_relation->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($list->created_at)->diffForHumans() }}</td>



                                                <td>

                                                    <a href="{{ route('admin.products.edit', $list->id ) }}" class="badge badge-info">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>

                                                    <a href="#deleteModal{{ $list->id }}" data-toggle="modal"
                                                       class="badge badge-danger">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $list->id }}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are
                                                                        sure to delete?</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{!! route('admin.products.delete', $list->id) !!}"
                                                                        method="post">
                                                                        {{ csrf_field() }}
                                                                        <button type="submit" class="btn btn-danger">
                                                                            Permanent Delete
                                                                        </button>
                                                                    </form>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Delete Modal -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5"> Opps!!, {{$title}} Not found</td>
                                        </tr>
                                    @endif
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
          href="{{ URL::asset('backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('scripts')
    <script src="{{ URL::asset('backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- DataTables -->
    <script src="{{ URL::asset('backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ URL::asset('backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ URL::asset('backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ URL::asset('backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

@endpush
