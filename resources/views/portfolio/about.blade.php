@extends('portfolio.layout')

@section('title', (app()->getLocale() == 'ar' ? 'نبذة عني' : 'About Me') . ' - ' . ($config->site_name ?? 'Portfolio'))

@section('content')
<!-- Hero Section -->
<section class="gradient-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-white" data-aos="fade-right">
                <h1 class="text-5xl font-bold mb-6">
                    {{ app()->getLocale() == 'ar' ? 'نبذة عني' : 'About Me' }}
                </h1>
                <h2 class="text-2xl mb-6 text-purple-200">
                    {{ app()->getLocale() == 'ar' ? ($config->name_ar ?? '') : ($config->name_en ?? '') }}
                </h2>
                <p class="text-xl text-purple-100 leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? ($config->job_title_ar ?? '') : ($config->job_title_en ?? '') }}
                </p>
            </div>
            
            <div class="text-center" data-aos="fade-left">
                @if($config->profile_image)
                    <img src="{{ asset('storage/' . $config->profile_image) }}" 
                         alt="{{ $config->name_ar ?? $config->name_en }}" 
                         class="w-80 h-80 rounded-full object-cover shadow-2xl border-8 border-white/20 mx-auto">
                @else
                    <div class="w-80 h-80 rounded-full bg-white/20 flex items-center justify-center text-6xl text-white mx-auto">
                        <i class="fas fa-user"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-12" data-aos="fade-up">
            @if($config->about_me_ar || $config->about_me_en)
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                    {{ app()->getLocale() == 'ar' ? 'مرحباً، أنا' : 'Hello, I\'m' }} {{ app()->getLocale() == 'ar' ? ($config->name_ar ?? '') : ($config->name_en ?? '') }}
                </h2>
                
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e(app()->getLocale() == 'ar' ? $config->about_me_ar : $config->about_me_en)) !!}
                </div>
            @else
                <div class="text-center py-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        {{ app()->getLocale() == 'ar' ? 'مرحباً، أنا' : 'Hello, I\'m' }} {{ app()->getLocale() == 'ar' ? ($config->name_ar ?? '') : ($config->name_en ?? '') }}
                    </h2>
                    <p class="text-xl text-gray-600">
                        {{ app()->getLocale() == 'ar' ? 'سيتم إضافة المعلومات قريباً' : 'Information will be added soon' }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Quick Facts -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'حقائق سريعة' : 'Quick Facts' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'معلومات مفيدة عني وعن عملي' : 'Useful information about me and my work' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-briefcase text-2xl text-blue-600"></i>
                </div>
                @php
                    $totalExperience = \App\Models\Experience::count();
                @endphp
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $totalExperience }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'سنوات خبرة' : 'Years Experience' }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-project-diagram text-2xl text-purple-600"></i>
                </div>
                @php
                    $totalProjects = \App\Models\Project::count();
                @endphp
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $totalProjects }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مشروع مكتمل' : 'Completed Projects' }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-code text-2xl text-green-600"></i>
                </div>
                @php
                    $totalSkills = \App\Models\Skill::count();
                @endphp
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $totalSkills }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مهارة تقنية' : 'Technical Skills' }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-2xl text-orange-600"></i>
                </div>
                @php
                    $totalCompanies = \App\Models\Experience::distinct('company_name_en')->count();
                @endphp
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $totalCompanies }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'شركة' : 'Companies' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Details -->
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">
                    {{ app()->getLocale() == 'ar' ? 'معلومات التواصل' : 'Contact Information' }}
                </h2>
                
                <div class="space-y-6">
                    @if($config->email)
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email' }}</h3>
                                <a href="mailto:{{ $config->email }}" class="text-purple-600 hover:text-purple-800 transition-colors">
                                    {{ $config->email }}
                                </a>
                            </div>
                        </div>
                    @endif
                    
                    @if($config->phone)
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-phone text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ app()->getLocale() == 'ar' ? 'الهاتف' : 'Phone' }}</h3>
                                <a href="tel:{{ $config->phone }}" class="text-purple-600 hover:text-purple-800 transition-colors">
                                    {{ $config->phone }}
                                </a>
                            </div>
                        </div>
                    @endif
                    
                    @if($config->address)
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-purple-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ app()->getLocale() == 'ar' ? 'العنوان' : 'Location' }}</h3>
                                <p class="text-gray-600">{{ $config->address }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Social Links -->
                <div class="mt-8">
                    <h3 class="font-semibold text-gray-800 mb-4">{{ app()->getLocale() == 'ar' ? 'تابعني على' : 'Follow Me' }}</h3>
                    <div class="flex space-x-4">
                        @if($config->linkedin)
                            <a href="{{ $config->linkedin }}" target="_blank" 
                               class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-200 transition-colors">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        @endif
                        @if($config->github)
                            <a href="{{ $config->github }}" target="_blank" 
                               class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                <i class="fab fa-github"></i>
                            </a>
                        @endif
                        @if($config->twitter)
                            <a href="{{ $config->twitter }}" target="_blank" 
                               class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-200 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if($config->facebook)
                            <a href="{{ $config->facebook }}" target="_blank" 
                               class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-200 transition-colors">
                                <i class="fab fa-facebook"></i>
                            </a>
                        @endif
                        @if($config->instagram)
                            <a href="{{ $config->instagram }}" target="_blank" 
                               class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center text-pink-600 hover:bg-pink-200 transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- CV Download & Additional Info -->
            <div data-aos="fade-left">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">
                    {{ app()->getLocale() == 'ar' ? 'المزيد عني' : 'More About Me' }}
                </h2>
                
                <div class="bg-white rounded-xl shadow-lg p-6">
                    @if($config->cv)
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-file-pdf text-2xl text-purple-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">
                                {{ app()->getLocale() == 'ar' ? 'تحميل السيرة الذاتية' : 'Download Resume' }}
                            </h3>
                            <p class="text-gray-600 mb-4">
                                {{ app()->getLocale() == 'ar' ? 'احصل على نسخة كاملة من سيرتي الذاتية' : 'Get a complete copy of my resume' }}
                            </p>
                            <a href="{{ asset('storage/' . $config->cv) }}" target="_blank" 
                               class="btn-primary px-6 py-3 rounded-full font-semibold text-white hover:text-white transition-all inline-block">
                                <i class="fas fa-download mr-2"></i>
                                {{ app()->getLocale() == 'ar' ? 'تحميل CV' : 'Download CV' }}
                            </a>
                        </div>
                    @endif
                    
                    <div class="border-t pt-6">
                        <h4 class="font-semibold text-gray-800 mb-4">
                            {{ app()->getLocale() == 'ar' ? 'روابط مفيدة' : 'Useful Links' }}
                        </h4>
                        <div class="space-y-3">
                            <a href="{{ route('portfolio.projects') }}" 
                               class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <span class="text-gray-700">{{ app()->getLocale() == 'ar' ? 'مشاهدة مشاريعي' : 'View My Projects' }}</span>
                                <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} text-purple-600"></i>
                            </a>
                            <a href="{{ route('portfolio.experiences') }}" 
                               class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <span class="text-gray-700">{{ app()->getLocale() == 'ar' ? 'خبراتي المهنية' : 'My Experience' }}</span>
                                <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} text-purple-600"></i>
                            </a>
                            <a href="{{ route('portfolio.skills') }}" 
                               class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <span class="text-gray-700">{{ app()->getLocale() == 'ar' ? 'مهاراتي التقنية' : 'My Skills' }}</span>
                                <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} text-purple-600"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 gradient-bg">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <h2 class="text-4xl font-bold text-white mb-6">
            {{ app()->getLocale() == 'ar' ? 'مستعد للتعاون؟' : 'Ready to Collaborate?' }}
        </h2>
        <p class="text-xl text-purple-100 mb-8">
            {{ app()->getLocale() == 'ar' ? 'أحب العمل على مشاريع جديدة ومثيرة. دعنا نتحدث عن فكرتك!' : 'I love working on new and exciting projects. Let\'s discuss your idea!' }}
        </p>
        <a href="{{ route('portfolio.contact') }}" 
           class="bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all inline-block">
            {{ app()->getLocale() == 'ar' ? 'تواصل معي الآن' : 'Contact Me Now' }}
        </a>
    </div>
</section>
@endsection
