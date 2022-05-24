<div class="bottom-nav">
    <div class="d-flex justify-content-around">
        <a class="text-center py-2 m-0" href="{{ route('frontend.dashboard.index') }}">
            {{-- <img src="{{ asset('images/icon/home.png') }}" alt=""> --}}
            <i class="fas fa-home h-40 text-active-pink p-0 m-0"></i>
            <p class="font-xs text-active-pink p-0 m-0">Home</p>
        </a>
        @if (Auth::user()->role == '2' || Auth::user()->role == '0')
        <a class="text-center py-2 m-0" href="{{ route('frontend.stock.index') }}">
            {{-- <img src="{{ asset('images/icon/forme.png') }}" alt=""> --}}
            <i class="fa fa-archive h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0 text-center">Stok <br>Box</p>
        </a>
        @endif
        @if (Auth::user()->role == '1' || Auth::user()->role == '0')
        <a class="text-center py-2 m-0" href="{{ route('frontend.semi-finished.index') }}">
            {{-- <img src="{{ asset('images/icon/forme.png') }}" alt=""> --}}
            <i class="fa fa-cube h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0 text-center">Barang <br>1/2 Jadi</p>
        </a>
        <a class="text-center py-2 m-0" href="{{ route('frontend.finished.index') }}">
            {{-- <img src="{{ asset('images/icon/forme.png') }}" alt=""> --}}
            <i class="fa fa-cubes h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0">Barang<br> Jadi</p>
        </a>
        @endif
        <a class="text-center py-2 m-0" href="{{ route('frontend.profile.edit') }}">
            {{-- <img src="{{ asset('images/icon/profil.png') }}" alt=""> --}}
            <i class="fa fa-user h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0">Akun</p>
        </a>
    </div>
</div>