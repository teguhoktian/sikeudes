@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Penganggaran Sub Bidang') }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Penganggaran Sub Bidang') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Penganggaran Sub Bidang') }}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="table-responsive table-responsive">
                    <table id="datatable" class="table table-striped table-bordered table-colored-bordered table-bordered-brown dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th colspan="2">{{ __('Tahun Anggaran') }}</th>
                                <th colspan="2">
                                    {{ $bidang->tahun_anggaran->tahun }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">{{ __('Bidang') }}</th>
                                <th colspan="2">
                                    {{ $bidang->bidang->kode }}
                                    - {{ $bidang->bidang->nama }}
                                </th>
                            </tr>
                            <tr>
                                <th width="1">#</th>
                                <th width="1">{{ __('Kode') }}</th>
                                <th>{{ __('Nama') }}</th>
                                <th width="1">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        {!! Form::open(['route' => ['penganggaran.subbidang.destroy', ['bidang' => $bidang->id]], 'id' => 'deleteForm']) !!}
        </form>
    </div>

</div> <!-- container -->
@endsection

@section('styles')
<link href="template/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/dataTables.checkboxes.css" rel="stylesheet" type="text/css" />
@stop

@section('javascript')
<script src="template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="template/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="template/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="template/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="template/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="template/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="template/plugins/datatables/dataTables.checkboxes.min.js"></script>
<script src="template/plugins/datatables/dataTables.colVis.js"></script>
<script type="text/javascript">
    var table = '';
    $(document).ready(function() {
        var routeAdd = '{{route("penganggaran.subbidang.create", ["bidang" => $bidang->id])}}';
        var routeUp = '{{ route("penganggaran.bidang.index", ["tahun_anggaran" => $bidang->tahun_anggaran->id]) }}';
        var IndexRoute = '{{ route("penganggaran.subbidang.index", ["bidang" => $bidang->id]) }}';
        var textUp = '{{ __("Bidang") }}';
        var textAdd = '{{ __("Tambah Data") }}';
        var textDelete = '<i class="mdi mdi-delete-forever"></i> {{ __("Hapus") }}';

        table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            ajax: IndexRoute,
            columns: [{
                data: 'id',
                'checkboxes': true
            }, {
                data: 'sub_bidang.kode',
            }, {
                data: 'sub_bidang.nama'
            }, {
                data: 'action',
                orderable: false,
                sortable: false
            }],
            'columnDefs': [{
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }],
            'select': {
                'style': 'multi'
            },
            'order': [
                [1, 'asc']
            ],
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "{{ __('Pilih Kolom') }}",
                exclude: [0, 5]
            },
            initComplete: function() {
                $("div.ColVis").append('<a href="' + routeAdd + '" class="btn btn-primary btn-sm">' + textAdd + '</a> <button class="btn btn-sm btn-danger" id="btnDelete" onclick="deleteData()">' + textDelete + '</button> <a href="' + routeUp + '" class="btn btn-inverse btn-sm"><i class="fa fa-level-up"></i> ' + textUp + '</a>');
            }
        });
    })

    function deleteData() {
        var rows_selected = table.column(0).checkboxes.selected();
        var form = $('#deleteForm');
        $.each(rows_selected, function(index, rowId) {
            form.append(
                $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
            );
        });
        form.submit();
    }
</script>
@stop