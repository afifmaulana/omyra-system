<!doctype html>
<html lang="en">
  @include('components.frontend.head')
  <body>
    <div class="mt-3">
        <div class="container-omyra">
            <div class="row mb-4">
                <div class="shadow shadow-lg">
                    <div class="">
                        <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                    </div>
                    <div class="row justify-content-center w-100" style="position: absolute; top: 15px;">
                        <div class="mr-2">
                            <img src="{{ asset('images/logo.png') }}" alt="m-omyra" width="20">
                        </div>
                        <div class="text-active-pink font-weight-500 font-size-19"><b>Omyra</b></div>
                    </div>
                </div>
            </div>

            <div class="mb-4 text-center">
                <div class="font-size-24 font-weight-700">Masuk</div>
            </div>

            <form action="{{ route('login.frontend.submit') }}" method="POST" class="mb-4">
                @csrf
                <div class="form-group">
                    <label class="font-weight-500" for="email">Email</label>
                    <input type="text" class="form-control bg-input-auth font-size-16 form-omyra"
                    name="email" id="email" placeholder="Masukkan Email">
                </div>
                <label class="font-weight-500" for="password">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control bg-input-auth font-size-16 form-omyra border-right-none"
                    name="password" id="password" placeholder="*********">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-input-auth border-span">
                            <img src="{{ asset('images/icon/hide-password.png') }}" alt="">
                        </span>
                    </div>
                </div>
                <button class="btn btn-omyra btn-pink text-white btn-block" type="submit">Masuk Sekarang</button>
            </form>

        </div>
    </div>
    @include('components.frontend.scripts')
  </body>
</html>
