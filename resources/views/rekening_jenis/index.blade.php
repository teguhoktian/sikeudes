@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Rekening Jenis') }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Rekening Jenis') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Rekening Jenis') }}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <table class="table table-bordered">
                    <tr>
                        <th colspan="2" width="10%">Kode Akun</th>
                        <th>Nama Akun</th>
                    </tr>
                    <tr>
                        <td>{{ $rekeningKelompok->akun->kode }}</td>
                        <td></td>
                        <td>{{ $rekeningKelompok->akun->nama }}</td>
                    </tr>
                    <tr>
                        <td>{{ $rekeningKelompok->akun->kode }}</td>
                        <td>{{ $rekeningKelompok->kode }}</td>
                        <td>{{ $rekeningKelompok->nama }}</td>
                    </tr>
                </table>

                <div class="table-responsive table-responsive">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
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
        {!! Form::open(['route' => ['rekening-jenis.destroy', ['rekening_kelompok' => $rekeningKelompok->id]], 'id' => 'deleteForm']) !!}
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
        var routeAdd = '{{route("rekening-jenis.create", ["rekening_kelompok" => $rekeningKelompok->id])}}';
        var IndexRoute = '{{ route("rekening-jenis.index", ["rekening_kelompok" => $rekeningKelompok->id]) }}';
        var routeUp = '{{ route("rekening-kelompok.index", ["rekening_akun" => $rekeningKelompok->akun->id]) }}';
        var textAdd = '{{ __("Tambah Data") }}';
        var textUp = '{{ __("Up") }}';
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
                data: 'kode',
            }, {
                data: 'nama'
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
                var button = '';
                button += '<a href="' + routeAdd + '" class="btn btn-primary btn-sm">' + textAdd + '</a>';
                button += ' <button class="btn btn-sm btn-danger" id="btnDelete" onclick="deleteData()">' + textDelete + '</button>';
                button += ' <a href="' + routeUp + '" class="btn btn-inverse btn-sm"><i class="fa fa-level-up"></i> ' + textUp + '</a>';
                $("div.ColVis").append(button);
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