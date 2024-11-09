<x-layout>
    <x-page-heading>Register</x-page-heading>
    <x-forms.form method="POST" action="register" enctype="multipart/form-data">
        <x-forms.input label="Your Name" name="name" placeholder="Your Name" />
        <x-forms.input label="Email" name="email" type="email" placeholder="John @example.com " />
        <x-forms.input label="Password" name="password" type="password" placeholder="**********" />
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password"
            placeholder="**********" />
        <x-forms.divider />

        <x-forms.input label="Employer Name" name="employer" placeholder="Company Name" />
        <x-forms.input label="Employer Logo" name="logo" type="file" />

        <div class="flex flex-col justify-center -mt-2 items-center gap-2">
            <x-forms.button class="w-full"> Create Account </x-forms.button>
            <p class="text-base text-gray-400 mt-2">
                Already have an account ? <a href="/login" class="underline">
                    Login</a></p>
        </div>
    </x-forms.form>
</x-layout>