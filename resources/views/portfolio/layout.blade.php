<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', ($config && $config->site_name) ? $config->site_name : 'Portfolio')</title>
    <meta name="description" content="{{ ($config && $config->site_description) ? $config->site_description : '' }}">
    <meta name="keywords" content="{{ ($config && $config->site_keywords) ? $config->site_keywords : '' }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'arabic': ['Cairo', 'sans-serif'],
                        'english': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        body {
            font-family: {{ app()->getLocale() == 'ar' ? "'Cairo', sans-serif" : "'Inter', sans-serif" }};
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .dark .gradient-bg {
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .dark .card-hover:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .navbar-glass {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }
        
        .dark .navbar-glass {
            background: rgba(31, 41, 55, 0.9);
        }
        
        .skill-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            margin: 0.125rem;
            display: inline-block;
        }
        
        .dark .skill-badge {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
        }
        
        /* Dark mode transitions */
        * {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <!-- Navigation -->
    <nav class="navbar-glass fixed w-full top-0 z-50 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('portfolio.index') }}" class="flex items-center space-x-2">
                        @if($config && $config->logo)
                            <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo" class="h-8 w-8 rounded-full">
                        @endif
                        <span class="font-bold text-xl text-gray-800 dark:text-gray-200">{{ ($config && $config->site_name) ? $config->site_name : 'Portfolio' }}</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('portfolio.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                        {{ __('message.home') }}
                    </a>
                    <a href="{{ route('portfolio.about') }}" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                        {{ __('message.about') }}
                    </a>
                    <a href="{{ route('portfolio.experiences') }}" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                        {{ __('message.experiences') }}
                    </a>
                    <a href="{{ route('portfolio.projects') }}" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                        {{ __('message.projects') }}
                    </a>
                    <a href="{{ route('portfolio.skills') }}" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                        {{ __('message.skills') }}
                    </a>
                    <a href="{{ route('portfolio.contact') }}" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                        {{ __('message.contact') }}
                    </a>
                    
                    <!-- Language Switch -->
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('lang.switch', 'ar') }}" 
                           class="px-2 py-1 rounded {{ app()->getLocale() == 'ar' ? 'bg-purple-600 text-white' : 'text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400' }} transition-colors text-sm font-medium">
                            {{ __('message.arabic') }}
                        </a>
                        <span class="text-gray-400">|</span>
                        <a href="{{ route('lang.switch', 'en') }}" 
                           class="px-2 py-1 rounded {{ app()->getLocale() == 'en' ? 'bg-purple-600 text-white' : 'text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400' }} transition-colors text-sm font-medium">
                            {{ __('message.english') }}
                        </a>
                    </div>
                    
                    <!-- Dark Mode Toggle -->
                    <button onclick="toggleDarkMode()" class="p-2 rounded-lg text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                        <i class="fas fa-moon dark:hidden text-lg"></i>
                        <i class="fas fa-sun hidden dark:block text-lg"></i>
                    </button>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center space-x-3">
                    <!-- Dark Mode Toggle Mobile -->
                    <button onclick="toggleDarkMode()" class="p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                        <i class="fas fa-moon dark:hidden"></i>
                        <i class="fas fa-sun hidden dark:block"></i>
                    </button>
                    
                    <button id="mobile-menu-button" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('portfolio.index') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                    {{ __('message.home') }}
                </a>
                <a href="{{ route('portfolio.about') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                    {{ __('message.about') }}
                </a>
                <a href="{{ route('portfolio.experiences') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                    {{ __('message.experiences') }}
                </a>
                <a href="{{ route('portfolio.projects') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                    {{ __('message.projects') }}
                </a>
                <a href="{{ route('portfolio.skills') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                    {{ __('message.skills') }}
                </a>
                <a href="{{ route('portfolio.contact') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors font-medium">
                    {{ __('message.contact') }}
                </a>
                
                <!-- Language Switch Mobile -->
                <div class="px-3 py-2 border-t border-gray-200 dark:border-gray-600 mt-2">
                    <div class="flex space-x-4">
                        <a href="{{ route('lang.switch', 'ar') }}" 
                           class="px-3 py-1 rounded {{ app()->getLocale() == 'ar' ? 'bg-purple-600 text-white' : 'text-gray-600 dark:text-gray-400' }} transition-colors text-sm">
                            {{ __('message.arabic') }}
                        </a>
                        <a href="{{ route('lang.switch', 'en') }}" 
                           class="px-3 py-1 rounded {{ app()->getLocale() == 'en' ? 'bg-purple-600 text-white' : 'text-gray-600 dark:text-gray-400' }} transition-colors text-sm">
                            {{ __('message.english') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-black text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-white">{{ ($config && ($config->name_ar ?? $config->name_en)) ? (app()->getLocale() == 'ar' ? $config->name_ar : $config->name_en) : 'Portfolio' }}</h3>
                    <p class="text-gray-300 dark:text-gray-400 mb-4">{{ ($config && ($config->summary_ar ?? $config->summary_en)) ? (app()->getLocale() == 'ar' ? $config->summary_ar : $config->summary_en) : '' }}</p>
                    <div class="flex space-x-4">
                        @if($config && $config->facebook)
                            <a href="{{ $config->facebook }}" target="_blank" class="text-gray-300 dark:text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                        @endif
                        @if($config && $config->twitter)
                            <a href="{{ $config->twitter }}" target="_blank" class="text-gray-300 dark:text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                        @endif
                        @if($config && $config->linkedin)
                            <a href="{{ $config->linkedin }}" target="_blank" class="text-gray-300 dark:text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                        @endif
                        @if($config && $config->github)
                            <a href="{{ $config->github }}" target="_blank" class="text-gray-300 dark:text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                        @endif
                        @if($config && $config->instagram)
                            <a href="{{ $config->instagram }}" target="_blank" class="text-gray-300 dark:text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        @endif
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-4 text-white">{{ __('message.nav_quick_links') }}</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('portfolio.about') }}" class="text-gray-300 dark:text-gray-400 hover:text-white transition-colors">{{ __('message.about') }}</a></li>
                        <li><a href="{{ route('portfolio.projects') }}" class="text-gray-300 dark:text-gray-400 hover:text-white transition-colors">{{ __('message.projects') }}</a></li>
                        <li><a href="{{ route('portfolio.experiences') }}" class="text-gray-300 dark:text-gray-400 hover:text-white transition-colors">{{ __('message.experiences') }}</a></li>
                        <li><a href="{{ route('portfolio.contact') }}" class="text-gray-300 dark:text-gray-400 hover:text-white transition-colors">{{ __('message.contact') }}</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-4 text-white">{{ __('message.contact_info') }}</h3>
                    <ul class="space-y-2">
                        @if($config && $config->email)
                            <li class="flex items-center text-gray-300 dark:text-gray-400">
                                <i class="fas fa-envelope mr-2"></i>
                                {{ $config->email }}
                            </li>
                        @endif
                        @if($config && $config->phone)
                            <li class="flex items-center text-gray-300 dark:text-gray-400">
                                <i class="fas fa-phone mr-2"></i>
                                {{ $config->phone }}
                            </li>
                        @endif
                        @if($config && $config->address)
                            <li class="flex items-center text-gray-300 dark:text-gray-400">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                {{ $config->address }}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 dark:border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-300 dark:text-gray-400">{{ ($config && $config->copyright) ? $config->copyright : '© ' . date('Y') . ' All rights reserved.' }}</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
        
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
        
        // Dark Mode Toggle
        function toggleDarkMode() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('darkMode', 'false');
            } else {
                html.classList.add('dark');
                localStorage.setItem('darkMode', 'true');
            }
        }
        
        // Initialize dark mode from localStorage
        document.addEventListener('DOMContentLoaded', function() {
            const darkMode = localStorage.getItem('darkMode');
            if (darkMode === 'true' || (!darkMode && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
