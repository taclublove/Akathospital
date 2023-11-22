{{-- modal Google Map Start --}}
<dialog id="my_modal_1" class="modal">
    <div class="modal-box container mx-auto">
        <h1 class="text-bold text-center mb-4 text-2xl">แผนที่โรงพยาบาลอากาศอำนวย</h1>
        <div class="mapouter ">
            <div class="gmap_canvas rounded-10 text-center"><iframe
                    src="https://maps.google.com/maps?q=%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B8%9E%E0%B8%A2%E0%B8%B2%E0%B8%9A%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A8%E0%B8%AD%E0%B8%B3%E0%B8%99%E0%B8%A7%E0%B8%A2&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                    frameborder="0" scrolling="no" style="width: 400px; height: 500px;"></iframe>
                <style>
                    .mapouter {
                        position: relative;
                        height: 400px;
                        width: 300px;
                        background: #fff;
                        /* cursor: pointer; */
                    }
                </style><a href="https://www.eireportingonline.com/ircc-login/"
                    style="color:#fff !important; position:absolute !important; top:0 !important; z-index:0 !important;">ircc
                    login</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        height: 400px;
                        width: 590px
                    }

                    .gmap_canvas iframe {
                        position: relative;
                        z-index: 2
                    }
                </style>
            </div>
        </div>
        <form method="dialog">
            <button
                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 hover:bg-red-600 hover:text-white">✕</button>
        </form>
    </div>

    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>

</dialog>
{{-- modal Google Map End --}}

{{-- modal {ระบบหลังบ้าน} Start --}}
<dialog id="my_modal_2" class="modal">
    <div class="modal-box">
        <h1 class="font-bold text-lg text-center">ระบบหลังบ้าน</h1>
        @guest
            @if (Route::has('login'))
                <form class="space-y-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label class="label" for="login">
                            Username
                        </label>
                        <input id="login" type="text" name="login" value="{{ old('username') ?: old('email') }}" autocomplete="username or email" required placeholder="Username"
                            class=" {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }} w-full input input-bordered input-success " />
                        @if ($errors->has('username') || $errors->has('email'))
                            <span class="invalid:border-red-500">
                                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <label class="label">
                            {{ __('Password') }}
                        </label>
                        <input id="password" type="password" name="password" autocomplete="current-password" required placeholder="Enter Password"
                            class="@error('password') is-invalid @enderror w-full input input-bordered input-success " />
                        @error('password')
                            <span class="invalid:border-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <a href="#" class="text-xs text-gray-600 hover:underline hover:text-blue-600">Forget Password?</a> --}}
                    <div>
                        <button type="submit" class="btn btn-success btn-outline">{{ __('Login') }}Login</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-danger btn-outline" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            @endif
        @else
            <div class="mt-[20px]">
                <h1 class="font-bold text-sm text-center">มีการ Login อยู่แล้ว Click ที่ปุ่มด้านล่างเพื่อเข้าใช้งานระบบ</h1>
            </div>
            <div class="mt-[20px] flex justify-center">
                <a href="{{ route('login') }}" class="btn btn-success btn-outline">เข้าสู่ระบบ</a>
            </div>
        @endguest
        <form method="dialog">
            <button
                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 hover:bg-red-600 hover:text-white">✕</button>
        </form>
    </div>

    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>

</dialog>
{{-- modal {ระบบหลังบ้าน} End --}}