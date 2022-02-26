<x-layout.page title="Reset Password">
    <div class="container max-w-xl mx-auto">
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <x-input.text type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required />

            <x-button type="submit">
                {{ __('Send Password Reset Link') }}
            </x-button>
        </form>
    </div>
</x-layout.page>
