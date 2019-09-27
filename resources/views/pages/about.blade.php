@extends('main')
@section('title','| Profil')
@section('content')


    <div class="accordion card-shadow" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Himpunan Mahasiswa Teknik Informatika Universitas Gunadarma
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    HIMTI UG merupakan kelengkapan non struktural yang bersifat Independen dan berkedudukan di Jurusan Teknik Informatika Universitas Gunadarma. HIMTI  didirikan di Depok pada tahun 1992 untuk waktu yang tidak ditentukan lamanya. Asas HIMTI adalah Persaudaraan yang didasarkan pada prinsip dari, oleh dan untuk Mahasiswa dengan memberikan peranan dan keleluasaan yang lebih besar kepada Mahasiswa dalam berorganisasi.                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Tujuan
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li class="pb-3">Mewujudkan tujuan Pendidikan nasional.</li>
                        <li class="pb-3">Mewujudkan aspirasi, minat dan bakat Mahasiswa Teknik Informatika Universitas Gunadarma dalam rangka pengembangan pengetahuan Teknik Informatika.</li>
                        <li class="pb-3">Membentuk Sumber Daya Manusia yang berkualitas dan berwawasan intelektual dalam bidang Teknik Informatika.</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Fungsi
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li class="pb-3">
                            Perwakilan Mahasiswa Teknik Informatika Universitas Gunadarma untuk menampung dan menyalurkan aspirasi Mahasiswa Teknik Informatika Universitas Gunadarma.
                        </li>
                        <li class="pb-3">
                            Pelaksana kegiatan di tingkat Jurusan Teknik Informatika Universitas Gunadarma.
                        </li>
                        <li class="pb-3">
                            Komunikasi antara Mahasiswa Teknik Informatika Universitas Gunadarma dengan Mahasiswa di luar Teknik Informatika Universitas Gunadarma dan Mahasiswa / masyarakat di luar Universitas Gunadarma.
                        </li>
                        <li class="pb-3">
                            Pengembangan potensi jati diri Mahasiswa sebagai insan akademis, calon ilmuan dan intelektual yang berwawasan keteknikan khususnya Teknik Informatika yang berguna di masa depan.
                        </li>
                        <li class="pb-3">
                            Pengembangan pelatihan keterampilan organisasi, manajemen dan kepemimpinan.
                        </li>
                        <li class="pb-3">
                            Pembinaan dam pemngembangan Mahasiswa Teknik Informatika yang berpotensi dalam melanjutkan kesinambungan Pembangunan Nasional.
                        </li>
                        <li class="pb-3">
                            Untuk memelihara dan mengembangkan Ilmu dan Teknologi Informatika yang dilandasi oleh norma-norma agama, akademis, etika dan moral.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                        Kepengurusan
                    </button>
                </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li class="pb-3">
                            Pengurus HIMTI terdiri dari BPH(Badan Pengurus Harian), Korwil(Koordinator Wilayah), bidang dan divisi.

                        </li>
                        <li class="pb-3">
                            BPH terdiri atas seorang Ketua Umum HIMTI, Sekretaris Umum HIMTI dan Bendahara Umum HIMTI.

                        </li>
                        <li class="pb-3">
                            Korwil terdiri atas Korwil Depok, Korwil Kalimalang dan Korwil Cengkareng.

                        </li>
                        <li class="pb-3">
                            Bidang terdiri atas Ketua Bidang Akademik dan Ketua Bidang Non-Akademik.
                        </li>
                        <li class="pb-3">
                            Divis terdiri atas Ketua Divisi, Wakil Ketua Divisi dan anggota dari divisi yang bersangkutan.
                            Divisi HIMTI terbagi menjadi dua yaitu bidang akademik dan non-akademik.
                            <br>
                            <ol class="pb-3 pt-3">
                                <li>
                                    Divisi yang berada pada bidang akademik yaitu.
                                    <ul class="pb-3">
                                        <li class="pb-3 pt-3">
                                            Divisi Akademik <br>
                                            Divisi akademik bergerak pada seluruh kegiatan yang berkaitan dengan akademik
                                            seperti mengadakan seminar, workshop, diskusi-diskusi rutin kemahasiswaaan, kuliah
                                            umum dll.
                                        </li>
                                        <li class="pb-3">
                                            Divisi Penelitian dan Pengembangan <br>
                                            Divisi litbang bergerak pada seluruh bagian yang berkaitan dengana kademik yang
                                            mendepankan penelitian serta pengembangan skill mahasiswa pada bidangnya masing-
                                            masing. Seperti halnya mengadakan perlombaan atau pelatihan skill pada bidangnya
                                            masing-masing atau latihan dasar kepemimpinan dll.
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    Divisi yang berada pada bidang non-akademik yaitu.
                                    <ul class="pb-3">
                                        <li class="pb-3 pt-3">
                                            Divisi Olahraga <br>
                                            Divisi olahraga bergerak pada seluruh bagian yang berkaitan mengenai seluruh
                                            cabang olahraga yang ada di Universitas Gunadarma. Seperti halnya mengadakan
                                            turnamen atau kejuaraan olahraga futsal, badminton, basket, dll.
                                        </li>
                                        <li class="pb-3">
                                            Divisi Seni dan Budaya <br>
                                            Divisi Senbud bergerak pada seluruh bagian yang berkaitan mengenai kreatifitas
                                            mahasiswa di bidang seni dan budaya. Seperti halnya menyaring bakat mahasiswa
                                            yang mempunyai skill pada musik, tari atau dance, lukisan, photography, dll.
                                        </li>
                                        <li class="pb-3">
                                            Divisi Hubungan Masyarakat <br>
                                            Divisi humas bergerak pada seluruh bagian yang berkaitan tentang hubungan baik
                                            internal kampus mau punluar kampus. Sepertihalnya responsive terhadap isu-isu yang
                                            berkembang baik di internal kampus maupun luar kampus, ataupun penyampaian
                                            informasi mengenai event dari HIMTI yang akan dilaksanakan.
                                        </li>
                                        <li class="pb-3">
                                            Divisi Sosial Masyarakat <br>
                                            Divisi Sosmas bergerak pada seluruh kegiatan sosial yang baik di internal
                                            maupun luar internal kampus. Seperti halnya mengadakan bakti sosial, donor darah,
                                            serta penggalangan dana saat terjadi musibah.
                                        </li>
                                        <li class="pb-3">
                                            Divisi Dana dan Usaha <br>
                                            Divisi Danus merupakan divisi yang bertanggung jawab dalam memperoleh dan
                                            mengelola dana. Divisi Danus juga menjadi penyokong utama dalam pendanaan setiap
                                            kegiatan HIMTI.
                                        </li>
                                    </ul>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseOne">
                        Struktur Organisasi
                    </button>
                </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    <img src="/logo/Struktur Organisasi.png" class="mr-3 centered-image" style="width:100% !important;">
                </div>
            </div>
        </div><div class="card">
            <div class="card-header" id="headingSix">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseOne">
                        Pengurus Periode 2019/2020
                    </button>
                </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                    <img src="/logo/Pengurus.png" style="margin: 10px auto 20px; display: block;">
                </div>
            </div>
        </div>
    </div>
    
@endsection
