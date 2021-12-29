@extends('layouts.admin')
@section('content')




    <div class="container mt--6">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                @if (session('success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'บันทึกข้อมูลเรียบร้อย',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>
                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">แก้ไขข้อมูล </h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/UserManager/update/' . $users->id) }}" method="post">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">ข้อมูลผู้ใช้</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="title_Name">คำนำหน้า</label>
                                            <select type="text " class="form-control " name="title_Name">

                                                <option value="{{ $users->title_Name }}"> คำนำหน้า</option>
                                                <option value="นาย">นาย</option>
                                                <option value="นางสาว">นางสาว</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class=" col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="first_Name">ชื่อ </label>
                                            <input type="text" class="form-control" name="first_Name"
                                                value="{{ $users->first_Name }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="last_Name">นามสกุล</label>
                                            <input type="text" class="form-control" name="last_Name"
                                                value="{{ $users->last_Name }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="email">อีเมล์</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ $users->email }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="phone_Number">เบอร์โทร</label>
                                            <input type="text" class="form-control" name="phone_Number"
                                                value="{{ $users->phone_Number }}">
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <hr class="my-4" />
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">สถานะปัจจุบัน</h6>
                            <div class="pl-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">
                                        @if ($users->role == 1)
                                            @php($i = 'ผู้ดูแลระบบ')
                                        @else
                                            <h2>
                                                @php($i = 'ผู้ใช้ทั่วไป')
                                            </h2>
                                        @endif

                                        <h4> สถานะปัจจุบัน : <span
                                                class="badge-md badge-pill badge-default ">{{ $i }}</span> </h4>

                                    </label>
                                    <br>
                                    <select type="text " class="form-control " name="role">

                                        <option value="{{ $users->role }}"> เลือกสิทธิผู้ใช้</option>
                                        <option value="0">ผู้ใช้ทั่วไป</option>
                                        <option value="1">ผู้ดูแลระบบ</option>

                                    </select>
                                </div>
                            </div>

                            @error('name')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            @error('email')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            <input type="submit" value="บันทึก" class="btn btn-success">
                            <a href="{{ URL::Route('UserManager') }}" class="btn btn-danger">กลับ</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    </div>
@endsection
