{{-- @extends('layouts.app') --}}
@extends('layouts.hlink')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="glass-card col-md px-3 py-2 mt-3">
                    <h2 class="font-weight-bold">
                        <span class="text-orange-dark font-weight-bold">HERN</span>Link
                    </h2>
                    <hr class="glass-card-line">
                    @if($message ?? "" != "")
                        <h5>
                            {{ $message }}
                        </h5>
                        <ul class="ml-4">
                            @foreach ($errors as $error)
                                <li>
                                    {{ $error }}
                                </li>    
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-2"> 
                            <span class="font-weight-bold mr-2">Link:</span>  <span class="bg-secondary text-white crv-8 py-1 px-2">{{ $domain . $shortlink->code }}</span> <br>
                        </p>
                        <p class="mb-2">
                            <span class="font-weight-bold mr-2">Your link:</span> {{ $shortlink->link }}<br>
                        </p>
                        <p class="mb-2">
                            <span class="font-weight-bold mr-2">Created at:</span> {{ $shortlink->created_at}}
                        </p>
                    @endif
                    

                    
                    <a href="/" class="btn btn-primary ion-arrow-left-c mt-3"> <span class="ml-2">Go back</span> </a>
                </div>
            </div>
        </div>
    </div>
@endsection
