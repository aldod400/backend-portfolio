@extends('portfolio.layout')

@section('title', (app()->getLocale() == 'ar' ? 'تواصل معي' : 'Contact Me') . ' - ' . ($config->site_name ?? 'Portfolio'))

@section('content')
<!-- Page Header -->
<section class="gradient-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="text-5xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'تواصل معي' : 'Contact Me' }}
            </h1>
            <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'أحب التحدث عن المشاريع الجديدة والفرص المثيرة. دعنا نتواصل!' : 'I love talking about new projects and exciting opportunities. Let\'s get in touch!' }}
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">
                    {{ app()->getLocale() == 'ar' ? 'معلومات التواصل' : 'Get In Touch' }}
                </h2>
                
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? 'سواء كان لديك مشروع جديد، فرصة عمل، أو مجرد تريد أن نتحدث، أنا هنا وجاهز للحديث. لا تتردد في التواصل معي!' : 'Whether you have a new project, job opportunity, or just want to chat, I\'m here and ready to talk. Don\'t hesitate to reach out!' }}
                </p>
                
                <div class="space-y-6">
                    @if($config->email)
                        <div class="flex items-center group">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-blue-200 transition-colors">
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
                        <div class="flex items-center group">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-green-200 transition-colors">
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
                    
                    @if($config->whatsapp)
                        <div class="flex items-center group">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-green-200 transition-colors">
                                <i class="fab fa-whatsapp text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ app()->getLocale() == 'ar' ? 'واتساب' : 'WhatsApp' }}</h3>
                                <a href="{{ $config->whatsapp }}" target="_blank" class="text-purple-600 hover:text-purple-800 transition-colors">
                                    {{ app()->getLocale() == 'ar' ? 'مراسلة واتساب' : 'Send WhatsApp Message' }}
                                </a>
                            </div>
                        </div>
                    @endif
                    
                    @if($config->address)
                        <div class="flex items-center group">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-purple-200 transition-colors">
                                <i class="fas fa-map-marker-alt text-purple-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ app()->getLocale() == 'ar' ? 'العنوان' : 'Location' }}</h3>
                                <p class="text-gray-600">{{ $config->address }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Social Media Links -->
                <div class="mt-8">
                    <h3 class="font-semibold text-gray-800 mb-4">{{ app()->getLocale() == 'ar' ? 'تابعني على' : 'Follow Me On' }}</h3>
                    <div class="flex space-x-4">
                        @if($config->linkedin)
                            <a href="{{ $config->linkedin }}" target="_blank" 
                               class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-200 transition-colors card-hover">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                        @endif
                        @if($config->github)
                            <a href="{{ $config->github }}" target="_blank" 
                               class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors card-hover">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                        @endif
                        @if($config->twitter)
                            <a href="{{ $config->twitter }}" target="_blank" 
                               class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-200 transition-colors card-hover">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                        @endif
                        @if($config->facebook)
                            <a href="{{ $config->facebook }}" target="_blank" 
                               class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-200 transition-colors card-hover">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                        @endif
                        @if($config->instagram)
                            <a href="{{ $config->instagram }}" target="_blank" 
                               class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center text-pink-600 hover:bg-pink-200 transition-colors card-hover">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        @endif
                        @if($config->youtube)
                            <a href="{{ $config->youtube }}" target="_blank" 
                               class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center text-red-600 hover:bg-red-200 transition-colors card-hover">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div data-aos="fade-left">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">
                        {{ app()->getLocale() == 'ar' ? 'أرسل رسالة' : 'Send a Message' }}
                    </h2>
                    
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ app()->getLocale() == 'ar' ? 'الاسم' : 'Name' }} *
                                </label>
                                <input type="text" id="name" name="name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                       placeholder="{{ app()->getLocale() == 'ar' ? 'اسمك الكامل' : 'Your full name' }}">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email' }} *
                                </label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                       placeholder="{{ app()->getLocale() == 'ar' ? 'your@email.com' : 'your@email.com' }}">
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                {{ app()->getLocale() == 'ar' ? 'الموضوع' : 'Subject' }} *
                            </label>
                            <input type="text" id="subject" name="subject" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="{{ app()->getLocale() == 'ar' ? 'موضوع الرسالة' : 'Message subject' }}">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                {{ app()->getLocale() == 'ar' ? 'الرسالة' : 'Message' }} *
                            </label>
                            <textarea id="message" name="message" rows="5" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-vertical"
                                      placeholder="{{ app()->getLocale() == 'ar' ? 'اكتب رسالتك هنا...' : 'Write your message here...' }}"></textarea>
                        </div>
                        
                        <div>
                            <button type="submit" 
                                    class="w-full btn-primary px-6 py-3 rounded-lg font-semibold text-white hover:text-white transition-all">
                                {{ app()->getLocale() == 'ar' ? 'إرسال الرسالة' : 'Send Message' }}
                                <i class="fas fa-paper-plane ml-2"></i>
                            </button>
                        </div>
                    </form>
                    
                    <div class="mt-6 text-center text-sm text-gray-500">
                        {{ app()->getLocale() == 'ar' ? 'أو يمكنك التواصل معي مباشرة عبر البريد الإلكتروني أو الهاتف' : 'Or you can contact me directly via email or phone' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Contact Options -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'طرق أخرى للتواصل' : 'Other Ways to Connect' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'اختر الطريقة التي تناسبك أكثر للتواصل معي' : 'Choose the method that works best for you to connect with me' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @if($config->email)
                <div class="text-center card-hover bg-blue-50 rounded-xl p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        {{ app()->getLocale() == 'ar' ? 'راسلني' : 'Email Me' }}
                    </h3>
                    <p class="text-gray-600 mb-4">
                        {{ app()->getLocale() == 'ar' ? 'للمشاريع الجدية والاستفسارات التفصيلية' : 'For serious projects and detailed inquiries' }}
                    </p>
                    <a href="mailto:{{ $config->email }}" 
                       class="btn-primary px-6 py-2 rounded-full font-semibold text-white hover:text-white transition-all inline-block">
                        {{ app()->getLocale() == 'ar' ? 'إرسال ايميل' : 'Send Email' }}
                    </a>
                </div>
            @endif
            
            @if($config->phone)
                <div class="text-center card-hover bg-green-50 rounded-xl p-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        {{ app()->getLocale() == 'ar' ? 'اتصل بي' : 'Call Me' }}
                    </h3>
                    <p class="text-gray-600 mb-4">
                        {{ app()->getLocale() == 'ar' ? 'للنقاشات السريعة والعاجلة' : 'For quick discussions and urgent matters' }}
                    </p>
                    <a href="tel:{{ $config->phone }}" 
                       class="btn-primary px-6 py-2 rounded-full font-semibold text-white hover:text-white transition-all inline-block">
                        {{ app()->getLocale() == 'ar' ? 'اتصال هاتفي' : 'Call Now' }}
                    </a>
                </div>
            @endif
            
            @if($config->linkedin)
                <div class="text-center card-hover bg-purple-50 rounded-xl p-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-linkedin text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        {{ app()->getLocale() == 'ar' ? 'لينكد إن' : 'LinkedIn' }}
                    </h3>
                    <p class="text-gray-600 mb-4">
                        {{ app()->getLocale() == 'ar' ? 'للتواصل المهني وفرص العمل' : 'For professional networking and opportunities' }}
                    </p>
                    <a href="{{ $config->linkedin }}" target="_blank" 
                       class="btn-primary px-6 py-2 rounded-full font-semibold text-white hover:text-white transition-all inline-block">
                        {{ app()->getLocale() == 'ar' ? 'تواصل معي' : 'Connect' }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Availability Status -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="flex items-center justify-center mb-4">
                <div class="w-4 h-4 bg-green-500 rounded-full mr-3 animate-pulse"></div>
                <span class="text-green-600 font-semibold">
                    {{ app()->getLocale() == 'ar' ? 'متاح للعمل' : 'Available for Work' }}
                </span>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                {{ app()->getLocale() == 'ar' ? 'مستعد لمشروعك القادم' : 'Ready for Your Next Project' }}
            </h2>
            <p class="text-lg text-gray-600 mb-6">
                {{ app()->getLocale() == 'ar' ? 'أبحث عن مشاريع مثيرة وتحديات جديدة. دعنا نبني شيئاً رائعاً معاً!' : 'I\'m looking for exciting projects and new challenges. Let\'s build something amazing together!' }}
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                @if($config->cv)
                    <a href="{{ asset('storage/' . $config->cv) }}" target="_blank" 
                       class="bg-purple-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-purple-700 transition-all">
                        <i class="fas fa-download mr-2"></i>
                        {{ app()->getLocale() == 'ar' ? 'تحميل السيرة الذاتية' : 'Download Resume' }}
                    </a>
                @endif
                <a href="{{ route('portfolio.projects') }}" 
                   class="border-2 border-purple-600 text-purple-600 px-6 py-3 rounded-full font-semibold hover:bg-purple-600 hover:text-white transition-all">
                    {{ app()->getLocale() == 'ar' ? 'مشاهدة أعمالي' : 'View My Work' }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
