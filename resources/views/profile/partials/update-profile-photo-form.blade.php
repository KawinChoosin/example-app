<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Photo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your profile photo.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
            <input type="file" name="profile_photo" id="profile_photo" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-photo-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    <div style="margin-top: 1.5rem;">
    <label for="current_photo" style="display: block; font-weight: bold;">Current Profile Photo</label>
    <div style="margin-top: 0.25rem; display: flex; justify-content: center; align-items: center;">
        @if(Auth::user()->profile_photo)
            <img 
                src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
                alt="Profile Photo" 
                style="
                    width: 15rem; 
                    height: 15rem; 
                    object-fit: cover; 
                    border-radius: 9999px; 
                    border: 2px solid #d1d5db; /* Adjust the color and size as needed */
                "
            >
        @else
            <p style="font-size: 0.875rem; color: #4b5563;">No profile photo uploaded.</p>
        @endif
    </div>
</div>
</section>
