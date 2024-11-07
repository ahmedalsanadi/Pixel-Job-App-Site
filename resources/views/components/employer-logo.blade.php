@props(['size' => '90', 'employer'])
<!-- <img src="http://picsum.photos/seed/{{ rand(0, 100000) }}/{{ $size }}" alt="Employer logo" class="rounded-xl"> -->
<!-- <img src="{{ asset('storage/' . $employer->logo) }}" alt="Employer logo" class="rounded-xl" width="{{ $size }}"> -->

<!--  handles both local and external image sources ! -->
<img
    src="{{
        filter_var($employer->logo, FILTER_VALIDATE_URL)
            ? $employer->logo
            : asset('storage/' . $employer->logo)
    }}"
    alt="Employer logo"
    class="rounded-xl ml-1 "
    width="{{ $size }}"
/>

