<!-- resources/views/navbar.blade.php -->
<div
  class="fixed bg-white drop-shadow w-[100%] h-[68.5px] z-50 pr-4 pl-[14px] md:px-12 lg:px-[60px] lg:h-[85px] xl:px[100px]"
  style="filter: drop-shadow(0px 2px 1px #E0E2E2);"
>
  <div class="flex container-xl justify-between items-center h-full">
    <div class="p-auto">
      <img src="{{ asset('img/landing-page/Logo.png') }}" width="171" height="0" alt="Logo" />
    </div>
    <div class="flex item-center space-x-8">
      <!-- Hamburger Menu -->
      <div class="lg:hidden">
        <i
          onclick="toggleMenu()"
          class="text-gray-500 w-6 h-6 cursor-pointer"
        >&#9776;</i>
      </div>
      <!-- Menu -->
      <div
        class="hidden lg:flex items-center space-x-8"
      >
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
          <a href="/register" class="btn btn-outline mid px-[22px] py-2 rounded-[8px] border-[#135589] border-2 text-[#135589] text-center font-medium">
            Daftar
          </a>
          <a href="/login" class="btn btn-primary mid px-[22px] py-2 rounded-[8px] bg-[#135589] text-[#ffffff] text-center font-medium">
            Masuk
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleMenu() {
    // Implement your toggleMenu function here
  }
</script>
