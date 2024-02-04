@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="">

            <div class="card">
                <div class="card-header">Dashboard
                    @can('isAdmin')
                    <span class="badge rounded-pill text-bg-success">Admin Laundry</span>
                    @endcan
                    @can('isKaryawan')
                    <span class="badge rounded-pill text-bg-info">Karyawan Laundry</span>
                    @endcan
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @can('isAdmin')
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-custom" type="button" role="tab" aria-controls="nav-custom" aria-selected="true">Customers</button>
                            <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-karya" type="button" role="tab" aria-controls="nav-karya" aria-selected="true">Karyawan</button>
                        </div>
                    </nav>
                    <br>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-custom" role="tabpanel" aria-labelledby="nav-custom-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row text-center" style="padding-top: 20px;">
                                        <div class="col">
                                            <button type="button" class="btn position-relative">
                                                Total Pesanan
                                                <span class="position-absolute top-20 start-50 translate-middle badge rounded-pill bg-info">
                                                    {{ $ddd }}
                                                    <span class="visually-hidden">Total Pesanan</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn position-relative">
                                                Uang Terkumpul
                                                <span class="position-absolute top-20 start-50 translate-middle badge rounded-pill bg-success">
                                                    {{ $ppp }}
                                                    <span class="visually-hidden">Total Pesanan</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn position-relative">
                                                Pelanggan
                                                <span class="position-absolute top-20 start-50 translate-middle badge rounded-pill bg-dark">
                                                    {{ $ccc }}
                                                    <span class="visually-hidden">Total Pesanan</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h3><b>Daftar Pelanggan</b></h3>
                            <table class="table table-hover table-responsive" style="word-break: break-all;">
                                <thead class="table-dark" style="text-align: center;vertical-align:middle;">
                                    <tr>
                                        <th scope="col">Pelanggan </th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;vertical-align:middle;">
                                    @foreach ($pelanggans as $plgg)
                                    <tr>
                                        <td>{{ $plgg->nama }}</td>
                                        <td>
                                            @if($plgg->status === "Selesai")
                                            <span id="statustd" class="badge text-bg-success">{{ $plgg->status }}</span>
                                            @elseif($plgg->status == "Pending")
                                            <span id="statustd" class="badge text-bg-danger">{{ $plgg->status }}</span>
                                            @elseif($plgg->status == "Prosess")
                                            <span id="statustd" class="badge text-bg-warning">{{ $plgg->status }}</span>
                                            @else
                                            <span id="statustd" class="badge text-bg-secondary">{{ $plgg->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#StatusModal-{{ $plgg->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg></a>
                                            <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal-{{ $plgg->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane " id="nav-karya" role="tabpanel" aria-labelledby="nav-karya-tab" tabindex="0">
                            <h3><b>Daftar Karyawan</b></h3>
                            <button type="button" style="width: 100%;" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#TKModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                                </svg> Tambah Karyawan
                            </button>
                            <table class="table table-hover table-responsive" style="word-break: break-all;">
                                <thead class="table-dark" style="text-align: center;vertical-align:middle;">
                                    <tr>
                                        <th scope="col">Karyawan </th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;vertical-align:middle;">
                                    @foreach ($aad as $add)
                                    <tr>
                                        <td>{{ $add->name }}</td>
                                        <td>
                                            @if($add->role === "admin")
                                            <span id="roletd" class="badge text-bg-success">{{ $add->role }}</span>
                                            @elseif($add->role == "karyawan")
                                            <span id="roletd" class="badge text-bg-warning">{{ $add->role }}</span>
                                            @else
                                            <span id="roletd" class="badge text-bg-secondary">{{ $add->role }}</span>
                                            @endif
                                        </td>
                                        @if($add->role === "admin")
                                        <td>
                                            <a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#StatusModalKarya-{{ $add->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg></a>
                                        </td>
                                        @elseif($add->role == "karyawan")
                                        <td>
                                            <a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#StatusModalKarya-{{ $add->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg></a>
                                            <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModalKarya-{{ $add->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg></a>
                                        </td>
                                        @else
                                        <td>
                                            <a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#StatusModalKarya-{{ $add->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg></a>
                                            <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModalKarya-{{ $add->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg></a>
                                        </td>
                                        @endif

                                    </tr>



                                    <!-- Delete Modal  Karyawan -->
                                    <div class="modal fade" id="DeleteModalKarya-{{ $add->id }}" tabindex="-1" aria-labelledby="DeleteModalLabel-{{ $add->id }}" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class=" modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="StatusModalLabel-{{  $add->id }}"><b><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                            </svg> DELETE KARYAWAN</b></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="deleteKarya">
                                                        @csrf
                                                        <input type="hidden" class="form-control" id="idexx" name="idexx" value="{{ $add->id }}" required>
                                                        Apakah kamu yakin ingin menghapus <b>{{$add->name}}</b> dari data karyawan?
                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                                    <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                        </svg> </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Tambah Karyawan -->
                    <!-- Modal -->
                    <div class="modal fade" id="TKModal" tabindex="-1" aria-labelledby="TKModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="TKModalLabel"><b> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                                            </svg> TAMBAH KARYAWAN</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="tambahKarya">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="namakarya " class="form-label">Nama Karyawan</label>
                                            <input type="text" class="form-control" id="namakarya" name="namakarya" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="emailkarya" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="emailkarya" name="emailkarya" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="passwordkarya" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="passwordkarya" name="passwordkarya" required>
                                            <input type="checkbox" onclick="swhdpass()">Show Password
                                        </div>


                                </div>
                                <script>
                                    function swhdpass() {
                                        var xx = document.getElementById("passwordkarya");
                                        if (xx.type === "password") {
                                            xx.type = "text";
                                        } else {
                                            xx.type = "password";
                                        }
                                    }
                                </script>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-primary">Tambah Karyawan<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z" />
                                        </svg> </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>

                    @foreach ($aad as $add)
                    <!-- Check Status Karyawan-->
                    <div class="modal fade" id="StatusModalKarya-{{ $add->id }}" tabindex="-1" aria-labelledby="StatusModalKaryaLabel-{{ $add->id }}" aria-hidden="true">

                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="StatusModalKaryaLabel-{{  $add->id }}"><b><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg> DATA KEPEGAWAIAN</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="updateKarya">
                                        @csrf
                                        <input type="hidden" class="form-control" id="idex" name="idex" value="{{ $add->id }}" required>
                                        <div class="mb-3">
                                            <h3 class="text-bg-primary text-center"><b>{{ $add->name }} ( {{ $add->role }} )</b></h3>
                                        </div>
                                        <div class="mb-3">
                                            <label for="karyaw-{{  $add->id }}" class="form-label">Nama Lengkap: {{ $add->name }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="karyaw-{{  $add->id }}" class="form-label">Email: {{ $add->email }}</label>
                                        </div>

                                        <div class="mb-3">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="jenis">Jabatan</label>
                                                <select class="form-select" id="statuskarya-{{  $add->id }}" name="statuskarya" aria-valuenow="" required>
                                                    <option value="admin">admin</option>
                                                    <option value="karyawan">karyawan</option>
                                                </select>
                                            </div>
                                        </div>


                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-primary">Simpan <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z" />
                                        </svg> </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>

                    <script>
                        var xoptions = document.getElementById("statuskarya-{{  $add->id }}").options;
                        for (var x = 0; x < xoptions.length; x++) {
                            if (xoptions[x].text == "{{  $add->role }}") {
                                xoptions[x].selected = true;
                                break;
                            }
                        }
                    </script>
                    @endforeach


                    @foreach ($pelanggans as $plgg)
                    <!-- Check Status -->
                    <div class="modal fade" id="StatusModal-{{ $plgg->id }}" tabindex="-1" aria-labelledby="StatusModalLabel-{{ $plgg->id }}" aria-hidden="true">

                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="StatusModalLabel-{{  $plgg->id }}"><b><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg> DATA CUSTOMERS</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="updateSts">
                                        @csrf
                                        <input type="hidden" class="form-control" id="ids" name="ids" value="{{ $plgg->id }}" required>
                                        <div class="mb-3">
                                            <h3 class="text-bg-primary text-center"><b>Karyawan: {{ $plgg->nama_karyawan }}</b></h3>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Nama Customer: {{ $plgg->nama }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Nomor Telepon: {{ $plgg->nomor_telepon }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Alamat:</label>
                                            <p>{{ $plgg->alamat }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Layanan: {{ $plgg->layanan }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Jenis: {{ $plgg->jenis }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Harga: {{ "Rp " . number_format($plgg->harga, 2, ',', '.'); }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Masuk Cucian: {{ $plgg->masuk }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Pengambilan Cucian: {{ $plgg->keluar }}</label>
                                        </div>


                                        <div class="mb-3">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="jenis">Status</label>
                                                <select class="form-select" id="status-{{  $plgg->id }}" name="status" aria-valuenow="" required>
                                                    <option value="Selesai">Selesai</option>
                                                    <option value="Prosess">Prosess</option>
                                                    <option value="Pending">Pending</option>
                                                </select>
                                            </div>
                                        </div>


                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-primary">Save Customer <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z" />
                                        </svg> </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="DeleteModal-{{ $plgg->id }}" tabindex="-1" aria-labelledby="DeleteModalLabel-{{ $plgg->id }}" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">
                            <div class=" modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="StatusModalLabel-{{  $plgg->id }}"><b><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg> DELETE CUSTOMERS</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="deleteCust">
                                        @csrf
                                        <input type="hidden" class="form-control" id="idex" name="idex" value="{{ $plgg->id }}" required>
                                        Apakah kamu yakin ingin menghapus <b>{{$plgg->nama}}</b> dari data customer?
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg> </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                    <script>
                        var options = document.getElementById("status-{{  $plgg->id }}").options;
                        for (var i = 0; i < options.length; i++) {
                            if (options[i].text == "{{  $plgg->status }}") {
                                options[i].selected = true;
                                break;
                            }
                        }
                    </script>

                    @endforeach



                    @else
                    <!-- KARYAWAN -->
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="card">
                            <div class="card-body">
                                <div class="row text-center" style="padding-top: 20px;">
                                    <div class="col">
                                        <button type="button" class="btn position-relative">
                                            Total Pesanan
                                            <span class="position-absolute top-20 start-50 translate-middle badge rounded-pill bg-info">
                                                {{ $ddd }}
                                                <span class="visually-hidden">Total Pesanan</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn position-relative">
                                            Uang Terkumpul
                                            <span class="position-absolute top-20 start-50 translate-middle badge rounded-pill bg-success">
                                                {{ $ppp }}
                                                <span class="visually-hidden">Total Pesanan</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn position-relative">
                                            Pelanggan
                                            <span class="position-absolute top-20 start-50 translate-middle badge rounded-pill bg-dark">
                                                {{ $ccc }}
                                                <span class="visually-hidden">Total Pesanan</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Customers</button>
                        </div>
                    </nav>
                    <button type="button" style="width: 100%;" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#TCModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                        </svg> Tambah Customer
                    </button>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                            <table class="table table-hover">
                                <thead class="table-dark" style="text-align: center;vertical-align:middle;">
                                    <tr>
                                        <th scope="col">Pelanggan </th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;vertical-align:middle;">
                                    @foreach ($pelanggans as $plgg)
                                    <tr>
                                        <td>{{ $plgg->nama }}</td>
                                        <td>
                                            @if($plgg->status === "Selesai")
                                            <span id="statustd" class="badge text-bg-success">{{ $plgg->status }}</span>
                                            @elseif($plgg->status == "Pending")
                                            <span id="statustd" class="badge text-bg-danger">{{ $plgg->status }}</span>
                                            @elseif($plgg->status == "Prosess")
                                            <span id="statustd" class="badge text-bg-warning">{{ $plgg->status }}</span>
                                            @else
                                            <span id="statustd" class="badge text-bg-secondary">{{ $plgg->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#StatusModal-{{ $plgg->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg></a>
                                            <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal-{{ $plgg->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tambah Customers -->
                    <!-- Modal -->
                    <div class="modal fade" id="TCModal" tabindex="-1" aria-labelledby="TCModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="TCModalLabel"><b> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                                            </svg> TAMBAH CUSTOMERS</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="tambahCust">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="namacustomer" class="form-label">Nama Customer</label>
                                            <input type="hidden" class="form-control" id="karyawan" name="karyawan" value="{{ Auth::user()->email }}" required>
                                            <input type="hidden" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{ Auth::user()->name }}" required>
                                            <input type="text" class="form-control" id="namacustomer" name="namacustomer" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Alamat Customer</span>
                                                <textarea required id="alamat" name="alamat" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nomorhp" class="form-label">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="nomorhp" name="nomorhp" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="layanan">Layanan</label>
                                                <select class="form-select" id="layanan" name="layanan" required>
                                                    <option selected>Pilih Layanan...</option>
                                                    <option value="Cuci Kering Lipat">Cuci Kering Lipat</option>
                                                    <option value="Cuci Kering Gosok">Cuci Kering Gosok</option>
                                                    <option value="Setrika Kiloan">Setrika Kiloan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="jenis">Jenis Layanan</label>
                                                <select class="form-select" id="jenis" name="jenis" required>
                                                    <option selected>Pilih Jenis Layanan...</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="One Day">One Day</option>
                                                    <option value="Express">Express</option>
                                                    <option value="Quick">Quick</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="kiloan" class="form-label">Berat Cucian (kg)</label>
                                            <input type="number" class="form-control" id="kiloan" name="kiloan" placeholder="1" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tglmasuk" class="form-label">Tanggal Masuk Cucian</label>
                                            <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tglkeluar" class="form-label">Tanggal Keluar Cucian</label>
                                            <input type="date" class="form-control" id="tglkeluar" name="tglkeluar" required>
                                        </div>

                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-primary">Tambah Customer <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z" />
                                        </svg> </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>

                    @foreach ($pelanggans as $plgg)
                    <!-- Check Status -->
                    <div class="modal fade" id="StatusModal-{{ $plgg->id }}" tabindex="-1" aria-labelledby="StatusModalLabel-{{ $plgg->id }}" aria-hidden="true">

                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="StatusModalLabel-{{  $plgg->id }}"><b><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg> DATA CUSTOMERS</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="updateSts">
                                        @csrf
                                        <input type="hidden" class="form-control" id="ids" name="ids" value="{{ $plgg->id }}" required>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Nama Customer: {{ $plgg->nama }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Nomor Telepon: {{ $plgg->nomor_telepon }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Alamat: {{ $plgg->alamat }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Layanan: {{ $plgg->layanan }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Jenis: {{ $plgg->jenis }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Harga: {{ "Rp " . number_format($plgg->harga, 2, ',', '.'); }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Masuk Cucian: {{ $plgg->masuk }} </label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cust-{{  $plgg->id }}" class="form-label">Pengambilan Cucian: {{ $plgg->keluar }}</label>
                                        </div>


                                        <div class="mb-3">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="jenis">Status</label>
                                                <select class="form-select" id="status-{{  $plgg->id }}" name="status" aria-valuenow="" required>
                                                    <option value="Selesai">Selesai</option>
                                                    <option value="Prosess">Prosess</option>
                                                    <option value="Pending">Pending</option>
                                                </select>
                                            </div>
                                        </div>


                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-primary">Save Customer <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z" />
                                        </svg> </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Delete Modals -->
                    <div class="modal fade" id="DeleteModal-{{ $plgg->id }}" tabindex="-1" aria-labelledby="DeleteModalLabel-{{ $plgg->id }}" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">
                            <div class=" modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="StatusModalLabel-{{  $plgg->id }}"><b><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg> DELETE CUSTOMERS</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="deleteCust">
                                        @csrf
                                        <input type="hidden" class="form-control" id="idex" name="idex" value="{{ $plgg->id }}" required>
                                        Apakah kamu yakin ingin menghapus <b>{{$plgg->nama}}</b> dari data customer?
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg> </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>

                    <script>
                        var options = document.getElementById("status-{{  $plgg->id }}").options;
                        for (var i = 0; i < options.length; i++) {
                            if (options[i].text == "{{  $plgg->status }}") {
                                options[i].selected = true;
                                break;
                            }
                        }
                    </script>
                    @endforeach

                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

@endsection