@extends('layouts.admin')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@section('content')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'บันทึกข้อมูลรถเรียบร้อย',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>
                @endif
                <div class="card ">
                    <div class="card-header">
                        <h3>เพิ่มผู้เข้าใช้ห้องสมุด</h3>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="id_student">ชื่อห้อง</label>
                                                        <input type="text" class="form-control" name="id_student">
                                                    </div>
                                                </div>

                                                <div class=" col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="titile">ที่ตั้งอาคาร
                                                        </label>
                                                        <input type="text" class="form-control" name="titile">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="firstname">ชั้น</label>
                                                        <input type="text" class="form-control" name="firstname">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="lastname">ความจุ</label>
                                                        <input type="text" class="form-control" name="lastname">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="department">ราคา</label>
                                                        <input type="text" class="form-control" name="department">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="class">พื้นที่</label>
                                                        <input type="text" class="form-control" name="class">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="class">ประเภท</label>
                                                        <select type="text " class="form-control " name="role">

                                                            <option value="">
                                                                เลือกประเภท</option>
                                                            <option value="0">ผู้ใช้ทั่วไป</option>
                                                            <option value="1">ผู้ดูแลระบบ</option>

                                                        </select>
                                                    </div>
                                                </div>



                                            </div>


                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="class">รูปภาพ</label>
                                                        <input type="file" class="form-control" name="class">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                        <input type="submit" value="เพิ่ม" class="btn btn-success "
                                            style="margin-left: 40%">
                                        @error('accessories_number')
                                            <div class="my-2">
                                                <span class="text-danger my-2"> {{ $message }} </span>
                                            </div>
                                        @enderror

                                        @error('accessories_name')
                                            <div class="my-2">
                                                <span class="text-danger my-2"> {{ $message }} </span>
                                            </div>
                                        @enderror
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">ผู้เข้าใช้ล่าสุด </h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr align="center">
                                    <th scope="col" class="sort" data-sort="name">ลำดับ</th>
                                    <th scope="col" class="sort" data-sort="name">รหัสนักศึกษา</th>
                                    <th scope="col" class="sort" data-sort="status">ชื่อ-นามสกุล</th>
                                    <th scope="col" class="sort" data-sort="status">แผนก</th>
                                    <th scope="col" class="sort" data-sort="status">ชั้น</th>
                                    <th scope="col" class="sort" data-sort="status">เวลาเข้าใช้</th>

                                    <th scope="col">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="list">



                                <tr class="ss" align="center">
                                    <th scope="row"></th>

                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    <td></td>

                                    <td>

                                        <a href="#}" class="fas fa-trash-alt fa-lg btn btn-danger"
                                            onclick="return confirm('ลบหรือไม่ ?')"> </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>


                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
