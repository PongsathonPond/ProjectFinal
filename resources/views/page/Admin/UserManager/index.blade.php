@extends('layouts.admin')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@section('content')



    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'ลบข้อมูลเรียบร้อย',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>
                @endif

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="mb-0">จัดการข้อมูลผู้ใช้</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr align="center">
                                        <th scope="col" class="sort" data-sort="name">ลำดับ</th>
                                        <th scope="col" class="sort" data-sort="budget">ชื่อ-นามสกุล</th>
                                        <th scope="col" class="sort" data-sort="status">Email</th>
                                        <th scope="col">สถานะ</th>
                                        <th scope="col">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($users as $row)
                                        <tr class="ss" align="center">
                                            <th scope="row">{{ $users->firstItem() + $loop->index }} </th>
                                            <td class="budget">{{ $row->title_Name }} {{ $row->first_Name }}
                                                {{ $row->last_Name }}
                                            </td>
                                            <td>{{ $row->email }}</td>
                                            @if ($row->role == 1)
                                                <td><span class="badge-lg badge-pill badge-warning ">ผู้ดูแลระบบ</span>
                                                </td>
                                            @else
                                                <td><span class="badge-lg badge-pill badge-success">ผู้ใช้ทั่วไป</span></td>
                                            @endif
                                            <td>
                                                {{-- <a href="{{ url('/UserManager/edit/' . $row->id) }}"
                                                    class="fas fa-edit fa-lg btn btn-warning"> </a> --}}

                                                <button type="button" class="fas fa-edit fa-lg btn btn-warning"
                                                    data-toggle="modal" data-target="#exampleModal{{ $row->id }}">

                                                </button>


                                                <div class="modal fade" id="exampleModal{{ $row->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    แก้ไขข้อมูล</h5>

                                                            </div>
                                                            <div class="modal-body">


                                                                <form
                                                                    action="{{ url('/UserManager/update/' . $row->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <h6 class="heading-small text-muted mb-4">ข้อมูลผู้ใช้
                                                                    </h6>
                                                                    <div class="pl-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="title_Name">คำนำหน้า</label>
                                                                                    <select type="text "
                                                                                        class="form-control "
                                                                                        name="title_Name">

                                                                                        <option
                                                                                            value="{{ $row->title_Name }}">
                                                                                            {{ $row->title_Name }}
                                                                                        </option>
                                                                                        @if ($row->title_Name == 'นางสาว')
                                                                                            <option value="นาย">นาย
                                                                                            </option>

                                                                                        @else
                                                                                            <option value="นางสาว">นางสาว
                                                                                            </option>
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="first_Name">ชื่อ </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="first_Name"
                                                                                        value="{{ $row->first_Name }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="last_Name">นามสกุล</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="last_Name"
                                                                                        value="{{ $row->last_Name }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="email">อีเมล์</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="email"
                                                                                        value="{{ $row->email }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="phone_Number">เบอร์โทร</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="phone_Number"
                                                                                        value="{{ $row->phone_Number }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <h6 class="heading-small text-muted mb-4">สถานะปัจจุบัน
                                                                    </h6>
                                                                    <div class="pl-lg-3">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label">
                                                                                @if ($row->role == 1)
                                                                                    @php($i = 'ผู้ดูแลระบบ')
                                                                                @else
                                                                                    <h2>
                                                                                        @php($i = 'ผู้ใช้ทั่วไป')
                                                                                    </h2>
                                                                                @endif

                                                                                <h4> สถานะปัจจุบัน : <span
                                                                                        class="badge-md badge-pill badge-default ">{{ $i }}</span>
                                                                                </h4>

                                                                            </label>
                                                                            <br>
                                                                            <select type="text " class="form-control "
                                                                                name="role">

                                                                                <option value="{{ $row->role }}">
                                                                                    เลือกสิทธิผู้ใช้</option>
                                                                                <option value="0">ผู้ใช้ทั่วไป</option>
                                                                                <option value="1">ผู้ดูแลระบบ</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    @error('name')
                                                                        <div class="my-2">
                                                                            <span class="text-danger my-2"> {{ $message }}
                                                                            </span>
                                                                        </div>
                                                                    @enderror

                                                                    @error('email')
                                                                        <div class="my-2">
                                                                            <span class="text-danger my-2"> {{ $message }}
                                                                            </span>
                                                                        </div>
                                                                    @enderror
                                                                    <input type="submit" value="บันทึก"
                                                                        class="btn btn-success">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">ปิด</button>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            </form>


                                                        </div>

                                                    </div>
                                                </div>
                        </div>


                        <a href="{{ url('/UserManager/delete/' . $row->id) }}"
                            class="fas fa-trash-alt fa-lg btn btn-danger" onclick="return confirm('ลบหรือไม่ ?')"> </a>
                        </td>

                        </tr>
                        @endforeach

                        </tbody>
                        </table>
                    </div>

                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
