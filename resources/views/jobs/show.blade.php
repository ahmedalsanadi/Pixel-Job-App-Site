<!-- resources/views/jobs/show.blade.php -->
<x-layout>
    <div
        class="max-w-3xl mx-auto my-12 px-6 py-8 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 rounded-lg shadow-lg text-gray-200">

        <!-- Employer Logo and Job Title -->
        <div class="flex items-center space-x-4 mb-8">
            <div class="relative">
                <div
                    class="absolute inset-0 bg-blue-500/20 rounded-full filter blur-lg group-hover:blur-2xl transition-all duration-300 opacity-0 group-hover:opacity-100">
                </div>
                <x-employer-logo :employer="$job->employer" size="60" />
            </div>
            <div>
                <h1 class="text-3xl font-bold text-blue-400">{{ $job->title }}</h1>
                <p class="text-gray-400">{{ $job->employer->name }}</p>
            </div>
        </div>

        <!-- Job Description -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-blue-300 mb-3">Job Description</h2>
            <p class="text-gray-300">{{ $job->description }}</p>
        </div>

        <!-- Job Details Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <h3 class="text-lg font-semibold text-blue-300">Job Type</h3>
                <p class="text-gray-400">{{ $job->job_type }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-blue-300">Location</h3>
                <p class="text-gray-400">{{ $job->location }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-blue-300">Salary</h3>
                <p class="text-gray-400">{{ $job->salary }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-blue-300">Posted</h3>
                <p class="text-gray-400">{{ $job->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        <!-- Tags Section -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-blue-300 mb-2">Tags</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($job->tags as $tag)
                    <span
                        class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm font-semibold hover:bg-blue-500/40 transition duration-200">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        </div>

        <!-- Action Buttons (Apply, Edit, Delete) -->

        <div class="flex justify-center gap-4 mt-12">
            <!-- Edit Button (if authorized) -->
            @can('update', $job)
                <a href="{{ route('jobs.edit', $job->id) }}"
                    class="px-6 py-3 font-bold text-white bg-opacity-20 bg-gray-200   rounded-lg hover:bg-blue-600 transition-colors duration-300">
                    Edit
                </a>
            @endcan

            <!-- Delete Button (if authorized) -->
            @can('delete', $job)
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this job?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-6 py-3 font-bold text-white bg-opacity-20 bg-gray-200   rounded-lg hover:bg-blue-600 transition-colors duration-300">
                        Delete
                    </button>
                </form>
            @endcan

            <!-- Apply Button -->
            @cannot('update', $job)
            <a href="{{ $job->apply_url }}" target="_blank"
                class="px-6 py-3 font-bold bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-300">
                Apply Now
            </a>
            @endcannot


        </div>
    </div>
</x-layout>