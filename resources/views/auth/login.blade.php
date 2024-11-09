<x-layout>
    <x-page-heading>Login</x-page-heading>

    <x-forms.form method="POST" action="login">
        <x-forms.input label="Email" name="email" type="email" placeholder="John @example.com " />
        <x-forms.input label="Password" name="password" type="password" placeholder="**********" />
        <div class="flex flex-col justify-center -mt-2 items-center gap-2">

            <x-forms.button class="w-full">
                Log In
            </x-forms.button>
            <p class="text-base text-gray-400 mt-2">Create an account ? <a href="/register" class="underline">
                    Sign Up</a></p>
        </div>
        <x-forms.divider />
    </x-forms.form>

</x-layout>
