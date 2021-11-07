Visi dan Misi {{ $visi->desa->nama }}
<br/>
{{ $visi->tahun_awal }} s.d. {{ $visi->tahun_akhir }}
<table border="1" width="100%">
    <tr>
        <td width="{{ 100/4 }}%">Visi</td>
        <td width="{{ 100/4 }}%">Misi</td>
        <td width="{{ 100/4 }}%">Tujuan</td>
        <td width="{{ 100/4 }}%">Sasaran</td>
    </tr>
    <tbody>
        @php
            $visi = '';
            $misi = '';
            $tujuan = '';
            $sasaran = '';
        @endphp

        @foreach($data as $d)
        <tr>
            @if($visi != $d->visi)
                <td rowspan="{{ $data->count() }}">Visi: {{ $d->visi }}</td>
                @php
                    $visi = $d->visi
                @endphp
            @endif
            @if($misi != $d->misi)
                <td rowspan="{{ $d->sasaran_misi }}">{{ $d->kode_misi }} {{ $d->misi }}</td>
                @php
                    $misi = $d->misi
                @endphp
            @endif
            @if($tujuan != $d->uraian_tujuan)
                <td rowspan="{{ $d->sasaran_tujuan }}">Tujuan: {{ $d->uraian_tujuan }}</td>
                @php
                    $tujuan = $d->uraian_tujuan
                @endphp
            @endif
            @if($sasaran != $d->sasaran)
                <td rowspan="">{{ $d->sasaran }}</td>
                @php
                    $sasaran = $d->sasaran
                @endphp
            @endif
        </tr>
        @endforeach
        
    </tbody>
</table>