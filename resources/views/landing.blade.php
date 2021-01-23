{{-- @extends('layouts.app') --}}
@extends('layouts.hlink')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="glass-card col-md px-3 py-2 mt-3">
                    <h2 class="font-weight-bold">File hosting</h2>
                    <hr class="glass-card-line">
                    <form action="uploadfile" method="post" id="fh_form" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group files col-md overflow-hidden p-0">
                            <label for="file_to_upload" class="text-primary2 font-weight-bold">Upload your file here</label>
                            <input type="file" class="form-control" required name="file_to_upload" id="file_to_upload">
                        </div>
                        <button type="button" class="btn btn-info btn-block ion-arrow-down-b" id="fh-advance-toggler"
                            data-toggle="collapse" data-target="#fh-advance"> <span class="ml-3">Advance
                                Option</span></button>
                        <div class="collapse mt-2" id="fh-advance">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-android-lock" id="basic-addon3"></span>
                                </div>
                                <input type="text" class="form-control" id="fh_key" name="fh_key"
                                    placeholder="Key (Optional)" aria-describedby="basic-addon3">
                            </div>
                            <textarea name="message" id="message" rows="5" class="form-control mt-2"
                                placeholder="Message (Optional)"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-2">Generate link</button>

                        {{-- <div class="progress mt-3">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div> --}}
                    </form>
                    <div class="loading-anim w-100 text-center mt-3 display-none">
                        <div class="svg-container mx-auto">
                            <svg version="1.1" id="L6" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
                                enable-background="new 0 0 100 100" xml:space="preserve">
                                <rect fill="none" stroke="#fff" stroke-width="4" x="25" y="25" width="50" height="50">
                                    <animateTransform attributeName="transform" dur="0.5s" from="0 50 50" to="180 50 50"
                                        type="rotate" id="strokeBox" attributeType="XML" begin="rectBox.end" />
                                </rect>
                                <rect x="27" y="27" fill="#fff" width="46" height="50">
                                    <animate attributeName="height" dur="1.3s" attributeType="XML" from="50" to="0"
                                        id="rectBox" fill="freeze" begin="0s;strokeBox.end" />
                                </rect>
                            </svg>
                        </div>
                        <h4 class="mt-2">Uploading file..</h4>
                    </div>
                    <div id="fh_response" class="display-none">
                        <label class="text-primary2 font-weight-bold">File Has Been Uploaded Successfully !!</label>
                        <hr>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-android-folder" id="basic-addon4"></span>
                            </div>
                            <input type="text" class="form-control" disabled id="res_filename" name="res_filename"
                                placeholder="File name" aria-describedby="basic-addon4">
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-link"></span>
                            </div>
                            <input type="text" class="form-control" disabled id="res_link" name="res_link"
                                placeholder="Link" aria-describedby="basic-addon5">
                            <div class="input-group-append">
                                <button class="btn btn-success btn-block" onclick="copyLink()">Copy</button>
                            </div>
                        </div>

                        <div class="input-group mb-2" id="res_key_container">
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-key" id="basic-addon6"></span>
                            </div>
                            <input type="text" class="form-control" disabled id="res_key" name="res_key" placeholder="Key"
                                aria-describedby="basic-addon6">
                        </div>
                        <div id="res_message_container">
                            <textarea name="res_message" class="form-control mb-3" disabled id="res_message"
                                placeholder="Message" rows="5"></textarea>
                        </div>

                        <button type="button" class="btn btn-info btn-block ion-arrow-down-b mt-4 mb-2" id="fh-del-link-toggler"
                            data-toggle="collapse" data-target="#del-link"> <span class="ml-3">Show delete
                                link</span></button>
                        <div class="collapse" id="del-link">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-link"></span>
                                </div>
                                <input type="text" class="form-control" disabled id="res_del_link" name="res_del_link"
                                    placeholder="Delete link" aria-describedby="basic-addon8">
                                <div class="input-group-append">
                                    <button class="btn btn-success btn-block" onclick="copyLink('del')">Copy</button>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success btn-block mb-2" onClick="location.reload()">Upload another
                            file</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="glass-card col-md px-3 py-2 mt-3">
                    <h2 class="font-weight-bold">Short link</h2>
                    <hr class="glass-card-line">
                    <form action="generatelink" method="post" class="form-group" id="sl_form" enctype="multipart/form-data">
                        @csrf
                        <label for="link" class="text-primary2 font-weight-bold">Put your link here</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">http://</span>
                            </div>
                            <input type="text" class="form-control" id="link" name="link" required onblur="checkURL(this)"
                                placeholder="Your link" aria-describedby="basic-addon3">
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-3">Generate short link</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="glass-card col-md px-3 py-2 mt-3">
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
