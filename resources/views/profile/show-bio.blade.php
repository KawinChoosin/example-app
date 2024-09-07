<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Bio') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Form to edit bio and select personals -->
                    <form method="POST" action="{{ route('profile.update-bio') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <!-- Bio textarea -->
                        <div>
                            <x-input-label for="bio" :value="__('Bio')" />
                            <textarea id="bio" name="bio" rows="5"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-100" required>{{ old('bio', $bio ?? '') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                        </div>

                        <!-- Personal Selection -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select Personal Types</label>
                            <!-- Grid layout for personals -->
                            <div class="grid grid-cols-1 gap-4">
                                @foreach ($personals as $personal)
                                    <div class="flex items-center mb-4">
                                        <!-- Checkbox and label container -->
                                        <input type="checkbox" id="personal_{{ $personal->id }}"
                                               name="personals[]" value="{{ $personal->id }}" class="h-5 w-5 text-indigo-600 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600"
                                               {{ in_array($personal->id, old('personals', $selectedPersonals)) ? 'checked' : '' }}>
                                        <label for="personal_{{ $personal->id }}" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $personal->type }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('personals')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Bio') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <center>
        <x-secondary-button onclick="disableFormSubmissionAndGoBack()" aria-label="Go back to the previous page">
            {{ __('Back to Previous') }}
        </x-secondary-button>
    </center>

    <script>
        function disableFormSubmissionAndGoBack() {
            event.preventDefault(); // Prevent the form from submitting
            window.history.back(); // Go back to the previous page
        }
    </script>
</x-app-layout>
