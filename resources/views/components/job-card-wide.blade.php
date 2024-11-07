<!-- resources/views/components/job-card-wide.blade.php -->
@props(['job'])

<dev class="group flex flex-col p-4 transition-all duration-300 hover:shadow-xl hover:scale-[1.01] sm:p-6 bg-gradient-to-r from-gray-900/50 to-gray-800/50 hover:from-gray-800/50 hover:to-gray-700/50 border border-gray-700/50 hover:border-gray-600/50 rounded-xl " >
    <div class="flex flex-col gap-4 md:flex-row md:gap-x-6">
        <!-- Logo Section -->
        <div class="flex justify-center sm:justify-start relative">
            <div class="relative">
                <div class="absolute inset-0 bg-blue-500/20 rounded-xl filter blur-xl group-hover:blur-2xl transition-all duration-300 opacity-0 group-hover:opacity-100"></div>
                <x-employer-logo :employer="$job->employer" class="transform group-hover:scale-105 transition-transform duration-300" />
            </div>
        </div>

        <!-- Content Section -->
        <div class="flex-1 flex flex-col md:flex-row md:justify-between gap-4">
            <!-- Company and Job Info -->
            <div class="text-center sm:text-left space-y-2">
                <a href="#"
                    class="inline-block text-sm text-gray-400 hover:text-blue-400  duration-300 relative group-hover:translate-x-1 transform transition-transform">
                    {{ $job->employer->name }}
                </a>

                <h3 class="font-bold text-xl group-hover:text-blue-400 transition-colors duration-300">
                    <a href="{{ $job->url }}" target="_blank" class="relative inline-block">
                        <span class="relative z-10">{{ $job->title }}</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </h3>

                <p class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors duration-300 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $job->salary }}
                </p>
            </div>

            <!-- Tags Section -->
            <div class="flex flex-wrap items-center justify-center sm:justify-start md:justify-end gap-2 transition-all duration-300">
                @foreach($job->tags as $tag)
                    <div class="transform hover:scale-105 transition-transform duration-200">
                        <x-tag :$tag />
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Hover Indicator -->
    <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 hidden md:block">
        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </div>
</dev>
