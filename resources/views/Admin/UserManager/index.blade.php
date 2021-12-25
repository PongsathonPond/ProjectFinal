@extends('layouts.admin')

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
                                            <th scope="row"> {{ $users->firstItem() + $loop->index }} </th>
                                            <td class="budget">{{ $row->first_Name }} {{ $row->last_Name }}
                                            </td>
                                            <td>{{ $row->email }}</td>
                                            @if ($row->role == 1)
                                                <td><span class="badge-lg badge-pill badge-warning ">ผู้ดูแลระบบ</span>
                                                </td>
                                            @else
                                                <td><span class="badge-lg badge-pill badge-success">ผู้ใช้ทั่วไป</span></td>
                                            @endif
                                            <td>
                                                <a href="{{ url('/UserManager/edit/' . $row->id) }}"
                                                    class="fas fa-edit fa-lg btn btn-warning"> </a>
                                                <a href="{{ url('/UserManager/delete/' . $row->id) }}"
                                                    class="fas fa-trash-alt fa-lg btn btn-danger"
                                                    onclick="return confirm('ลบหรือไม่ ?')"> </a>
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
