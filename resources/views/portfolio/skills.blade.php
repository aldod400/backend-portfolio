@extends('portfolio.layout')

@section('title', (app()->getLocale() == 'ar' ? 'المهارات' : 'Skills') . ' - ' . ($config->site_name ?? 'Portfolio'))

@section('content')
<!-- Page Header -->
<section class="gradient-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="text-5xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'مهاراتي التقنية' : 'My Skills' }}
            </h1>
            <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'التقنيات والأدوات التي أتقنها واستخدمها في تطوير المشاريع' : 'Technologies and tools I master and use to develop projects' }}
            </p>
        </div>
    </div>
</section>

<!-- All Skills -->
<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($skills->count() > 0)
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-4">
                    {{ app()->getLocale() == 'ar' ? 'جميع المهارات' : 'All Skills' }}
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    {{ app()->getLocale() == 'ar' ? 'مجموعة شاملة من التقنيات التي أعمل بها' : 'A comprehensive set of technologies I work with' }}
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($skills as $skill)
                    <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-code text-2xl text-white"></i>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-3">
                            {{ app()->getLocale() == 'ar' ? $skill->name_ar : $skill->name_en }}
                        </h3>
                        
                        @if($skill->projects->count() > 0)
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                {{ app()->getLocale() == 'ar' ? 'استخدمت في' : 'Used in' }} 
                                {{ $skill->projects->count() }} 
                                {{ app()->getLocale() == 'ar' ? ($skill->projects->count() == 1 ? 'مشروع' : 'مشاريع') : ($skill->projects->count() == 1 ? 'project' : 'projects') }}
                            </p>
                            
                            <!-- Related Projects -->
                            <div class="space-y-2">
                                @foreach($skill->projects->take(3) as $project)
                                    <a href="{{ route('portfolio.project', $project->id) }}" 
                                       class="block text-sm bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 px-3 py-2 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/50 transition-colors">
                                        {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                                    </a>
                                @endforeach
                                
                                @if($skill->projects->count() > 3)
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                        +{{ $skill->projects->count() - 3 }} {{ app()->getLocale() == 'ar' ? 'مشاريع أخرى' : 'more projects' }}
                                    </p>
                                @endif
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400">
                                {{ app()->getLocale() == 'ar' ? 'لم يتم استخدامها في مشاريع بعد' : 'Not used in projects yet' }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20" data-aos="fade-up">
                <div class="w-24 h-24 bg-gray-200 dark:bg-gray-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-code text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 dark:text-gray-400 mb-4">
                    {{ app()->getLocale() == 'ar' ? 'لا توجد مهارات مضافة حالياً' : 'No Skills Added Yet' }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400">
                    {{ app()->getLocale() == 'ar' ? 'سيتم إضافة المهارات قريباً' : 'Skills will be added soon' }}
                </p>
            </div>
        @endif
    </div>
</section>

<!-- Skills by Project Usage -->
@if($skills->where('projects')->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'المهارات الأكثر استخداماً' : 'Most Used Skills' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'التقنيات التي أستخدمها بكثرة في مشاريعي' : 'Technologies I frequently use in my projects' }}
            </p>
        </div>
        
        @php
            $popularSkills = $skills->filter(function($skill) {
                return $skill->projects->count() > 0;
            })->sortByDesc(function($skill) {
                return $skill->projects->count();
            })->take(6);
        @endphp
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($popularSkills as $skill)
                <div class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-xl p-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-blue-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">
                                {{ app()->getLocale() == 'ar' ? $skill->name_ar : $skill->name_en }}
                            </h3>
                            <p class="text-purple-600 font-semibold">
                                {{ $skill->projects->count() }} {{ app()->getLocale() == 'ar' ? 'مشاريع' : 'projects' }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        @foreach($skill->projects->take(4) as $project)
                            <div class="flex items-center justify-between bg-white rounded-lg p-3">
                                <span class="text-gray-700 font-medium">
                                    {{ Str::limit(app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en, 25) }}
                                </span>
                                <a href="{{ route('portfolio.project', $project->id) }}" 
                                   class="text-purple-600 hover:text-purple-800 transition-colors">
                                    <i class="fas fa-external-link-alt text-sm"></i>
                                </a>
                            </div>
                        @endforeach
                        
                        @if($skill->projects->count() > 4)
                            <p class="text-center text-gray-500 text-sm mt-2">
                                +{{ $skill->projects->count() - 4 }} {{ app()->getLocale() == 'ar' ? 'أخرى' : 'more' }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Independent Skills -->
@php
    $independentSkills = $skills->filter(function($skill) {
        return $skill->projects->count() == 0;
    });
@endphp

@if($independentSkills->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'مهارات إضافية' : 'Additional Skills' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'مهارات أخرى أتقنها ولم تظهر في المشاريع المعروضة' : 'Other skills I master that haven\'t been showcased in displayed projects' }}
            </p>
        </div>
        
        <div class="text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="flex flex-wrap justify-center gap-3">
                @foreach($independentSkills as $skill)
                    <span class="skill-badge text-lg">
                        {{ app()->getLocale() == 'ar' ? $skill->name_ar : $skill->name_en }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<!-- Skills Statistics -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'إحصائيات المهارات' : 'Skills Statistics' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'نظرة سريعة على توزيع مهاراتي واستخدامها' : 'A quick overview of my skills distribution and usage' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-layer-group text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $skills->count() }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مهارة إجمالية' : 'Total Skills' }}</p>
            </div>
            
            <div class="text-center bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-8" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-project-diagram text-2xl text-purple-600"></i>
                </div>
                @php
                    $usedSkills = $skills->filter(function($skill) {
                        return $skill->projects->count() > 0;
                    })->count();
                @endphp
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $usedSkills }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مستخدمة في مشاريع' : 'Used in Projects' }}</p>
            </div>
            
            <div class="text-center bg-gradient-to-br from-green-50 to-blue-50 rounded-xl p-8" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-2xl text-green-600"></i>
                </div>
                @php
                    $avgProjectsPerSkill = $usedSkills > 0 ? round($skills->sum(function($skill) {
                        return $skill->projects->count();
                    }) / $usedSkills, 1) : 0;
                @endphp
                <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ $avgProjectsPerSkill }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'متوسط المشاريع لكل مهارة' : 'Avg Projects per Skill' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 gradient-bg">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <h2 class="text-4xl font-bold text-white mb-6">
            {{ app()->getLocale() == 'ar' ? 'مهتم بمهاراتي؟' : 'Interested in My Skills?' }}
        </h2>
        <p class="text-xl text-purple-100 mb-8">
            {{ app()->getLocale() == 'ar' ? 'دعنا نناقش كيف يمكن استخدام هذه المهارات في مشروعك القادم' : 'Let\'s discuss how these skills can be utilized in your next project' }}
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('portfolio.projects') }}" 
               class="bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all">
                {{ app()->getLocale() == 'ar' ? 'مشاهدة أعمالي' : 'View My Work' }}
            </a>
            <a href="{{ route('portfolio.contact') }}" 
               class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-purple-600 transition-all">
                {{ app()->getLocale() == 'ar' ? 'تواصل معي' : 'Contact Me' }}
            </a>
        </div>
    </div>
</section>
@endsection
