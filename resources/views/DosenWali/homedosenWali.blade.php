@extends('components/dosen_wali/sidebar')
@section('section')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                        <p class="text-subtitle text-muted">Navbar will appear on the top of the page.
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/user/dosenWali/profile">Profil</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Default </h4>
                    </div>
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, commodi? Ullam
                        quaerat
                        similique iusto
                        temporibus, vero aliquam praesentium, odit deserunt eaque nihil saepe hic
                        deleniti?
                        Placeat delectus
                        quibusdam ratione ullam!
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
