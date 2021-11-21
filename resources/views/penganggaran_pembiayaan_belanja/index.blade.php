@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Penganggaran Biaya Belanja') }} - {{ Auth::user()->desa->nama }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Penganggaran Biaya Belanja') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Penganggaran Biaya Belanja') }}
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
                    <table id="datatable" class="table table-striped table-bordered nowrap table-colored-bordered table-bordered-brown">
                        <thead>
                            <tr>
                                <th colspan="2">{{ __('Tahun Anggaran') }}</th>
                                <th colspan="3">
                                    {{ $tahunAnggaran->tahun }}
                                </th>
                            </tr>
                            <tr>
                                <th width="1">#</th>
                                <th width="1">{{ __('Kode') }}</th>
                                <th>{{ __('Nama Rekening') }}</th>
                                <th>{{ __('Jumlah Anggaran') }}</th>
                                <th width="1">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td> {{ __('Total Anggaran') }} </td>
                                <td id="grand_total" class="text-right"></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
</div> <!-- container -->
@endsection

@section('styles')
<link href="template/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="template/plugins/datatables/dataTables.checkboxes.css" rel="stylesheet" type="text/css" />
<style>
    tfoot td {
        border-top: 2px solid #aaa !important;
    }
</style>
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
        var routeAdd = '{{route("penganggaran.biaya-belanja.create", ["tahun_anggaran" => $tahunAnggaran->id])}}';
        var IndexRoute = '{{ route("penganggaran.biaya-belanja.index", ["tahun_anggaran" => $tahunAnggaran->id]) }}';
        var textAdd = '{{ __("Tambah Data") }}';
        var textDelete = '<i class="mdi mdi-delete-forever"></i> {{ __("Hapus") }}';
        var routeUp = '{{ route("biaya-belanja.tahun-anggaran.index")}}';
        var textUp = '{{ __("Tahun Anggaran") }}';

        table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            drawCallback: function(result) {
                $('#grand_total').html(result.json.grand_total);
            },
            ajax: IndexRoute,
            columns: [{
                data: 'rekening_objek.full_code',
                'checkboxes': true
            }, {
                data: 'rekening_objek.full_code',
            }, {
                data: 'rekening_objek.nama'
            }, {
                data: 'harga_satuan'
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
            }, {
                'targets': 3,
                'className': 'text-right'
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
                $("div.ColVis").append('<a href="' + routeAdd + '" class="btn btn-primary btn-sm">' + textAdd + '</a> <a href="' + routeUp + '" class="btn btn-inverse btn-sm"><i class="fa fa-level-up"></i> ' + textUp + '</a>');
            }
        });
    })
</script>
@stop