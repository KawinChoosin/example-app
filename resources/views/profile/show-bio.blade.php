<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Bio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Form to edit bio and personality type -->
                    <form method="post" action="{{ route('profile.update-bio') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <!-- Bio textarea -->
                        <div>
                            <x-input-label for="bio" />
                            <textarea id="bio" name="bio" rows="5"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-100"
                                required>{{ old('bio', $bio->bio ?? '') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                        </div>
                        <div>Select a personality type</div>
                        <!-- Personality Type dropdown -->
                        <div>
                            <x-input-label for="personality_type_id" />
                            <select id="personality_type_id" name="personality_type_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-100"
                                required>
                                <option value="" disabled>Select a personality type</option>
                                @foreach ($personals as $personal)
                                    <option value="{{ $personal->id }}" {{ old('personality_type_id', $user->personality_type_id) == $personal->id ? 'selected' : '' }}>
                                        {{ $personal->type }} : {{ $personal->description }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('personality_type_id')" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Bio') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('status') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
</x-app-layout>
