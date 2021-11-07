@extends('layouts.zircos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('RPJMD Dana Indikatif') }} - {{ Auth::user()->desa->nama }}</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="/">{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <a href="/">{{ __('RPJMD Dana Indikatif') }} </a>
                    </li>
                    <li class="active">
                        {{ __('RPJMD Dana Indikatif') }}
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
                                <th colspan="2"> {{ __('Visi') }}</th>
                                <th colspan="6">
                                    {{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->desa->kode }}.{{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->kode }}
                                    - {{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->uraian }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2"> {{ __('Bidang') }}</th>
                                <th colspan="6">
                                    {{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->desa->kode }}.{{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->kode }}.{{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->bidang->kode  }}
                                    - {{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->bidang->nama }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2"> {{ __('Bidang') }}</th>
                                <th colspan="6">
                                    {{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->desa->kode }}.{{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->kode }}.{{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->bidang->kode  }}.{{ $kegiatan->rpjmd_sub_bidang->sub_bidang->kode  }}
                                    - {{ $kegiatan->rpjmd_sub_bidang->sub_bidang->nama }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2"> {{ __('Kegiatan') }}</th>
                                <th colspan="6">
                                    {{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->desa->kode }}.{{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->kode }}.{{ $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->bidang->kode  }}.{{ $kegiatan->rpjmd_sub_bidang->sub_bidang->kode  }}.{{ $kegiatan->kegiatan->kode  }}
                                    - {{ $kegiatan->kegiatan->nama }}
                                </th>
                            </tr>
                            <tr>
                                <th width="1">#</th>
                                <th width="1">{{ __('Tahun') }}</th>
                                <th>{{ __('Sumber Dana') }}</th>
                                <th>{{ __('Volume') }}</th>
                                <th>{{ __('Satuan') }}</th>
                                <th>{{ __('Biaya') }}</th>
                                <th>{{ __('Lokasi') }}</th>
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
        {!! Form::open(['route' => ['rpjmd.dana.indikatif.destroy', ['kegiatan' => $kegiatan->id]], 'id' => 'deleteForm']) !!}
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
        var routeAdd = '{{route("rpjmd.dana.indikatif.create", ["kegiatan" => $kegiatan->id])}}';
        var IndexRoute = '{{ route("rpjmd.dana.indikatif.index", ["kegiatan" => $kegiatan->id]) }}';
        var textAdd = '{{ __("Tambah Data") }}';
        var textDelete = '<i class="mdi mdi-delete-forever"></i> {{ __("Hapus") }}';
        var textUp = '{{ __("Kegiatan") }}';
        var routeUp = '{{ route("rpjmd.kegiatan.index", ["sub_bidang" => $kegiatan->rpjmd_sub_bidang->id]) }}';

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
                data: 'tahun_kegiatan.tahun_ke',
            }, {
                data: 'sumber_dana.kode'
            }, {
                data: 'volume'
            }, {
                data: 'satuan'
            }, {
                data: 'biaya'
            }, {
                data: 'lokasi'
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