<!-- resources/views/navbar.blade.php -->
<header>
    <div class="fixed bg-white drop-shadow w-screen h-[68.5px] z-50 pr-4 pl-[14px] md:px-12 lg:px-[60px] lg:h-[85px] xl:px[100px]"
        style="filter: drop-shadow(0px 2px 1px #E0E2E2);">
        <div class="flex container-xl justify-between items-center h-full">
            <div class="p-auto">
                <img src="{{ asset('img/landing-page/Logo.png') }}" width="171" height="0" alt="Logo" />
            </div>
            <div class="flex item-center space-x-8">
                <!-- Hamburger Menu -->
                <button id="hamburger-menu"
                    class="relative text-3xl font-semibold w-8 h-8 cursor-pointer lg:hidden">&#9776;</button>
                <!-- Menu -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <div class="flex items-center space-x-8">
                        <a href="/" class="font-medium text-lg">
                            Cari PRT
                        </a>
                        <a href="/" class="font-medium text-lg">
                            Tentang Platform
                        </a>
                        <a href="/" class="font-medium text-lg">
                            Profil Perusahaan
                        </a>
                    </div>
                    <div class="flex item-center space-x-4">
                        <a href="/register"
                            class="btn btn-outline mid px-[22px] py-2 rounded-[8px] border-[#135589] border-2 text-[#135589] text-center font-medium">
                            Daftar
                        </a>
                        <a href="/login"
                            class="btn btn-primary mid px-[22px] py-2 rounded-[8px] bg-[#135589] text-[#ffffff] text-center font-medium">
                            Masuk
                        </a>
                    </div>
                </nav>
            </div>

        </div>
    </div>
    <div id="mobile-menu" class="hidden fixed insert-0 z-40 bg-white opacity-100 h-screen justify-center w-full py-40 lg:hidden transition-all duration-300 ease-in-out">
        <nav class="flex flex-col items-center gap-20 ">
            <a href="/" class="font-medium text-3xl text-black">
                Cari PRT
            </a>
            <a href="/" class="font-medium text-3xl text-black">
                Tentang Platform
            </a>
            <a href="/" class="font-medium text-3xl text-black">
                Profil Perusahaan
            </a>
            <div class="flex item-center space-x-4">
                <a href="/register"
                    class="btn btn-outline mid px-[22px] py-2 rounded-[8px] border-[#135589] border-2 text-[#135589] text-center font-medium">
                    Daftar
                </a>
                <a href="/login"
                    class="btn btn-primary mid px-[22px] py-2 rounded-[8px] bg-[#135589] text-[#ffffff] text-center font-medium">
                    Masuk
                </a>
            </div>
        </nav>
    </div>
</header>

<script>
    const initApp = () => {
        const hamburgerBtn = document.getElementById('hamburger-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const toggleMenu = () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
        }

        hamburgerBtn.addEventListener('click', toggleMenu);
        mobileMenu.addEventListener('click', toggleMenu);
    }
    document.addEventListener('DOMContentLoaded', initApp);
</script>
