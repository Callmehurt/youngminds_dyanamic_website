@extends('layouts.frontend')

@section('content')

    <section style="padding-top: 3rem;padding-bottom: 2rem">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div style="min-height: 70vh">
                        <h3 style="text-align: center;text-transform: capitalize">{!! $page->page_title !!}</h3>
                        <div style="margin-top: 1.5rem">
                            {!! $page->page_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection