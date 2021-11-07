<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Models\Model' => 'App\Policies\ModelPolicy',
        SekretarisDesa::class => SekretarisDesaPolicy::class,
        KepalaDesa::class => KepalaDesaPolicy::class,
        PelaksanaKegiatan::class => PelaksanaKegiatanPolicy::class,
        KaurKeuangan::class => KaurKeuanganPolicy::class,
        PerencanaanVisi::class => PerencanaanVisiPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
