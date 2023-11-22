@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('คำนำหน้า') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('prefix_id') is-invalid @enderror" aria-label="Default select example" name="prefix_id">
                                    <option selected autofocus>กรุณาเลือกคำนำหน้า</option>
                                    @foreach($prefixes as $prefix)
                                        <option value="{{ $prefix->id }}">{{ $prefix->prefix_name }}</option>
                                    @endforeach
                                </select>

                                @error('prefix_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อจริง') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('นามสกุล') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('สถานะของผู้ใช้งาน') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('type_id') is-invalid @enderror" aria-label="Default select example" name="type_id">
                                    <option selected autofocus>กรุณาเลือกสถานะผู้ใช้งาน</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>

                                @error('type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('เพศ') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('sex_id') is-invalid @enderror" aria-label="Default select example" name="sex_id">
                                    <option selected autofocus>กรุณาเลือกเพศ</option>
                                    @foreach($sexes as $sex)
                                        <option value="{{ $sex->id }}">{{ $sex->sex_name }}</option>
                                    @endforeach
                                </select>

                                @error('prefix_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('รูปภาพ') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" accept="image/*">
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    // $(){
    //     e.preventDefault();
    //     const fd = new FormData(this);
    //     $("#add_prefix_btn").text('Adding...');
    //     $.ajax({
    //         url: '{{ route('prefixStore') }}',
    //         method: 'post',
    //         data: fd,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         dataType: 'json',
    //         success: function(response) {
    //             if (response.status == 200) {
    //                 Swal.fire(
    //                     'Added!',
    //                     'Prefix Added Successfully!',
    //                     'success'
    //                 )
    //                 fetchAllPrefix();
    //             }
    //             $("#add_prefix_btn").text('Add Prefix');
    //             $("#add_prefix_form")[0].reset();
    //             $("#add_prefix_Modal").modal('hide');
    //         }
    //     });
    // });

    // $.ajax({
    //     function(response) {
    //         if(response.status == 200) {
    //             Swal.fire(
    //                 'Added!',
    //                 'User Added Successfully!',
    //                 'success'
    //             )
    //         }
    //     }
    // });
</script>

@endsection
