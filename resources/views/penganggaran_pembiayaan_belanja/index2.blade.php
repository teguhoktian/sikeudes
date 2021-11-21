@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Detail Penganggaran Pembiayaan Biaya') }} - {{ Auth::user()->desa->nama }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Penganggaran Pembiayaan Biaya') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Detail Penganggaran Pembiayaan Biaya') }}
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
                                <th colspan="5">
                                    {{ $tahunAnggaran->tahun }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">{{ __('Rekening') }}</th>
                                <th colspan="5">
                                    {{ $rekeningObjek->full_code }}
                                    - {{ $rekeningObjek->nama }}
                                </th>
                            </tr>
                            <tr>
                                <th width="1">#</th>
                                <th width="1">{{ __('No') }}</th>
                                <th>{{ __('Uraian') }}</th>
                                <th>{{ __('Anggaran') }}</th>
                                <th>{{ __('Volume') }}</th>
                                <th>{{ __('Total Anggaran') }}</th>
                                <th width="1">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td> {{ __('Total') }} </td>
                                <td></td>
                                <td></td>
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

<div class="row">
    {!! Form::open(['route' => ['penganggaran.biaya-belanja.destroy', ['tahun_anggaran' => $tahunAnggaran->id, 'rekening_objek' => $rekeningObjek->id]], 'id' => 'deleteForm']) !!}
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
        var IndexRoute = '{{ route("penganggaran.biaya-belanja.detail.index", ["tahun_anggaran" => $tahunAnggaran->id, "rekening_objek" => $rekeningObjek->id]) }}';
        var textAdd = '{{ __("Tambah Data") }}';
        var textDelete = '<i class="mdi mdi-delete-forever"></i> {{ __("Hapus") }}';
        var routeUp = '{{ route("penganggaran.biaya-belanja.index", ["tahun_anggaran" => $tahunAnggaran->id])}}';
        var textUp = '{{ __("Anggaran") }}';

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
                data: 'id',
                'checkboxes': true
            }, {
                data: 'DT_RowIndex',
                orderable: false,
                sortable: false
            }, {
                data: 'uraian',
            }, {
                data: 'harga_satuan'
            }, {
                data: 'volume'
            }, {
                data: 'total'
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
                'targets': -2,
                'className': 'text-right'
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