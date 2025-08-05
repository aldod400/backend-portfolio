@extends('portfolio.layout')

@section('title', (app()->getLocale() == 'ar' ? 'الخبرات' : 'Experience') . ' - ' . ($config->site_name ?? 'Portfolio'))

@section('content')
<!-- Page Header -->
<section class="gradient-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="text-5xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'خبراتي المهنية' : 'My Experience' }}
            </h1>
            <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'رحلتي المهنية والخبرات التي اكتسبتها عبر السنين' : 'My professional journey and the experiences I\'ve gained over the years' }}
            </p>
        </div>
    </div>
</section>

<!-- Experience Timeline -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($experiences->count() > 0)
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-8 md:left-1/2 transform md:-translate-x-px h-full w-0.5 bg-purple-200"></div>
                
                @foreach($experiences as $experience)
                    <div class="relative flex items-center mb-12 {{ $loop->index % 2 == 0 ? 'md:flex-row-reverse' : '' }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 200 }}">
                        <!-- Timeline Dot -->
                        <div class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-purple-600 rounded-full border-4 border-white shadow-lg z-10"></div>
                        
                        <!-- Content Card -->
                        <div class="ml-20 md:ml-0 md:w-5/12 {{ $loop->index % 2 == 0 ? 'md:mr-auto md:pl-8' : 'md:ml-auto md:pr-8' }}">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                                <!-- Company Info -->
                                <div class="flex items-center mb-4">
                                    @if($experience->company_logo)
                                        <img src="{{ asset('storage/' . $experience->company_logo) }}" 
                                             alt="{{ app()->getLocale() == 'ar' ? $experience->company_name_ar : $experience->company_name_en }}" 
                                             class="w-12 h-12 rounded-lg object-cover mr-4">
                                    @else
                                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="fas fa-building text-purple-600"></i>
                                        </div>
                                    @endif
                                    
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">
                                            {{ app()->getLocale() == 'ar' ? $experience->title_ar : $experience->title_en }}
                                        </h3>
                                        <p class="text-purple-600 font-semibold">
                                            {{ app()->getLocale() == 'ar' ? $experience->company_name_ar : $experience->company_name_en }}
                                        </p>
                                    </div>
                                </div>
                                
                                <!-- Date and Location -->
                                <div class="flex flex-wrap items-center gap-4 mb-4 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2"></i>
                                        {{ $experience->start_date }} - {{ $experience->end_date ?? (app()->getLocale() == 'ar' ? 'حتى الآن' : 'Present') }}
                                    </div>
                                    @if($experience->location)
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2"></i>
                                            {{ $experience->location }}
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Description -->
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    {{ app()->getLocale() == 'ar' ? $experience->description_ar : $experience->description_en }}
                                </p>
                                
                                <!-- Related Projects -->
                                @php
                                    $experienceProjects = $experience->projects ?? collect();
                                @endphp
                                @if($experienceProjects->count() > 0)
                                    <div class="border-t pt-4">
                                        <h4 class="font-semibold text-gray-800 mb-2">
                                            {{ app()->getLocale() == 'ar' ? 'المشاريع ذات الصلة:' : 'Related Projects:' }}
                                        </h4>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($experienceProjects->take(3) as $project)
                                                <a href="{{ route('portfolio.project', $project->id) }}" 
                                                   class="text-sm bg-purple-100 text-purple-600 px-3 py-1 rounded-full hover:bg-purple-200 transition-colors">
                                                    {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                                                </a>
                                            @endforeach
                                            @if($experienceProjects->count() > 3)
                                                <span class="text-sm text-gray-500">
                                                    +{{ $experienceProjects->count() - 3 }} {{ app()->getLocale() == 'ar' ? 'أخرى' : 'more' }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Date Badge (Mobile) -->
                        <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 {{ $loop->index % 2 == 0 ? '-translate-y-12' : 'translate-y-12' }}">
                            <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ \Carbon\Carbon::parse($experience->start_date)->format('Y') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20" data-aos="fade-up">
                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-briefcase text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-4">
                    {{ app()->getLocale() == 'ar' ? 'لا توجد خبرات مضافة حالياً' : 'No Experience Added Yet' }}
                </h3>
                <p class="text-gray-500">
                    {{ app()->getLocale() == 'ar' ? 'سيتم إضافة الخبرات قريباً' : 'Experience will be added soon' }}
                </p>
            </div>
        @endif
    </div>
</section>

<!-- Skills Overview -->
@if($config->about_me_ar || $config->about_me_en)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl font-bold text-gray-800 mb-6">
                    {{ app()->getLocale() == 'ar' ? 'نبذة عن مسيرتي المهنية' : 'About My Professional Journey' }}
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    {{ app()->getLocale() == 'ar' ? $config->about_me_ar : $config->about_me_en }}
                </p>
                <a href="{{ route('portfolio.about') }}" 
                   class="btn-primary px-6 py-3 rounded-full font-semibold text-white hover:text-white transition-all inline-block">
                    {{ app()->getLocale() == 'ar' ? 'اقرأ المزيد عني' : 'Learn More About Me' }}
                </a>
            </div>
            
            <div data-aos="fade-left">
                @if($config->profile_image)
                    <img src="{{ asset('storage/' . $config->profile_image) }}" 
                         alt="{{ $config->name_ar ?? $config->name_en }}" 
                         class="w-full max-w-md mx-auto rounded-2xl shadow-2xl">
                @else
                    <div class="w-full max-w-md mx-auto h-96 bg-gray-200 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-user text-6xl text-gray-400"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- Experience Summary -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'ملخص الخبرات' : 'Experience Summary' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'إحصائيات سريعة عن مسيرتي المهنية' : 'Quick stats about my professional career' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-calendar-alt text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $experiences->count() }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'سنوات خبرة' : 'Years Experience' }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-2xl text-green-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $experiences->count() }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'شركة' : 'Companies' }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-project-diagram text-2xl text-purple-600"></i>
                </div>
                @php
                    $totalProjects = \App\Models\Project::whereNotNull('experience_id')->count();
                @endphp
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $totalProjects }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مشروع أثناء العمل' : 'Work Projects' }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-code text-2xl text-orange-600"></i>
                </div>
                @php
                    $totalSkills = \App\Models\Skill::count();
                @endphp
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $totalSkills }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مهارة تقنية' : 'Technical Skills' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 gradient-bg">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <h2 class="text-4xl font-bold text-white mb-6">
            {{ app()->getLocale() == 'ar' ? 'مهتم بالعمل معي؟' : 'Interested in Working Together?' }}
        </h2>
        <p class="text-xl text-purple-100 mb-8">
            {{ app()->getLocale() == 'ar' ? 'دعنا نناقش كيف يمكن لخبرتي أن تساعد في نجاح مشروعك' : 'Let\'s discuss how my experience can help make your project a success' }}
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('portfolio.contact') }}" 
               class="bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all">
                {{ app()->getLocale() == 'ar' ? 'تواصل معي' : 'Contact Me' }}
            </a>
            <a href="{{ route('portfolio.projects') }}" 
               class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-purple-600 transition-all">
                {{ app()->getLocale() == 'ar' ? 'مشاهدة أعمالي' : 'View My Work' }}
            </a>
        </div>
    </div>
</section>
@endsection
