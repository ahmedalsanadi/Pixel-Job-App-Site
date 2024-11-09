<!-- resources/views/jobs/create.blade.php -->
<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">

        <x-forms.input label="Title" name="title" placeholder="CEO" />

        <!-- Description -->
        <x-forms.textarea label="Description" name="description" placeholder="Provide a detailed description of the job" />
        <x-forms.input label="Salary" name="salary" placeholder="$90,000 USD" />
        <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida" />

        <x-forms.select label="Job Type" name="job_type">
            <option>Engineering</option>
            <option>Marketing</option>
            <option>Finance</option>
            <option>Design</option>
            <option>Operations</option>
            <option>Others</option>
        </x-forms.select>

        <!-- Schedule Dropdown -->
        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://acme.com/jobs/ceo-wanted" />
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />
        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="web, video, education" />

        <x-forms.button>Publish</x-forms.button>

    </x-forms.form>
</x-layout>
