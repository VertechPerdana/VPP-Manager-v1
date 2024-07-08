@php
    $page = Session::get('page');
    $page_title = $page['page_title'];
    // $authenticated_user_data = Session::get('authenticated_user_data');
@endphp

@extends('layouts.userpanels.v_main')

@section('header_page_cssjs')
@endsection


@section('page-content')
    <section id="dashboard-ecommerce">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ $page_title }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('userPanels.dashboard') }}">UserPanels</a>
                                </li>
                                <li class="breadcrumb-item active"> {{ $page_title }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- @auth --}}
        <div class="row match-height">

            <!-- QuoteOfTheDay Card -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card card-quote">
                    <div class="card-body p-1">
                        <div>
                            <p class="m-0"><strong>{{ $quote['text'] }}</strong><span style="color: gray;">
                                    {{ '  —' . $quote['author'] }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ QuoteOfTheDay Card -->

            <!-- TableAbsen Card -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card card-developer-meetup">
                    <div class="card-body p-1">
                        <table id="dashboardKaryawanTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                    <th>Proof</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                </tr>
                            </thead>
                            <tbody></tbody>

                            {{-- <tbody>
                                    @foreach ($loadAbsenFromDB as $absen)
                                        <tr>
                                            <td>{{ $absen->karyawan->na_karyawan ?: '-' }}</td>
                                            <td>{{ $absen->status ?: '-' }}</td>
                                            <td>{{ $absen->detail ?: '-' }}</td>
                                            <td>
                                                @if ($absen->bukti)
                                                    <div class="d-flex align-items-center justify-content-around">
                                                        <img src="{{ asset('public/absen/uploads/proof/' . $absen->bukti) }}" alt="Proof 0"
                                                            style="height: 24px; width: 24px;" class="hover-image">
                                                    </div>
                                                @else
                                                <div class="d-flex align-items-center justify-content-around">
                                                    -
                                                </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($absen->checkin)
                                                    {{ \Carbon\Carbon::parse($absen->checkin)->isoFormat('dddd, DD MMMM YYYY, h:mm:ss A') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($absen->checkout)
                                                    {{ \Carbon\Carbon::parse($absen->checkout)->isoFormat('dddd, DD MMMM YYYY, h:mm:ss A') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                        </table>
                    </div>

                </div>
            </div>
            <!--/ TableAbsen Card -->



        </div>

        {{-- @endauth --}}


    </section>
@endsection


@section('footer_page_js')
    <script src="{{ 'public/theme/vuexy/app-assets/js/scripts/components/components-modals.js' }}"></script>



    {{-- @auth --}}
        <script>
            $(document).ready(function() {
                $('#dashboardKaryawanTable').DataTable({
                    lengthMenu: [5, 10, 15, 20, 25, 50, 100, 150, 200, 250],
                    pageLength: 10,
                    responsive: true,
                    ordering: true,
                    searching: true,
                    language: {
                        lengthMenu: 'Display _MENU_ records per page',
                        info: 'Showing page _PAGE_ of _PAGES_',
                        search: 'Search',
                        paginate: {
                            first: 'First',
                            last: 'Last',
                            next: '&rarr;',
                            previous: '&larr;'
                        }
                    },
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
        </script>
    {{-- @endauth --}}
@endsection
