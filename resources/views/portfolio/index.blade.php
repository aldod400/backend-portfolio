@extends('portfolio.layout')

@section('title', ($config->name_ar ?? $config->name_en ?? 'Portfolio') . ' - ' . ($config->job_title_ar ?? $config->job_title_en ?? ''))

@section('content')
<!-- Hero Section -->
<section class="gradient-bg min-h-screen flex items-center py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-white" data-aos="fade-right">
                <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    {{ app()->getLocale() == 'ar' ? ($config->name_ar ?? 'مرحباً') : ($config->name_en ?? 'Hello') }}
                </h1>
                <h2 class="text-2xl lg:text-3xl mb-6 text-purple-200">
                    {{ app()->getLocale() == 'ar' ? ($config->job_title_ar ?? '') : ($config->job_title_en ?? '') }}
                </h2>
                <p class="text-xl mb-8 text-purple-100 leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? ($config->summary_ar ?? '') : ($config->summary_en ?? '') }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('portfolio.projects') }}" class="btn-primary px-8 py-3 rounded-full font-semibold text-white hover:text-white transition-all">
                        {{ app()->getLocale() == 'ar' ? 'مشاهدة أعمالي' : 'View My Work' }}
                    </a>
                    <a href="{{ route('portfolio.contact') }}" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-purple-600 transition-all">
                        {{ app()->getLocale() == 'ar' ? 'تواصل معي' : 'Contact Me' }}
                    </a>
                </div>
            </div>
            
            <div class="text-center" data-aos="fade-left">
                @if($config->profile_image)
                    <div class="relative inline-block">
                        <img src="{{ asset('storage/' . $config->profile_image) }}" 
                             alt="{{ $config->name_ar ?? $config->name_en }}" 
                             class="w-80 h-80 rounded-full object-cover shadow-2xl border-8 border-white/20">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-purple-400/20 to-pink-400/20"></div>
                    </div>
                @else
                    <div class="w-80 h-80 rounded-full bg-white/20 flex items-center justify-center text-6xl text-white">
                        <i class="fas fa-user"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-briefcase text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $experiences->count() }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'سنوات خبرة' : 'Years Experience' }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-project-diagram text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $projects->count() }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مشروع مكتمل' : 'Completed Projects' }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-code text-2xl text-green-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $skills->count() }}+</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مهارة تقنية' : 'Technical Skills' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'أحدث مشاريعي' : 'Featured Projects' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'مجموعة من أفضل أعمالي التي تظهر مهاراتي وخبراتي' : 'A selection of my best work showcasing my skills and expertise' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects->take(6) as $project)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($project->images->first())
                        <img src="{{ asset('storage/' . $project->images->first()->image_path) }}" 
                             alt="{{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}" 
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-purple-400 to-blue-500 flex items-center justify-center">
                            <i class="fas fa-project-diagram text-4xl text-white"></i>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                        </h3>
                        <p class="text-gray-600 mb-4">
                            {{ Str::limit(app()->getLocale() == 'ar' ? $project->description_ar : $project->description_en, 100) }}
                        </p>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project->skills->take(3) as $skill)
                                <span class="skill-badge">
                                    {{ app()->getLocale() == 'ar' ? $skill->name_ar : $skill->name_en }}
                                </span>
                            @endforeach
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <a href="{{ route('portfolio.project', $project->id) }}" 
                               class="text-purple-600 hover:text-purple-800 font-semibold transition-colors">
                                {{ app()->getLocale() == 'ar' ? 'مشاهدة التفاصيل' : 'View Details' }}
                                <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} ml-1"></i>
                            </a>
                            
                            <div class="flex space-x-2">
                                @if($project->github_link)
                                    <a href="{{ $project->github_link }}" target="_blank" 
                                       class="text-gray-600 hover:text-gray-800 transition-colors">
                                        <i class="fab fa-github text-xl"></i>
                                    </a>
                                @endif
                                @if($project->website_link)
                                    <a href="{{ $project->website_link }}" target="_blank" 
                                       class="text-gray-600 hover:text-gray-800 transition-colors">
                                        <i class="fas fa-external-link-alt text-xl"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('portfolio.projects') }}" 
               class="btn-primary px-8 py-3 rounded-full font-semibold text-white hover:text-white transition-all inline-block">
                {{ app()->getLocale() == 'ar' ? 'مشاهدة جميع المشاريع' : 'View All Projects' }}
            </a>
        </div>
    </div>
