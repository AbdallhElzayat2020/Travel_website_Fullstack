@extends('frontend.layouts.master')

@section('content')
    <section class="py-12 border border-t-light-grey border-r-0 border-b-0 border-l-0">
        <div class="container">
            <nav class="font-medium text-grey" aria-label="Breadcrumb">
                <ul class="flex flex-wrap items-center gap-1 mb-2">
                    <li><a href="{{ route('home') }}" class="transition duration-200 hover:text-green-zomp">Home</a></li>
                    <span class="mx-1">/</span>
                    <li><span class="text-dark-grey">Faqs</span></li>
                </ul>
            </nav>
            <h1 class="text-black text-[40px] font-bold leading-[1.1em] mb-2">Faqs</h1>
            <p class="text-dark-grey">Find answers to your most common travel questions right here</p>
        </div>
    </section>

    <section class="mb-24">
        <div class="container">
            @if($faqs->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @php
                        $halfCount = ceil($faqs->count() / 2);
                        $firstColumn = $faqs->take($halfCount);
                        $secondColumn = $faqs->skip($halfCount);
                    @endphp

                    <div class="accordion-style bg-white rounded-lg border border-light-grey px-6">
                        @foreach($firstColumn as $faq)
                            <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                                <h4
                                    class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                                    {{ $faq->question }}
                                    <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                        data-width="20" data-height="20"></span>
                                </h4>
                                <p class="accordion-brief text-gray-600 mt-3">{{ $faq->answer }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="accordion-style bg-white rounded-lg border border-light-grey px-6">
                        @foreach($secondColumn as $faq)
                            <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                                <h4
                                    class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                                    {{ $faq->question }}
                                    <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                        data-width="20" data-height="20"></span>
                                </h4>
                                <p class="accordion-brief text-gray-600 mt-3">{{ $faq->answer }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-dark-grey text-lg">لا توجد أسئلة متاحة حالياً</p>
                </div>
            @endif
        </div>
    </section>
@endsection
