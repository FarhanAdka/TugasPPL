@extends('components/departemen/template')
@section('section')
    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-small mb-2"><b>Nama : </b>{{ $user->name }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-small mb-2"><b>NIM : </b> {{ $user->username }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-small mb-2"><b>Dosen Wali : </b>{{ $nama_doswal }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-small mb-2"> <b>Angkatan : </b>{{ $mahasiswa->angkatan }}</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <h3>Semester</h3>
                    </div>
                    <div class="row text-center">
                        @for ($i = 0; $i < 14; $i++)
                            <div class="p-2 col-md-2">
                                @if ($i < 14)
                                    @php
                                        if ($i + 1 == $smt_skripsi) {
                                            $color = 'btn-success';
                                        } else {
                                            $color = 'btn-primary';
                                        }
                                        if ($i + 1 == $smt_pkl) {
                                            $color = 'btn-secondary';
                                        }
                                        if (isset($smt[$i])) {
                                            $disabled = '';
                                        } else {
                                            $disabled = 'disabled';
                                        }

                                    @endphp
                                    <button class="btn {{ $color }}" data-bs-target="#semester{{ $i + 1 }}"
                                        data-bs-toggle="modal" {{ $disabled }}>Semester
                                        {{ $i + 1 }}</button>

                                    <div class="modal fade" id="semester{{ $i + 1 }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Semester
                                                        {{ $i + 1 }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="nav nav-tabs" id="myTab-{{ $i + 1 }}" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="IRS-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#IRS{{ $i + 1 }}" type="button"
                                                                role="tab" aria-controls="IRS"
                                                                aria-selected="true">IRS</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="KHS-tab" data-bs-toggle="tab"
                                                                data-bs-target="#KHS{{ $i + 1 }}" type="button"
                                                                role="tab" aria-controls="profile"
                                                                aria-selected="false">KHS</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="IRS{{ $i + 1 }}"
                                                            role="tabpanel" aria-labelledby="IRS-tab-{{ $i + 1 }}">
                                                            <div class="p-1 col-md-4">
                                                                SKS Diambil:
                                                                {{ isset($irs[$i]) ? $irs[$i]->jumlah_sks : 0 }}
                                                            </div>
                                                            <div class="p-1 col-md-4">
                                                                <a
                                                                    href="{{ route('dept.IRS', isset($irs[$i]) ? $irs[$i]->id : '') }}">Lihat
                                                                    IRS</a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="KHS{{ $i + 1 }}"
                                                            role="tabpanel" aria-labelledby="KHS-tab-{{ $i + 1 }}">
                                                            <div class="p-1 col-md-4">
                                                                IP Semester: {{ isset($khs[$i]) ? $khs[$i]->ip : 0 }}
                                                            </div>
                                                            <div class="p-1 col-md-4">
                                                                SKS Semester:
                                                                {{ isset($khs[$i]) ? $khs[$i]->jumlah_sks : 0 }}
                                                            </div>
                                                            <div class="p-1 col-md-4">
                                                                IP Kumulatif: {{ isset($khs[$i]) ? $khs[$i]->ipk : 0 }}
                                                            </div>
                                                            <div class="p-1 col-md-4">
                                                                SKS Kumulatif:
                                                                {{ isset($khs[$i]) ? $khs[$i]->sks_kumulatif : 0 }}
                                                            </div>
                                                            <div class="p-1 col-md-4">
                                                                <a
                                                                    href="{{ route('dept.KHS', isset($khs[$i]) ? $khs[$i]->id : '') }}">Lihat
                                                                    KHS</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>

                </div>
            </div>

    </section>
@endsection