</section>

<!-- Skills Overview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'مهاراتي التقنية' : 'My Skills' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'التقنيات والأدوات التي أستخدمها في تطوير المشاريع' : 'Technologies and tools I use to bring ideas to life' }}
            </p>
        </div>
        
        <div class="text-center" data-aos="fade-up" data-aos-delay="200">
            @foreach($skills as $skill)
                <span class="skill-badge m-1">
                    {{ app()->getLocale() == 'ar' ? $skill->name_ar : $skill->name_en }}
                </span>
            @endforeach
        </div>
        
        <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('portfolio.skills') }}" 
               class="text-purple-600 hover:text-purple-800 font-semibold transition-colors">
                {{ app()->getLocale() == 'ar' ? 'مشاهدة جميع المهارات' : 'View All Skills' }}
                <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} ml-1"></i>
            </a>
        </div>
    </div>
</section>

<!-- Recent Experience -->
@if($experiences->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'خبراتي المهنية' : 'My Experience' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'رحلتي المهنية والخبرات التي اكتسبتها' : 'My professional journey and the experience I\'ve gained' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($experiences->take(4) as $experience)
                <div class="bg-white rounded-xl shadow-lg p-6 card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="flex items-start space-x-4">
                        @if($experience->company_logo)
                            <img src="{{ asset('storage/' . $experience->company_logo) }}" 
                                 alt="{{ app()->getLocale() == 'ar' ? $experience->company_name_ar : $experience->company_name_en }}" 
                                 class="w-12 h-12 rounded-lg object-cover">
                        @else
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-building text-purple-600"></i>
                            </div>
                        @endif
                        
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 mb-1">
                                {{ app()->getLocale() == 'ar' ? $experience->title_ar : $experience->title_en }}
                            </h3>
                            <p class="text-purple-600 font-semibold mb-2">
                                {{ app()->getLocale() == 'ar' ? $experience->company_name_ar : $experience->company_name_en }}
                            </p>
                            <p class="text-gray-600 text-sm mb-2">
                                {{ $experience->start_date }} - {{ $experience->end_date ?? (app()->getLocale() == 'ar' ? 'حتى الآن' : 'Present') }}
                            </p>
                            <p class="text-gray-700">
                                {{ Str::limit(app()->getLocale() == 'ar' ? $experience->description_ar : $experience->description_en, 150) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('portfolio.experiences') }}" 
               class="btn-primary px-8 py-3 rounded-full font-semibold text-white hover:text-white transition-all inline-block">
                {{ app()->getLocale() == 'ar' ? 'مشاهدة جميع الخبرات' : 'View All Experience' }}
            </a>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-20 gradient-bg">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <h2 class="text-4xl font-bold text-white mb-6">
            {{ app()->getLocale() == 'ar' ? 'هل لديك مشروع في ذهنك؟' : 'Have a Project in Mind?' }}
        </h2>
        <p class="text-xl text-purple-100 mb-8 leading-relaxed">
            {{ app()->getLocale() == 'ar' ? 'دعنا نتعاون معاً لتحويل فكرتك إلى واقع رقمي مذهل' : 'Let\'s collaborate and bring your ideas to life with cutting-edge technology' }}
        </p>
        <a href="{{ route('portfolio.contact') }}" 
           class="bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all inline-block">
            {{ app()->getLocale() == 'ar' ? 'ابدأ مشروعك الآن' : 'Start Your Project' }}
        </a>
    </div>
</section>
@endsection
