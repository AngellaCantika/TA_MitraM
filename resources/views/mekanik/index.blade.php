@extends('layouts.mekanik.mainMekanik')
@section('mekanikContent')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Selamat Datang Mekanik</h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/img/logo.png" class="img-fluid custom-logo-size mx-auto d-block" alt="Logo">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Tentang Kami</h5>
                                <p class="card-text">
                                    PT. Mitra Makmur Global (MMG) Berdiri pada 11 November 2015 di Jakarta Timur,
                                    bergerak di bidang penyewaan alat berat, logistik, kontraktor umum, dan penyedia
                                    tenaga kerja. Kami siap menjadi mitra yang berharga untuk memenuhi kebutuhan
                                    pelanggan dengan layanan yang dapat diandalkan. Metode kerja kami mencakup berbagai
                                    layanan di seluruh Indonesia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img src="/img/about1.jpg" class="img-fluid custom-about1-size mx-auto d-block" alt="About Us">
                    <div class="card-body">
                        <h5 class="card-title">Visi Kami</h5>
                        <p class="card-text">
                            Menjadi perusahaan terdepan dalam penyediaan layanan alat berat, logistik, dan tenaga kerja
                            di Indonesia dengan mengutamakan kualitas dan kepuasan pelanggan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img src="/img/about2.jpg" class="img-fluid custom-about2-size mx-auto d-block" alt="Mission">
                    <div class="card-body">
                        <h5 class="card-title">Misi Kami</h5>
                        <p class="card-text">
                            1. Menyediakan alat berat dan logistik berkualitas tinggi.<br>
                            2. Memberikan layanan yang profesional dan responsif.<br>
                            3. Menyediakan tenaga kerja yang terlatih dan berpengalaman.<br>
                            4. Berkontribusi pada pembangunan infrastruktur di Indonesia.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Layanan Kami</h5>
                        <p class="card-text">
                            Berbagai jenis alat berat dengan berbagai kebutuhan penggunaan. Berbagai jenis truk untuk
                            menyediakan logistik. Tenaga kerja berpengalaman (Driver, Operator, Helper) dengan izin yang
                            diperlukan (SIM, Izin Operasional). Alat berat semua bersertifikat dari kementerian tenaga
                            kerja dan minyak dan gas. Manajemen profesional dengan layanan 24/7.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection

<style>
    .custom-logo-size {
        width: 200px;
        height: 155px;
        position: relative;
        top: 5px;
    }

    .custom-about1-size {
        width: 585px;
        /* Adjusted to maintain aspect ratio */
        height: 549px;
    }

    .custom-about2-size {
        width: 595px;
        /* Adjusted to maintain aspect ratio */
        height: 149.5px;
    }
</style>