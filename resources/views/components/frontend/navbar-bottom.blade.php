{{-- <nav class="navbar fixed-bottom navbar-light bg-white border-nav-bottom" style="height: 60px">
    <div class="col-12">
        <div class="d-flex">
            <div class="h-39 w-31">
                <a class="text-center" href="#">
                    <i class="fas fa-home h-40 text-active-pink"></i>
                    <p class="font-xs text-active-pink">Home</p>
                </a>
            </div>
            <div>
                <a class="text-center" href="#">
                    <i class="fas fa-sun fa-sm text-light-pink"></i>
                    <p class="font-xs text-light-pink">Untuk Anda</p>
                </a>
            </div>
            <div>
                <a class="text-center" href="#">
                    <i class="fas fa-user fa-sm text-light-pink"></i>
                    <p class="font-xs text-light-pink">Profil</p>
                </a>
            </div>
        </div>
    </div>

</nav> --}}

<div class="bottom-nav">
    <div class="d-flex justify-content-around">
        <a class="text-center py-2 m-0" href="{{ url('/') }}">
            {{-- <img src="{{ asset('images/icon/home.png') }}" alt=""> --}}
            <i class="fas fa-home h-40 text-active-pink p-0 m-0"></i>
            <p class="font-xs text-active-pink p-0 m-0">Home</p>
        </a>
        <a class="text-center py-2 m-0" href="{{ url('/stok') }}">
            {{-- <img src="{{ asset('images/icon/forme.png') }}" alt=""> --}}
            <i class="fa fa-archive h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0 text-center">Stok <br>Box</p>
        </a>
        <a class="text-center py-2 m-0" href="{{ url('/briquette/semi-finished') }}">
            {{-- <img src="{{ asset('images/icon/forme.png') }}" alt=""> --}}
            <i class="fa fa-cube h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0 text-center">Barang <br>1/2 Jadi</p>
        </a>
        <a class="text-center py-2 m-0" href="{{ url('/briquette/finished') }}">
            {{-- <img src="{{ asset('images/icon/forme.png') }}" alt=""> --}}
            <i class="fa fa-cubes h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0">Barang<br> Jadi</p>
        </a>
        <a class="text-center py-2 m-0" href="{{ url('/profile') }}">
            {{-- <img src="{{ asset('images/icon/profil.png') }}" alt=""> --}}
            <i class="fa fa-user h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0">Akun</p>
        </a>
    </div>
  </div>
