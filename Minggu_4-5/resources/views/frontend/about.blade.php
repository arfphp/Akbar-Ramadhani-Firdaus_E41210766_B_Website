{{-- mewarisi atau mengambil template utama pada folder frontend, sehingga kita dapat menggunakan semua kode yang ada di dalamnya. --}}
@extends('frontend.template')

{{-- memuat / memanggil file navbar yang berada di dalam folder frontend --}}
@include('frontend.navbar')

@section('container_about')
    <h1>_____</h1>
    <h1>About Me</h1>
    @foreach ($abouts as $about)
        <article class="mb-3 border-bottom pb-3">
            <h3>
                Address : {{ $about->address }}
            </h3>
            <h4>
                No Hp : {{ $about->no_hp }}
            </h4>
            <h4>
                TTL : {{ $about->ttl }}
            </h4>
            <h6>
                Photos : {{ $about->photos }}
            </h6>
        </article>
    @endforeach
@endsection
