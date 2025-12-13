@extends('frontend.layouts.master')

@section('content')
    <section class="py-12 border border-t-light-grey border-r-0 border-b-0 border-l-0">
        <div class="container">
            <nav class="font-medium text-grey" aria-label="Breadcrumb">
                <ul class="flex flex-wrap items-center gap-1 mb-2">
                    <li><a href="index.html" class="transition duration-200 hover:text-green-zomp">Home</a></li><span
                        class="mx-1">/</span>
                    <li><span class="text-dark-grey">Faqs</span></li>
                </ul>
            </nav>
            <h1 class="text-black text-[40px] font-bold leading-[1.1em] mb-2">Faqs</h1>
            <p class="text-dark-grey">Find answers to your most common travel questions right here</p>
        </div>
    </section>

    <section class="mb-24">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="accordion-style bg-white rounded-lg border border-light-grey px-6">
                    <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                        <h4
                            class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                            Surfboards and Wetsuits
                            <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                data-width="20" data-height="20"></span>
                        </h4>
                        <p class="accordion-brief text-gray-600 mt-3">It is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at its layout. The point of using
                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.</p>
                    </div>

                    <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                        <h4
                            class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                            Licensed and Permitted Instructors
                            <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                data-width="20" data-height="20"></span>
                        </h4>
                        <p class="accordion-brief text-gray-600 mt-3">It is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at its layout. The point of using
                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.</p>
                    </div>

                    <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                        <h4
                            class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                            Water Safety, First Aid & CPR Certified
                            <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                data-width="20" data-height="20"></span>
                        </h4>
                        <p class="accordion-brief text-gray-600 mt-3">It is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at its layout. The point of using
                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.</p>
                    </div>

                    <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                        <h4
                            class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                            Group and Private Lessons
                            <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                data-width="20" data-height="20"></span>
                        </h4>
                        <p class="accordion-brief text-gray-600 mt-3">It is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at its layout. The point of using
                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.</p>
                    </div>
                </div>

                <div class="accordion-style bg-white rounded-lg border border-light-grey px-6">
                    <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                        <h4
                            class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                            Beginner to Advanced Levels
                            <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                data-width="20" data-height="20"></span>
                        </h4>
                        <p class="accordion-brief text-gray-600 mt-3">It is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at its layout. The point of using
                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.</p>
                    </div>

                    <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                        <h4
                            class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                            Flexible Schedule Options
                            <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                data-width="20" data-height="20"></span>
                        </h4>
                        <p class="accordion-brief text-gray-600 mt-3">It is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at its layout. The point of using
                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.</p>
                    </div>

                    <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                        <h4
                            class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                            Weather Conditions & Cancellation Policy
                            <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                data-width="20" data-height="20"></span>
                        </h4>
                        <p class="accordion-brief text-gray-600 mt-3">It is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at its layout. The point of using
                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.</p>
                    </div>

                    <div class="accordion-items border-b border-gray-200 py-6 last:border-none">
                        <h4
                            class="accordion-title text-black text-xl font-bold flex items-center gap-4 justify-between cursor-pointer [&.active]:text-green-zomp">
                            Pricing & Package Deals
                            <span class="iconify text-black transition-all duration-200" data-icon="meteor-icons:angle-down"
                                data-width="20" data-height="20"></span>
                        </h4>
                        <p class="accordion-brief text-gray-600 mt-3">It is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at its layout. The point of using
                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
