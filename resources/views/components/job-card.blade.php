<!-- resources/views/components/job-card.blade.php -->
@props(['job'])

<x-panel
    class="group flex flex-col text-center h-full relative overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 bg-gradient-to-br from-gray-900/50 via-gray-800/50 to-gray-900/50 border border-gray-700/50 hover:border-blue-500/30">
    <!-- Animated Background Effect -->
    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(59,130,246,0.1),transparent_50%)]">
        </div>
    </div>

    <!-- Top Section -->
    <div class="relative">
        <!-- Employer Name with Hover Effect -->
        <div
            class="self-start text-sm px-4 py-2 rounded-br-xl bg-gray-800/50 group-hover:bg-blue-900/20 transition-all duration-300 inline-block">
            <span
                class="bg-gradient-to-r from-gray-200 to-gray-200 group-hover:from-blue-400 group-hover:to-blue-200 bg-clip-text text-transparent transition-all duration-300">
                {{ $job->employer->name }}
            </span>
        </div>
    </div>

    <!-- Middle Section -->
    <div class="py-8 px-4 flex-grow relative z-10">
        <h3 class="text-xl font-bold mb-4 transition-all duration-300">
            <a href="{{ route('jobs.show', $job->id) }}" class="relative inline-block group-hover:text-blue-400">
                <span class="relative z-10">{{ $job->title }}</span>
                <span
                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500/50 group-hover:w-full transition-all duration-300"></span>
            </a>
        </h3>

        <!-- Salary with Icon -->
        <div
            class="flex items-center justify-center gap-2 text-sm text-gray-400 group-hover:text-gray-300 transition-colors duration-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
            {{ $job->salary }}
        </div>
    </div>

    <!-- Bottom Section -->
    <div
        class="relative mt-auto p-4 pt-6 border-t border-gray-700/50 group-hover:border-blue-500/30 transition-colors duration-300">
        <div class="flex justify-between items-center gap-4">
            <!-- Tags with Animation -->
            <div class="flex flex-wrap gap-1 justify-start">
                @foreach($job->tags as $tag)
                    <div class="transform hover:scale-105 transition-transform duration-200">
                        <x-tag :$tag size="small" />
                    </div>
                @endforeach
            </div>

            <!-- Logo with Glow Effect -->
            <div class="relative">
                <div
                    class="absolute inset-0 bg-blue-500/20 rounded-full filter blur-xl group-hover:blur-2xl transition-all duration-300 opacity-0 group-hover:opacity-100">
                </div>
                <div class="relative transform group-hover:scale-105 transition-transform duration-300">
                    <x-employer-logo :employer="$job->employer" :size="60" />
                </div>
            </div>
        </div>
    </div>

    <!-- Corner Accent -->
    <div
        class="absolute top-0 right-0 w-16 h-16 transform translate-x-8 -translate-y-8 group-hover:translate-x-6 group-hover:-translate-y-6 transition-transform duration-300">
        <div class="absolute inset-0 bg-blue-500/10 rotate-45"></div>
    </div>
</x-panel>