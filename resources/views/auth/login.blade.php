<x-layout.page title="Login">
    <div class="container max-w-xl mx-auto">
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <x-input.text type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus />
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div>
                <x-input.text type="password" name="password" placeholder="Password" required />
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div>
                <x-button type="submit" class="btn btn-primary">
                    Login
                </x-button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        </form>
    </div>
</x-layout.page>
