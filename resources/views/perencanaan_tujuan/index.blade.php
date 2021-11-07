@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('Tujuan') }} - {{ Auth::user()->desa->nama }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('Tujuan') }} </a>
                    </li>
                    <li class="active">
                        {{ __('Tujuan') }}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th width="10%">{{ __('Kode Misi') }}</th>
                        <th>{{ __('Uraian') }}</th>
                    </tr>
                    <tr>
                        <td width="10%">
                            {{ Auth::user()->desa->kecamatan->kode }}.{{ Auth::user()->desa->kode }}.{{ $misi->visi->kode }}.{{ $misi->kode }}
                        </td>
                        <td>{{ $misi->uraian }}</td>
                    </tr>
                </table>
                <div class="table-responsive table-responsive">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th width="1">#</th>
                                <th width="1">{{ __('Kode') }}</th>
                                <th>{{ __('Uraian') }}</th>
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
        {!! Form::open(['route' => ['tujuan.destroy', ['misi' => $misi->id]], 'id' => 'deleteForm']) !!}
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
        var routeAdd = '{{route("tujuan.create", ["misi" => $misi->id])}}';
        var IndexRoute = '{{ route("tujuan.index", ["misi" => $misi->id]) }}';
        var routeUp = '{{ route("misi.index", ["visi" => $misi->visi->id]) }}';
        var textAdd = '{{ __("Tambah Data") }}';
        var textUp = '{{ __("Misi") }}';
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
                data: 'uraian'
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