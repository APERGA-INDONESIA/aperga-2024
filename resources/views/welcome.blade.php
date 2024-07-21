<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aperga</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles -->
    {{-- @vite('resources/sass/app.scss') --}}
</head>

<body class="antialiased">
    @include('navbar')
    <div
        class="max-lg:hidden z-20 fixed bg-[#ffffff] flex flex-col p-4 min-w-[206px] w-[15vw] h-[15vh] rounded-[20px] bottom-[1vh] right-[8vw] space-y-[0.5vh] justify-center">
        <div class="flex justify-center items-center space-x-4">
            <img src="{{ asset('img/landing-page/chat-2 1.png') }}" alt="" class="w-[4vh]">
            <span class="font-bold text-[12px]">Anda memiliki Pertanyaan?</span>
        </div>
        <a href="https:/wa.me/6287782454935"
            class="btn btn-primary bg-[#135589] px-[18px] py-1 w-full text-[#ffffff] text-center rounded-lg text-[12px] font-medium">Hubungi
            Kami!</a>
    </div>
    <section class="relative min-h-[400px] md:min-h-[500px] lg:min-h-screen overflow-hidden z-10">
        <div class="absolute -bottom-[5vh] md:-bottom-[10vh] m-auto flex justify-center w-full">
            <img src="{{ asset('img/landing-page/Backdrop.png') }}" alt="backdrop"
                class="min-w-[484px] h-auto md:w-[200%] lg:h-[70vh] lg:max-h-[800px] lg:w-[1253px] max-w-screen max-h-screen">
        </div>
        {{-- Tulisan --}}
        <div class="font-bold pt-[20vh] w-full flex justify-center">
            <h4 class="w-full sm:w-4/5 md:w-3/5 text-center text-[24px] md:text-[28px] lg:text-[32px]">
                Teman Terbaik untuk
                <div class="text-[#135589]">Keharmonisan Keluarga Indonesia</div>
            </h4>
        </div>
        <div class="absolute top-0 -left-[12vw] md:-top-[15vh] lg:-top-[10vh] lg:-left-[12vw]">
            <img src="{{ asset('img/landing-page/Cone_1.png') }}" alt="" class="w-[40vw] lg:w-full">
        </div>
        <div class="absolute top-0 -right-[16vw] md:-top-[15vh] lg:-top-[20vh] lg:-right-[16vw]">
            <img src="{{ asset('img/landing-page/Cone_2.png') }}" alt="" class="w-[40vw] lg:w-full">
        </div>
        <div class="relative mt-[2hv]">
            <div
                class="max-lg:hidden absolute w-[25vw] h-max-[101px] h-[15vh]   max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[10vh] left-[8vw]">
                <img src="{{ asset('img/landing-page/contract1.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[16px]">Sistem Kontrak Kerja Berstandar Tinggi</span>
            </div>
            <div
                class="max-lg:hidden absolute w-[25vw] h-[15vh] max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[28vh] left-[4vw]">
                <img src="{{ asset('img/landing-page/digital.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[16px]">Jaminan Sistem Kontrak Kerja Digital</span>
            </div>
            <div
                class="max-lg:hidden absolute w-[25vw] h-[15vh]  max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[32vh] left-[38vw]">
                <img src="{{ asset('img/landing-page/client1.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[16px]">Support bantuan kendala Teknis PRT</span>
            </div>
            <div
                class="max-lg:hidden absolute w-[25vw] h-[15vh]  max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[10vh] right-[8vw]">
                <img src="{{ asset('img/landing-page/favorites1.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[16px]">Rekomendari PRT yang terpesonalisasi</span>
            </div>
            <div
                class="max-lg:hidden absolute w-[25vw] h-[15vh]  max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[28vh] right-[4vw]">
                <img src="{{ asset('img/landing-page/payment-method1.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[16px]">Fleksibilitas Pembayaran Gaji PRT</span>
            </div>
        </div>
        <div class="hidden lg:absolute m-auto lg:flex w-full items-center justify-center bottom-5">
            <a id="informasi-lengkap" href="#informasi"
                class="py-2 px-[16px] border-2 border-[#135589] rounded-lg bg-white flex gap-4 items-center justify-center w-[267px]">
                <img src="{{ asset('img/landing-page/arrow-down.png') }}" alt="" class="w-[20px] h-[20px]">
                <p class="text-[16px]">Informasi Selengkapnya</p>
            </a>
        </div>
    </section>
    <section class="bg-[#1E1E1E] min-h-[132px] max-h-[379px] flex items-center px-2 md:px-10 lg:px-[100px] py-2.5 z-10 overflow-hidden ">
        <div class="flex space-x-1 md:space-x-2 items-center">
            <img src="{{ asset('img/landing-page/storm.png') }}" alt="" class="w-[60px] h-[60px]">
            <div class="text-[#ffffff] text-justify text-4 md:text-5 lg:text-[24px] md:text-center"><span class="font-bold">APERGA</span> menghadirkan <span
                    class="uderline decoration-[#ffffff]"><span class="font-bold">solusi terbaik</span> dalam Menemukan
                    Ratusan Jasa Pekerja Rumah Tangga</span> yang sesuai dengan preferensi anda dengan <span
                    class="font-bold">mudah, aman, dan cepat.</span></div>
            <img src="{{ asset('img/landing-page/storm.png') }}" alt="" class="w-[60px] h-[60px]">
        </div>
    </section>
    <section id="informasi" class="bg-[#ffffff] h-min-[794px] relative overflow-hidden py-6 scroll-mt-20">
        <div class="flex-col p-[8%] relative z-10 space-y-12 lg:space-y-14">
            <div class="flex flex-col-reverse lg:flex-row gap-8">
                <div
                    class="px-[50px] py-[40px] items-center justify-center bg-[#ffffff] rounded-[25px] border border-1.5 border-[#D7D7D7] space-y-2 shadow-lg">
                    <div class="text-[28px] xl:text-[32px] font-extrabold">Mengenal Platform <span class="text-[#135589]">APERGA</span>👋
                    </div>
                    <p class="text-justify text-[16px] xl:text-[20px]">APERGA (Asisten Pekerja Rumah Tangga) merupakan platform digital
                        berbasis website yang memfasilitasi pencarian dan penyaluran jasa PRT dengan mengedepankan
                        keamanan dan kenyamanan baik bagi PRT sebagai mitra kerja maupun PJPRT (Pengguna Jasa Pekerja
                        Rumah Tangga) sebagai konsumen.</p>
                </div>
                <img src="{{ asset('img/landing-page/Laptop.png') }}" alt=""
                    class="max-w-100% h-auto object-contain">
            </div>
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-8">
                <div
                    class="px-[50px] py-[40px] items-center justify-center bg-[#ffffff] rounded-[25px] border border-1.5 border-[#D7D7D7] space-y-2 shadow-lg">
                    <div class="text-[28px] xl:text-[32px] font-extrabold">Visi besar <span class="text-[#135589]">APERGA</span>🚀</div>
                    <p class="text-justify text-[16px] xl:text-[20px]">mewujudkan jutaan keluarga Indonesia harmonis tanpa terbebani
                        oleh pekerjaan rumah tangga</p>
                </div>
                <div
                    class="px-[50px] py-[40px] items-center justify-center bg-[#ffffff] rounded-[25px] border border-1.5 border-[#D7D7D7] space-y-2 shadow-lg">
                    <div class="text-[28px] xl:text-[32px] font-extrabold">Misi Utama <span class="text-[#135589]">APERGA</span> 🎯</div>
                    <p class="text-justify text-[16px] xl:text-[20px]">menciptakan platform digital terbaik yang dapat mengakomodasi
                        kebutuhan akan jasa PRT yang terpersonalisasi dari PJPRT</p>
                </div>
            </div>
        </div>
        <div class="absolute -right-[120vw] md:-right-[45vw] lg:-right-[80vw] xl:-right-[80vw] 2xl:-right-[60vw] -top-[30%] md:-top-[30%] lg:-top-[90%] xl:-top-[105%] z-0">
            <img src="{{ asset('img/landing-page/Rectangle 73.png') }}" alt="" class="w-[700px] h-[700px] lg:w-[1529px] lg:h-[1529px]">
        </div>
        <div class="absolute -left-[130vw] md:-left-[60vw] lg:-left-[120vw] xl:-left-[80vw] 2xl:-left-[60vw] -bottom-[25%] md:-bottom-[30%] lg:-bottom-[80%] xl:-bottom-[90%] z-0">
            <img src="{{ asset('img/landing-page/Rectangle 74.png') }}" alt=""
                class="w-[700px] h-[700px] lg:w-[1529px] lg:h-[1529px]">
        </div>
    </section>
    <section class="relative bg-[#0D395B] h-min-[669px] py-[10%] px-[4%] overflow-hidden">
        <div class="absolute -left-[130vw] md:-left-[60vw] lg:-left-[120vw] xl:-left-[80vw] 2xl:-left-[60vw] -top-[45%] md:-top-[40%] lg:-top-[120%] xl:-top-[105%] z-0">
            <img src="{{ asset('img/landing-page/Rectangle 75.png') }}" alt=""
                class="w-[700-px] h-[700px] lg:w-[1529px] lg:h-[1529px]">
        </div>
        <div class="relative flex flex-col lg:flex-row gap-16 z-10 items-center">
            <div class="text-[#ffffff] text-[32px] md:text-[36px] lg:text-[48px] font-semibold w-full md:w-[492px] text-center p-4">
                APERGA sebagai <span class="text-[#B0C6D8]">#TemanKeluarga</span>, siap membantu Anda yang :
            </div>
            <div class="space-y-8">
                <div class="flex items-center gap-[24px]">
                    <div class="rounded-full bg-[#ffffff] p-3.5 ">
                        <img src="{{ asset('img/landing-page/icon.png') }}" alt="" class="min-w-9 min-h-9 max-w-12 max-h-12">
                    </div>
                    <div class="text-[16px] sm:text-[20px] md:text-[24px] text-[#ffffff] font-medium">
                        Sibuk hingga tak punya waktu menyelesaikan pekerjaan rumah
                    </div>
                </div>
                <div class="flex items-center space-x-[24px]">
                    <div class="rounded-full bg-[#ffffff] p-3.5 ">
                        <img src="{{ asset('img/landing-page/icon.png') }}" alt="" class="min-w-9 min-h-9 max-w-12 max-h-12">
                    </div>
                    <div class="text-[16px] sm:text-[20px] md:text-[24px] text-[#ffffff] font-medium">
                        Sedang menjalani program hamil
                    </div>
                </div>
                <div class="flex items-center space-x-[24px]">
                    <div class="rounded-full bg-[#ffffff] p-3.5">
                        <img src="{{ asset('img/landing-page/icon.png') }}" alt="" class="min-w-9 min-h-9 max-w-12 max-h-12">
                    </div>
                    <div class="text-[16px] sm:text-[20px] md:text-[24px] text-[#ffffff] font-medium">
                        Membutuhkan bantuan merawat anak/lansia di rumah
                    </div>
                </div>
                <div class="flex items-center space-x-[24px]">
                    <div class="rounded-full bg-[#ffffff] p-3.5">
                        <img src="{{ asset('img/landing-page/icon.png') }}" alt="" class="min-w-9 min-h-9 max-w-12 max-h-12">
                    </div>
                    <div class="text-[16px] sm:text-[20px] md:text-[24px] text-[#ffffff] font-medium">
                        Memerlukan bantuan untuk pekerjaan lainnya.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-[5%] overflow-hidden">
        <div class="block space-y-[36px]">
            <div class="text-[38px] md:text-[48px] font-bold text-center">Fitur Platform <span class="text-[#135589]">APERGA</span></div>
            <div class="flex flex-wrap justify-center">
                <div class="flex flex-col md:flex-row rounded-[8px] border border-1.5 border-[#D7D7D7] shadow-lg w-full md:max-w-[595.5px] overflow-hidden m-[16px] flex-grow">
                    <div class="flex bg-[#ffffff] p-[18px] space-x-[28px] items-center w-full">
                        <img src="{{ asset('img/landing-page/search.png') }}" alt="" class="min-w-[60px] min-h-[60px] md:min-w-[100px] md:h-auto">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[16px] md:text-[20px]">APERFIND</div>
                            <div class="text-[12px] md:text-[16px] text-justify">Memfasilitasi pengguna dalam mencari PRT yang diinginkan dengan memberikan katalog jasa sehingga proses pencarian lebih efektif dan efisien.</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row rounded-[8px] border border-1.5 border-[#D7D7D7] shadow-lg w-full md:max-w-[595.5px] overflow-hidden m-[16px] flex-grow">
                    <div class="flex bg-[#ffffff] p-[18px] space-x-[28px] items-center w-full">
                        <img src="{{ asset('img/landing-page/APERFIST.png') }}" alt="" class="min-w-[60px] min-h-[60px] md:min-w-[100px] md:h-auto">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[16px] md:text-[20px]">APERFIST</div>
                            <div class="text-[12px] md:text-[16px] text-justify">Sistem rekomendasi dengan kecerdasan buatan dalam bentuk chatbot untuk membantu pencarian PRT yang sesuai dengan preferensi pengguna.</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row rounded-[8px] border border-1.5 border-[#D7D7D7] shadow-lg w-full md:max-w-[595.5px] overflow-hidden m-[16px] flex-grow">
                    <div class="flex bg-[#ffffff] p-[18px] space-x-[28px] items-center w-full">
                        <img src="{{ asset('img/landing-page/APERDEAL.png') }}" alt="" class="min-w-[60px] min-h-[60px] md:min-w-[100px] md:h-auto">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[16px] md:text-[20px]">APERDEAL</div>
                            <div class="text-[12px] md:text-[16px] text-justify">Memfasilitasi pembuatan kontrak atau kesepakatan antara pengguna dan PRT yang dipilih sehingga mempermudah penetapan rencana kerja.</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row rounded-[8px] border border-1.5 border-[#D7D7D7] shadow-lg w-full md:max-w-[595.5px] overflow-hidden m-[16px] flex-grow">
                    <div class="flex bg-[#ffffff] p-[18px] space-x-[28px] items-center w-full">
                        <img src="{{ asset('img/landing-page/APERHELPER.png') }}" alt="" class="min-w-[60px] min-h-[60px] md:min-w-[100px] md:h-auto">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[16px] md:text-[20px]">APERHELPER</div>
                            <div class="text-[12px] md:text-[16px] text-justify">Virtual assistant untuk membantu pengguna menemukan solusi dari masalah-masalah umum dan juga memberi informasi kepada pengguna tentang fitur-fitur dan fungsi APERGA.</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row rounded-[8px] border border-1.5 border-[#D7D7D7] shadow-lg w-full md:max-w-[595.5px] overflow-hidden m-[16px] flex-grow">
                    <div class="flex bg-[#ffffff] p-[18px] space-x-[28px] items-center w-full">
                        <img src="{{ asset('img/landing-page/APERPAY.png') }}" alt="" class="min-w-[60px] min-h-[60px] md:min-w-[100px] md:h-auto">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[16px] md:text-[20px]">APERPAY</div>
                            <div class="text-[12px] md:text-[16px] text-justify">Menyediakan beragam kanal pembayaran untuk mempermudah proses transaksi dan pilihan skema pembayaran (full payment atau termin payment).</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="p-[5%] py-[8%] bg-[#0D395B] overflow-hidden">
        <div class="space-y-[30px]">
            <div class="text-[38px] md:text-[48px] font-bold text-[#ffffff] text-center">FAQ Seputar APERGA</div>
            <div class="flex-col w-full">
                <div class="faq-item">
                    <button type="button"
                        class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                        aria-expanded="false">
                        Apa yang dimaksud aperga?
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="dropdown-content hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]">
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    </div>
                </div>
            </div>
            <div class="flex-col w-full">
                <div class="faq-item">
                    <button type="button"
                        class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                        aria-expanded="false">
                        Apa yang dimaksud aperga?
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="dropdown-content hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]">
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    </div>
                </div>
            </div>
            <div class="flex-col w-full">
                <div class="faq-item">
                    <button type="button"
                        class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                        aria-expanded="false">
                        Apa yang dimaksud aperga?
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="dropdown-content hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]">
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    </div>
                </div>
            </div>
            <div class="flex-col w-full">
                <div class="faq-item">
                    <button type="button"
                        class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                        aria-expanded="false">
                        Apa yang dimaksud aperga?
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="dropdown-content hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]">
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    </div>
                </div>
            </div>
            <div class="flex-col w-full">
                <div class="faq-item">
                    <button type="button"
                        class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                        aria-expanded="false">
                        Apa yang dimaksud aperga?
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="dropdown-content hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]">
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('.faq-item button').forEach(button => {
            button.addEventListener('click', () => {
                const dropdown = button.nextElementSibling;
                dropdown.classList.toggle('hidden');
                button.setAttribute('aria-expanded', !dropdown.classList.contains('hidden'));
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            let lastScrollTop = 0;
            const informasiElement = document.getElementById('informasi-lengkap');

            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffSet || document.documentElement.scrollTop;

                if (currentScroll > lastScrollTop) {
                    // Scrolling down
                    informasiElement.style.display = 'none';
                } else {
                    // Scrolling up
                    informasiElement.style.display = 'flex';
                }

                lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
            }, false)
        });
    </script>
    @include('footer')
</body>

</html>
