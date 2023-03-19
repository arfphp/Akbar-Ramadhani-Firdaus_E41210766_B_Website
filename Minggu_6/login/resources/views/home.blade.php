{{-- Ini adalah direktif Blade yang digunakan untuk menunjukkan bahwa view ini merupakan turunan dari layout app.blade.php. Layout ini biasanya berisi kode-kode HTML yang berulang dan sering digunakan pada setiap halaman. --}}
@extends('layouts.app')

{{-- Ini adalah direktif Blade yang digunakan untuk menandai awal dari sebuah bagian konten pada layout. Pada layout app.blade.php, terdapat section dengan nama 'content' dan view ini akan menempatkan konten pada bagian tersebut. --}}
@section('content')
    {{-- Ini adalah tag HTML yang digunakan untuk membuat sebuah container. Container digunakan untuk mengelompokkan konten pada halaman agar terlihat lebih rapi. Di dalam container terdapat row yang berisi col-md-8 yang akan menempatkan content utama. --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- Ini adalah tag HTML yang digunakan untuk membuat header pada card. Pada kode ini, header card memiliki teks "Dashboard". Kode __() digunakan untuk menerjemahkan teks ke dalam bahasa yang sesuai dengan preferensi pengguna. --}}
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    {{-- Ini adalah tag HTML yang digunakan untuk membuat content pada card. Pada kode ini, terdapat pesan "You are logged in!" yang akan ditampilkan pada halaman dashboard setelah user berhasil login. --}}
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Ini adalah direktif Blade yang digunakan untuk menandai akhir dari sebuah section pada layout. Pada kode ini, direktif ini menutup section 'content'. --}}
@endsection
