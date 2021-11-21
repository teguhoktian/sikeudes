<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>

                <li class="menu-title">{{ __('Master Data') }}</li>

                <!-- Menu Info Desa -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class=" mdi mdi-information-outline"></i>
                        <span> {{ __('Parameter') }} </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a @if (Request::segment(2)=='user' ) class="open" @endif href="master/user">
                                {{ __('Pengguna') }}
                            </a>
                        </li>
                        <li>
                            <a @if (in_array(Request::segment(2), ["desa","kecamatan","kabupaten","provinsi"])) class="open" @endif href="master/provinsi">
                                {{ __('Desa') }}
                            </a>
                        </li>
                        <li>
                            <a @if (in_array(Request::segment(2), ["bidang","sub-bidang","kegiatan"])) class="open" @endif href="master/bidang">
                                {{ __('Kegiatan') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='sumber-dana' ) class="open" @endif href="master/sumber-dana">
                                {{ __('Sumber Dana') }}
                            </a>
                        </li>
                        <li>
                            <a @if (in_array(Request::segment(2), ["rekening-akun", "rekening-kelompok" , "rekening-jenis" , "rekening-objek" ])) class="open" @endif href="master/rekening-akun">
                                {{ __('Rekening Akun') }}
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="menu-title">{{ __('Menu Desa') }}</li>

                <!-- Menu Info Desa -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class=" mdi mdi-information-outline"></i>
                        <span> {{ __('Info Desa') }} </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a @if (Request::segment(2)=='kepala-desa' ) class="open" @endif href="desa/kepala-desa">
                                {{ __('Kepala Desa') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='sekretaris-desa' ) class="open" @endif href="desa/sekretaris-desa">
                                {{ __('Sekretaris Desa') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='kaur-keuangan' ) class="open" @endif href="desa/kaur-keuangan">
                                {{ __('Kaur Keuangan') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='pelaksana-kegiatan' ) class="open" @endif href="desa/pelaksana-kegiatan">
                                {{ __('Pelaksana') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-invert-colors"></i>
                        <span> {{ __('Perencanaan') }} </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a @if (Request::segment(2)=='perencanaan' ) class="open" @endif href="desa/perencanaan/visi">
                                {{ __('Visi & Misi') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='rpjmd' ) class="open" @endif href="desa/rpjmd/visi">
                                {{ __('RPJM Desa') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-invert-colors"></i>
                        <span> {{ __('Penganggaran') }} </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a @if (Request::segment(2)=='penganggaran' && Request::segment(3)=='tahun-anggaran' ) class="open" @endif href="desa/penganggaran/tahun-anggaran">
                                {{ __('Tahun Anggaran') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='penganggaran' && in_array(Request::segment(4),["bidang", "sub-bidang" , "kegiatan" , "paket-kegiatan" ]) ) class="open" @endif href="desa/penganggaran/tahun/bidang">
                                {{ __('Kegiatan') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='penganggaran' && in_array(Request::segment(4),["pendapatan"]) ) class="open" @endif href="desa/penganggaran/tahun/pendapatan">
                                {{ __('Pendapatan') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='penganggaran' && in_array(Request::segment(4),["belanja"]) ) class="open" @endif href="desa/penganggaran/tahun/belanja">
                                {{ __('Belanja') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='biaya-pendapatan' ) class="open" @endif href="desa/rpjmd/visi">
                                {{ __('Pembiayaan Pdpt.') }}
                            </a>
                        </li>
                        <li>
                            <a @if (Request::segment(2)=='biaya-belanja' ) class="open" @endif href="desa/rpjmd/visi">
                                {{ __('Pembiayaan Belanja') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

        <div class="help-box">
            <h5 class="text-muted m-t-0">For Help ?</h5>
            <p class=""><span class="text-custom">Email:</span> <br /> admin@rainsoft.com</p>
            <p class="m-b-0"><span class="text-custom">Call:</span> <br /> (+62) 821 278 206 90</p>
        </div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->