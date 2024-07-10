<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles -->
    @vite('resources/sass/app.scss')
</head>

<body class="antialiased">
    @include('navbar')
    <section class="relative h-screen overflow-hidden z-10">
        <div class="absolute -bottom-[10vh] m-auto flex justify-center w-full">
            <img src="{{ asset('img/landing-page/Backdrop.png') }}" alt="backdrop" class="h-[70vh]">
        </div>
        {{-- Tulisan --}}
        <div class="font-bold pt-[20vh] w-full flex justify-center">
            <h4 class="w-3/5 text-center text-[3vw]">
                Teman Terbaik untuk
                <div class="text-[#135589]">Keharmonisan Keluarga Indonesia</div>
            </h4>
        </div>
        <div class="absolute -top-[2vh] -left-[12vw]">
            <img src="{{ asset('img/landing-page/Cone_1.png') }}" alt="" class="w-[40vw] lg:w-full">
        </div>
        <div class="absolute -top-[20vh] -right-[10vw]">
            <img src="{{ asset('img/landing-page/Cone_2.png') }}" alt="" class="w-[40vw] lg:w-full">
        </div>
        <div class="relative mt-[2hv]">
            <div
                class="max-lg:hidden absolute w-[25vw] h-max-[101px] h-[15vh]   max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[6vh] left-[8vw]">
                <img src="{{ asset('img/landing-page/contract1.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[18px]">Sistem Kontrak Kerja Berstandar Tinggi</span>
            </div>
            <div
                class="max-lg:hidden absolute w-[25vw] h-[15vh] max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[24vh] left-[4vw]">
                <img src="{{ asset('img/landing-page/digital.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[18px]">Jaminan Sistem Kontrak Kerja Digital</span>
            </div>
            <div
                class="max-lg:hidden absolute w-[25vw] h-[15vh]  max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[28vh] left-[38vw]">
                <img src="{{ asset('img/landing-page/client1.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[18px]">Support bantuan kendala Teknis PRT</span>
            </div>
            <div
                class="max-lg:hidden absolute w-[25vw] h-[15vh]  max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[6vh] right-[8vw]">
                <img src="{{ asset('img/landing-page/favorites1.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[18px]">Rekomendari PRT yang terpesonalisasi</span>
            </div>
            <div
                class="max-lg:hidden absolute w-[25vw] h-[15vh]  max-md:w[29%] flex items-center justify-center
                bg-[#FFFFFF] border border-1.5 border-[#D7D7D7] shadow py-[14.3px] pl-[28.6px] pr-[9.53px] gap-6 rounded-2xl
                top-[24vh] right-[4vw]">
                <img src="{{ asset('img/landing-page/payment-method1.png') }}" alt="" class="w-[5vw]">
                <span class="text-black font-bold text-[18px]">Fleksibilitas Pembayaran Gaji PRT</span>
            </div>
        </div>
        <div
            class="max-lg:hidden absolute bg-[#ffffff] flex flex-col p-4 min-w-[206px] w-[15vw] h-[15vh] rounded-[20px] bottom-[1vh] right-[8vw] space-y-[0.5vh] justify-center">
            <div class="flex justify-center items-center space-x-4">
                <img src="{{ asset('img/landing-page/chat-2 1.png') }}" alt="" class="w-[4vh]">
                <span class="font-bold text-[2vh]">Anda memiliki Pertanyaan?</span>
            </div>
            <a href="/"
                class="btn btn-primary bg-[#135589] px-[18px] py-1 w-full text-[#ffffff] text-center rounded-lg text-[2vh] font-medium">Hubungi
                Kami!</a>
        </div>
    </section>
    <section class="bg-[#1E1E1E] h-[132px] flex items-center px-[100px] py-2.5 z-10 overflow-hidden">
        <div class="flex space-x-2 items-center">
            <img src="{{ asset('img/landing-page/storm.png') }}" alt="" class="w-[60px] h-[60px]">
            <div class="text-[#ffffff] text-[24px] text-center"><span class="font-bold">APERGA</span> menghadirkan <span
                    class="uderline decoration-[#ffffff]"><span class="font-bold">solusi terbaik</span> dalam Menemukan
                    Ratusan Jasa Pekerja Rumah Tangga</span> yang sesuai dengan preferensi anda dengan <span
                    class="font-bold">mudah, aman, dan cepat.</span></div>
            <img src="{{ asset('img/landing-page/storm.png') }}" alt="" class="w-[60px] h-[60px]">
        </div>
    </section>
    <section class="bg-[#ffffff] h-min-[794px] relative overflow-hidden py-6">
        <div class="flex-col p-[8%] relative z-10 space-y-14">
            <div class="flex gap-8">
                <div
                    class="px-[50px] py-[40px] items-center justify-center bg-[#ffffff] rounded-[25px] border border-1.5 border-[#D7D7D7] space-y-2 shadow-lg">
                    <div class="text-[32px] font-bold">Mengenal Platform <span class="text-[#135589]">APERGA</span>👋
                    </div>
                    <p class="text-justify text-[20px]">APERGA (Asisten Pekerja Rumah Tangga) merupakan platform digital
                        berbasis website yang memfasilitasi pencarian dan penyaluran jasa PRT dengan mengedepankan
                        keamanan dan kenyamanan baik bagi PRT sebagai mitra kerja maupun PJPRT (Pengguna Jasa Pekerja
                        Rumah Tangga) sebagai konsumen.</p>
                </div>
                <img src="{{ asset('img/landing-page/Laptop.png') }}" alt=""
                    class="max-w-100% h-auto object-contain">
            </div>
            <div class="flex gap-8">
                <div
                    class="px-[50px] py-[40px] items-center justify-center bg-[#ffffff] rounded-[25px] border border-1.5 border-[#D7D7D7] space-y-2 shadow-lg">
                    <div class="text-[32px] font-bold">Visi besar <span class="text-[#135589]">APERGA</span>🚀</div>
                    <p class="text-justify text-[20px]">mewujudkan jutaan keluarga Indonesia harmonis tanpa terbebani
                        oleh pekerjaan rumah tangga</p>
                </div>
                <div
                    class="px-[50px] py-[40px] items-center justify-center bg-[#ffffff] rounded-[25px] border border-1.5 border-[#D7D7D7] space-y-2 shadow-lg">
                    <div class="text-[32px] font-bold">Misi Utama <span class="text-[#135589]">APERGA</span> 🎯</div>
                    <p class="text-justify text-[20px]">menciptakan platform digital terbaik yang dapat mengakomodasi
                        kebutuhan akan jasa PRT yang terpersonalisasi dari PJPRT</p>
                </div>
            </div>
        </div>
        <div class="absolute -right-[80vw] -top-[80vh] z-0">
            <img src="{{ asset('img/landing-page/Rectangle 73.png') }}" alt="" class="w-[1529px] h-[1276px]">
        </div>
        <div class="absolute -left-[78vw] -bottom-[100vh] z-0">
            <img src="{{ asset('img/landing-page/Rectangle 74.png') }}" alt="" class="w-[1529px] h-[1529px]">
        </div>
    </section>
    <section class="relative bg-[#0D395B] h-min-[669px] py-[10%] px-[4%] overflow-hidden">
        <div class="absolute -bottom-[10vh] -left-[78vw] z-0">
            <img src="{{ asset('img/landing-page/Rectangle 75.png') }}" alt="" class="w-[1529px] h-[1529px]">
        </div>
        <div class="relative flex gap-16 z-10">
            <div class="text-[#ffffff] text-[48px] font-semibold max-w-[492px] text-center p-4">
                APERGA sebagai <span class="text-[#B0C6D8]">#TemanKeluarga</span>, siap membantu Anda yang :
            </div>
            <div class="space-y-8">
                <div class="flex items-center space-x-[24px]">
                    <div class="rounded-full bg-[#ffffff] p-3.5 w-min-50">
                        <img src="{{ asset('img/landing-page/icon.png') }}" alt="" class="">
                    </div>
                    <div class="text-[1.8vw] text-[#ffffff] font-medium">
                        Sibuk hingga tak punya waktu menyelesaikan pekerjaan rumah
                    </div>
                </div>
                <div class="flex items-center space-x-[24px]">
                    <div class="rounded-full bg-[#ffffff] p-3.5 w-min-50">
                        <img src="{{ asset('img/landing-page/icon.png') }}" alt="" class="">
                    </div>
                    <div class="text-[1.8vw] text-[#ffffff] font-medium">
                        Sedang menjalani program hamil
                    </div>
                </div>
                <div class="flex items-center space-x-[24px]">
                    <div class="rounded-full bg-[#ffffff] p-3.5 w-min-">
                        <img src="{{ asset('img/landing-page/icon.png') }}" alt="" class="">
                    </div>
                    <div class="text-[1.8vw] text-[#ffffff] font-medium">
                        Membutuhkan bantuan merawat anak/lansia di rumah
                    </div>
                </div>
                <div class="flex items-center space-x-[24px]">
                    <div class="rounded-full bg-[#ffffff] p-3.5 w-min-[600px]">
                        <img src="{{ asset('img/landing-page/icon.png') }}" alt="" class="">
                    </div>
                    <div class="text-[1.8vw] text-[#ffffff] font-medium">
                        Memerlukan bantuan untuk pekerjaan lainnya.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-[5%]">
        <div class="block space-y-[36px]">
            <div class="text-[48px] font-bold text-center">Fitur Platform <span class="text-[#135589]">APERGA</span>
            </div>
            <div class="flex space-x-[49px] justify-center">
                <div
                    class="flex rounded-[8px] border border-1.5 border-[#D7D7D7]  shadow-lg max-w-[595.5px] overflow-hidden">
                    <div class="inline-flex bg-[#ffffff] px-[18px] py-[18px] space-x-[28px] items-center">
                        <img src="{{ asset('img/landing-page/search.png') }}" alt=""
                            class="w-[100px] h-[100px] ">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[20px]">APERFIND</div>
                            <div class="text-[16px]">Memfasilitasi pengguna dalam mencari PRT yang diinginkan dengan
                                memberikan katalog jasa sehingga proses pencarian lebih efektif dan efisien.</div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex rounded-[8px] border border-1.5 border-[#D7D7D7] shadow-lg max-w-[595.5px] overflow-hidden">
                    <div class="inline-flex bg-[#ffffff] px-[18px] py-[18px] space-x-[28px] items-center">
                        <img src="{{ asset('img/landing-page/APERFIST.png') }}" alt=""
                            class="w-[100px] h-[100px] ">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[20px]">APERFIST</div>
                            <div class="text-[16px]">Sistem rekomendasi dengan kecerdasan buatan dalam bentuk chatbot
                                untuk membantu pencarian PRT yang sesuai dengan preferensi pengguna.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex space-x-[49px] justify-center">
                <div
                    class="flex rounded-[8px] border border-1.5 border-[#D7D7D7] shadow-lg max-w-[595.5px] overflow-hidden">
                    <div class="inline-flex bg-[#ffffff] px-[18px] py-[18px] space-x-[28px] items-center">
                        <img src="{{ asset('img/landing-page/APERDEAL.png') }}" alt=""
                            class="w-[100px] h-[100px] ">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[20px]">APERDEAL</div>
                            <div class="text-[16px]">Memfasilitasi pembuatan kontrak atau kesepakatan antara pengguna
                                dan PRT yang dipilih sehingga mempermudah penetapan rencana kerja</div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex rounded-[8px] border border-1.5 border-[#D7D7D7] shadow-lg max-w-[595.5px] overflow-hidden">
                    <div class="inline-flex bg-[#ffffff] px-[18px] py-[18px] space-x-[28px] items-center">
                        <img src="{{ asset('img/landing-page/APERHELPER.png') }}" alt=""
                            class="w-[100px] h-[100px] ">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[20px]">APERHELPER</div>
                            <div class="text-[16px]">virtual assistant untuk membantu pengguna menemukan solusi dari
                                masalah - masalah umum dan juga memberi informasi kepada pengguna tentang fitur - fitur
                                dan fungsi APERGA.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex space-x-[49px] justify-center">
                <div
                    class="flex rounded-[8px] border border-1.5 border-[#D7D7D7] shadow-lg max-w-[595.5px] overflow-hidden">
                    <div class="inline-flex bg-[#ffffff] px-[18px] py-[18px] space-x-[28px] items-center">
                        <img src="{{ asset('img/landing-page/APERPAY.png') }}" alt=""
                            class="w-[100px] h-[100px] ">
                        <div class="flex-grow flex-col space-y-2">
                            <div class="font-semibold text-[20px]">APERPAY</div>
                            <div class="text-[16px]">Menyediakan beragam kanal pembayaran untuk mempermudah proses
                                transaksi dan pilihan skema pembayaran (full payment atau termin payment) </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="p-[5%] py-[8%] bg-[#0D395B]">
        <div class="space-y-[30px]">
            <div class="text-[48px] font-bold text-[#ffffff] text-center">FAQ Seputar APERGA</div>
            <div class="flex-col w-full ">
                <button type="button"
                    class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                    Apa yang dimaksud aperga?
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="dropdown-content" class="hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                </div>
            </div>
            <div class="flex-col w-full ">
                <button type="button"
                    class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                    Apa yang dimaksud aperga?
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="dropdown-content" class="hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                </div>
            </div>
            <div class="flex-col w-full ">
                <button type="button"
                    class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                    Apa yang dimaksud aperga?
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="dropdown-content" class="hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                </div>
            </div>
            <div class="flex-col w-full ">
                <button type="button"
                    class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                    Apa yang dimaksud aperga?
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="dropdown-content" class="hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                </div>
            </div>
            <div class="flex-col w-full ">
                <button type="button"
                    class="bg-[#104772] rounded-[8px] py-3 px-4 text-[#ffffff] flex items-center justify-between font-semibold text-[18px] hover:cursor-pointer w-full hover:bg-[#135589]"
                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                    Apa yang dimaksud aperga?
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="dropdown-content" class="hidden px-4 py-3 text-[#ffffff] bg-[#135589] rounded-[8px]"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                </div>
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('[id^="menu-button"]').forEach(button => {
            button.addEventListener('click', function() {
                const dropdownId = this.id.replace('menu-button', 'dropdown-content')
                const dropdown = document.getElementById(dropdownId)
                const expanded = this.getAttribute('aria-expanded') === 'true'
                this.setAttribute('aria-expanded', !expanded)
                dropdown.classList.toggle('hidden')
            })
        })
    </script>
    @include('footer')
</body>

</html>
