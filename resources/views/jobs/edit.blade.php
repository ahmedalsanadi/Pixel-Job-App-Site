<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="PUT" action="/jobs/{{ $job->id }}">
        <x-forms.input label="Title" name="title" value="{{ old('title', $job->title) }}" placeholder="CEO" />
        <x-forms.input label="Salary" name="salary" value="{{ old('salary', $job->salary) }}" placeholder="$90,000 USD" />
        <x-forms.input label="Location" name="location" value="{{ old('location', $job->location) }}" placeholder="Winter Park, Florida" />

        <x-forms.select label="Schedule" name="schedule">
            <option {{ $job->schedule === 'Part Time' ? 'selected' : '' }}>Part Time</option>
            <option {{ $job->schedule === 'Full Time' ? 'selected' : '' }}>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" value="{{ old('url', $job->url) }}" placeholder="https://acme.com/jobs/ceo-wanted" />
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" :checked="$job->featured" />

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" value="{{ old('tags', $tags) }}" placeholder="web, video, education" />

        <x-forms.button>Update</x-forms.button>
    </x-forms.form>
</x-layout>
