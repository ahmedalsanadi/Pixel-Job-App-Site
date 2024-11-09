<x-layout>
    <div
        class="max-w-3xl mx-auto my-12 px-6 py-8 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 rounded-lg shadow-lg text-gray-200 relative">


        <!-- Employer Logo and Job Title -->
        <div class="flex items-center space-x-4 mb-8 mt-8 md:mt-0">
            <div class="relative">
                <div
                    class="absolute inset-0 bg-blue-500/20 rounded-full filter blur-lg transition-all duration-300 opacity-0 hover:opacity-100">
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
            <h2 class="text-xl font-semibold text-blue-300 mb-3">
                <i class="fas fa-clipboard-list mr-2"></i> Job Description
            </h2>
            <p class="text-gray-300">{{ $job->description }}</p>
        </div>

        <!-- Job Details Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <h3 class="text-lg font-semibold text-blue-300">
                    <i class="fas fa-briefcase mr-2"></i> Job Type
                </h3>
                <p class="text-gray-400">{{ $job->job_type }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-blue-300">
                    <i class="fas fa-map-marker-alt mr-2"></i> Location
                </h3>
                <p class="text-gray-400">{{ $job->location }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-blue-300">
                    <i class="fas fa-dollar-sign mr-2"></i> Salary
                </h3>
                <p class="text-gray-400">{{ $job->salary }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-blue-300">
                    <i class="fas fa-calendar-alt mr-2"></i> Posted
                </h3>
                <p class="text-gray-400">{{ $job->created_at->format('M d, Y') }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-blue-300">
                    <i class="fas fa-clock mr-2"></i> Schedule
                </h3>
                <p class="text-gray-400">{{ $job->schedule }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-blue-300">
                    <i class="fas fa-star mr-2"></i> Featured
                </h3>
                <p class="text-gray-400">
                    {{ $job->featured ? 'Highlights unique benefits and opportunities.' : 'Does not have any special feature.' }}
                </p>
            </div>
        </div>

        <!-- Tags Section -->
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-blue-300 mb-2">
                <i class="fas fa-tags mr-2"></i> Tags
            </h3>
            <div class="flex flex-wrap gap-2">
                @foreach($job->tags as $tag)
                    <span
                        class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm font-semibold hover:bg-blue-500/40 transition duration-200">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        </div>

        <!-- Apply Button -->
        <div class="flex justify-end mt-12">
            @cannot('update', $job)
            <a href="{{ $job->apply_url }}" target="_blank"
                class="px-6 py-3 font-bold text-white bg-opacity-20 bg-gray-200 rounded-lg hover:bg-blue-600 transition-colors duration-300">
                Apply Now
            </a>
            @endcannot
        </div>
        <!-- Action Buttons (Edit, Delete) -->
        <div class="  flex justify-end  gap-2">
            @can('update', $job)
                <a href="{{ route('jobs.edit', $job->id) }}"
                    class="flex items-center px-4 py-2 text-white bg-opacity-20 bg-gray-200 rounded-lg hover:bg-blue-600 transition-colors duration-300">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
            @endcan
            @can('delete', $job)
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this job?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="flex items-center px-4 py-2 text-white bg-opacity-20 bg-gray-200 rounded-lg hover:bg-blue-600 transition-colors duration-300">
                        <i class="fas fa-trash-alt mr-2"></i> Delete
                    </button>
                </form>
            @endcan
        </div>
    </div>
</x-layout>