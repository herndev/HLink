{{-- @extends('layouts.app') --}}
@extends('layouts.hlink')

@section('content')
    <div class="container">
        <div class="row glass-card justify-content-center mx-1">
            <div class="col-md-6 px-0 bg-white">
                <div class="px-3 py-2 mb-3">
                    <h3 class="mt-3">{{ $header }}</h3>
                    <hr class="glass-card-line">
                    <div class="px-3">
                        {{ $message }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md px-3 py-2 mt-3">
                    <h2 class="font-weight-bold">
                        <span class="text-orange-dark font-weight-bold">H</span>Link
                    </h2>
                    <hr class="glass-card-line">
                    <p class="p-3 bg-white crv-8">
                        <a href="#" class="font-weight-bold">HLink</a> is a file hosting and short link solution
                        personally developed by <span class="font-weight-bold text-dark">Hernie Jabien</span>.
                        This project is <span class="font-weight-bold">100% FREE</span> with maximum upload of <span
                            class="font-weight-bold">2T per file</span>.<br><br>
                        <img src="https://img.shields.io/badge/Github-Open%20source-lightgrey" alt="">
                        <img src="https://img.shields.io/badge/Laravel%20-8.22.1-red" alt="">
                        <img src="https://img.shields.io/badge/-FREE-yellow" alt="">
                    </p>
                    <p class="py-2 px-3 bg-white crv-8">
                        You can contact me if you have projects to work with.
                    </p>
                    <div class="mt-2 social-icons text-center">
                        <a href="#" class="linkstyle-none fa fa-twitter"></a>
                        <a href="#" class="linkstyle-none fa fa-github"></a>
                        <a href="#" class="linkstyle-none fa fa-facebook"></a>
                        <a href="#" class="linkstyle-none fa fa-instagram"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
