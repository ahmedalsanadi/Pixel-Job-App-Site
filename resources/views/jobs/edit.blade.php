<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="PUT" action="/jobs/{{ $job->id }}">

        <!-- Title -->
        <x-forms.input label="Title" name="title" value="{{ old('title', $job->title) }}" placeholder="CEO" />

        <!-- Description -->
        <x-forms.textarea label="Description" name="description" placeholder="Provide a detailed description of the job"
            :value="$job->description">
        </x-forms.textarea>


        <!-- Salary -->
        <x-forms.input label="Salary" name="salary" value="{{ old('salary', $job->salary) }}"
            placeholder="$90,000 USD" />

        <!-- Location -->
        <x-forms.input label="Location" name="location" value="{{ old('location', $job->location) }}"
            placeholder="Winter Park, Florida" />

        <!-- Job Type Dropdown -->
        <x-forms.select label="Job Type" name="job_type">
            <option {{ $job->job_type === 'Engineering' ? 'selected' : '' }}>Engineering</option>
            <option {{ $job->job_type === 'Marketing' ? 'selected' : '' }}>Marketing</option>
            <option {{ $job->job_type === 'Finance' ? 'selected' : '' }}>Finance</option>
            <option {{ $job->job_type === 'Design' ? 'selected' : '' }}>Design</option>
            <option {{ $job->job_type === 'Operations' ? 'selected' : '' }}>Operations</option>
            <option {{ $job->job_type === 'Others' ? 'selected' : '' }}>Others</option>
        </x-forms.select>

        <!-- Schedule Dropdown -->
        <x-forms.select label="Schedule" name="schedule">
            <option {{ $job->schedule === 'Part Time' ? 'selected' : '' }}>Part Time</option>
            <option {{ $job->schedule === 'Full Time' ? 'selected' : '' }}>Full Time</option>
        </x-forms.select>

        <!-- URL -->
        <x-forms.input label="URL" name="url" value="{{ old('url', $job->url) }}"
            placeholder="https://acme.com/jobs/ceo-wanted" />

        <!-- Featured Checkbox -->
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" :checked="$job->featured" />

        <!-- Tags -->
        <x-forms.input label="Tags (comma separated)" name="tags" value="{{ old('tags', $tags) }}"
            placeholder="web, video, education" />

        <!-- Submit Button -->
        <x-forms.button>Update</x-forms.button>

    </x-forms.form>
</x-layout>