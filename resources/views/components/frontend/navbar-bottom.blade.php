<div class="bottom-nav">
    <div class="d-flex justify-content-around">
        <a class="text-center py-2 m-0 {{ request()->routeIs(['frontend.dashboard.index']) ? 'active' : '' }}" href="{{ route('frontend.dashboard.index') }}">
            {{-- <img src="{{ asset('images/icon/home.png') }}" alt=""> --}}
            <i class="fas fa-home h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0 {{ request()->routeIs(['frontend.dashboard.index']) ? 'text-active-pink' : '' }}">Home</p>
        </a>
        @if (Auth::user()->role == '2' || Auth::user()->role == '0')
        <a class="text-center py-2 m-0 {{ request()->routeIs(['frontend.stock.index', 'frontend.inner.index', 'frontend.inner.create', 'frontend.inner.edit', 'frontend.master.index', 'frontend.master.create', 'frontend.master.edit', 'frontend.plastic.index', 'frontend.plastic.create', 'frontend.plastic.edit']) ? 'active' : '' }}" href="{{ route('frontend.stock.index') }}">
            {{-- <img src="{{ asset('images/icon/forme.png') }}" alt=""> --}}
            <i class="fa fa-archive h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0 text-center {{ request()->routeIs(['frontend.stock.index', 'frontend.inner.index', 'frontend.inner.create', 'frontend.inner.edit', 'frontend.master.index', 'frontend.master.create', 'frontend.master.edit', 'frontend.plastic.index', 'frontend.plastic.create', 'frontend.plastic.edit']) ? 'text-active-pink' : '' }}">Stok <br>Box</p>
        </a>
        @endif
        @if (Auth::user()->role == '1' || Auth::user()->role == '0')
        <a class="text-center py-2 m-0 {{ request()->routeIs(['frontend.semi-finished.index', 'frontend.semi-finished.create', 'frontend.semi-finished.edit']) ? 'active' : '' }}" href="{{ route('frontend.semi-finished.index') }}">
            {{-- <img src="{{ asset('images/icon/forme.png') }}" alt=""> --}}
            <i class="fa fa-cube h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0 text-center {{ request()->routeIs(['frontend.semi-finished.index', 'frontend.semi-finished.create', 'frontend.semi-finished.edit']) ? 'text-active-pink' : '' }}">Barang <br>1/2 Jadi</p>
        </a>
        <a class="text-center py-2 m-0 {{ request()->routeIs(['frontend.finished.index', 'frontend.finished.create', 'frontend.finished.edit']) ? 'active' : '' }}" href="{{ route('frontend.finished.index') }}">
            {{-- <img src="{{ asset('images/icon/forme.png') }}" alt=""> --}}
            <i class="fa fa-cubes h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0 {{ request()->routeIs(['frontend.finished.index', 'frontend.finished.create', 'frontend.finished.edit']) ? 'text-active-pink' : '' }}">Barang<br> Jadi</p>
        </a>
        @endif
        <a class="text-center py-2 m-0 {{ request()->routeIs(['frontend.profile.edit']) ? 'active' : '' }}" href="{{ route('frontend.profile.edit') }}">
            {{-- <img src="{{ asset('images/icon/profil.png') }}" alt=""> --}}
            <i class="fa fa-user h-40 p-0 m-0"></i>
            <p class="font-xs text-light-pink p-0 m-0 {{ request()->routeIs(['frontend.profile.edit']) ? 'text-active-pink' : '' }}">Akun</p>
        </a>
    </div>
</div>
