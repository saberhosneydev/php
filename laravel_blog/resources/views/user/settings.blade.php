<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account settings') }}
        </h2>
    </x-slot>
    <div class="max-w-xl px-4 py-6 my-6 bg-white rounded-lg shadow-md mx-auto">
        <div class="field">
            <p class="font-semibold text-xl  border-b-2 border-gray-600">Change email address</p>
            <form action="{{route('account.settings.update')}}" method="post">
                <div class="mt-4">
                    <x-label for="email" :value="__('Current Email')" class="ml-0.5" />
                    <x-input id="email" class="block mt-1 w-full bg-gray-100" disabled type="email" name="email"
                        :value="Auth::user()->email" />

                </div>
                <div class="mt-4">
                    <x-label for="newEmail" :value="__('New email')" class="ml-0.5" />
                    <x-input id="newEmail" class="block mt-1 w-full" type="email" name="newEmail"
                        placeholder="New email address" />
                </div>
                <x-button class="mt-2">
                    {{ __('Save changes') }}
                </x-button>
            </form>
        </div>
        <div class="field">
            <p class="font-semibold text-xl  border-b-2 border-gray-600 mt-8">Change password</p>
            <form action="{{route('account.settings.update')}}" method="post">
                <div class="mt-4">
                    <x-label for="currentPassword" :value="__('Current password')" class="ml-0.5" />
                    <x-input id="currentPassword" class="block mt-1 w-full" type="password" name="currentPassword"
                        placeholder="Enter your current password" />
                </div>
                <div class="mt-4">
                    <x-label for="newPassword" :value="__('New password')" class="ml-0.5" />
                    <x-input id="newPassword" class="block mt-1 w-full" type="password" name="newPassword"
                        placeholder="Enter new password" />
                </div>
                <div class="mt-4">
                    <x-label for="confirmPassword" :value="__('Confirm password')" class="ml-0.5" />
                    <x-input id="confirmPassword" class="block mt-1 w-full" type="password" name="confirmPassword"
                        placeholder="Confirm the new password" />
                </div>
                <x-button class="mt-2">
                    {{ __('Save changes') }}
                </x-button>
            </form>
        </div>
        <div class="field">
            <p class="font-semibold text-xl  border-b-2 border-gray-600 mt-8">Notify by email when ...</p>
            <form action="{{route('account.settings.update')}}" method="post">
                <label for="notifyComment" class="flex items-center mt-2">
                    <input id="notifyComment" type="checkbox"
                        class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-600 focus:ring-2"
                        name="notifyComment">
                    <span class="ml-2 text-md text-gray-600">{{ __('a new comment is posted on my articles') }}</span>
                </label>
                <label for="newFollowArticle" class="flex items-center mt-2">
                    <input id="newFollowArticle" type="checkbox"
                        class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-600 focus:ring-2"
                        name="newFollowArticle">
                    <span class="ml-2 text-md text-gray-600">{{ __('author I follow posts a new article') }}</span>
                </label>
                <label for="newFollower" class="flex items-center mt-2">
                    <input id="newFollower" type="checkbox"
                        class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-600 focus:ring-2"
                        name="newFollower" checked>
                    <span class="ml-2 text-md text-gray-600">{{ __('someone follows me') }}</span>
                </label>
                <x-button class="mt-2">
                    {{ __('Save changes') }}
                </x-button>
            </form>
        </div>
        <div class="field"
            x-data="{ enabled: {{Auth::user()->_2FA}}, selected:'{{json_decode(Auth::user()->_2FAMethod)[0] ?? ''}}' }">
            <p class="font-semibold text-xl  border-b-2 border-gray-600 mt-8">Two factor authentication</p>
            <form action="{{route('account.settings.update')}}" method="post" id="change2FAStatus">
                @csrf
                <label for="2FAEnable" class="inline-flex items-center mt-2"
                    onclick="document.getElementById('change2FAStatus').submit();">
                    <input id="2FAEnable" type="checkbox"
                        class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-600 focus:ring-2"
                        name="2FAEnable" x-model="enabled" @click="this.closest('form').submit()">
                    <span
                        class="ml-2 text-md text-gray-600 font-bold">{{ __('Enable 2FA !? Only one option can be selected.') }}</span>
                </label>

            </form>
            <hr class="w-8/12 mx-auto my-4">
            <form action="{{route('account.settings.update')}}" method="post">
                @csrf
                <label for="2FAPhone" class="flex items-center mt-2">
                    <input id="2FAPhone" type="radio" x-bind:disabled="!enabled" x-bind:checked="selected=='phone'"
                        :class="{ 'bg-gray-100': !enabled}"
                        class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-600 focus:ring-2"
                        name="2FA" @click="selected = 'phone'" value="phone">
                    <span class="ml-2 text-md"
                        :class="{ 'text-gray-400': !enabled, 'text-gray-600': enabled}">{{ __('Enable 2FA using SMS') }}</span>
                </label>
                <x-label for="phoneNumber" :value="__('Phone number')" class="ml-0.5" />
                <x-input id=" phoneNumber" x-bind:class="{ 'bg-gray-100': !enabled}" class="block mt-1 w-full"
                    type="tel" name="phoneNumber" placeholder="Enter your phone number including country code"
                    x-bind:disabled="!enabled" x-bind:required="enabled && selected=='phone'"
                    :value="(isset(Auth::user()->_2FAMethod) && json_decode(Auth::user()->_2FAMethod)[0] == 'phone') ? json_decode(Auth::user()->_2FAMethod)[1] ?? '' : ''" />
                <label for="2FAEmail" class="flex items-center mt-2">
                    {{-- @click="alert(document.getElementById('2FAEmail').value)" --}}
                    <input id="2FAEmail" type="radio" x-bind:disabled="!enabled" x-bind:checked="selected=='email'"
                        :class="{ 'bg-gray-100': !enabled}" value="email"
                        class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-600 focus:ring-2"
                        name="2FA" @click="selected = 'email'">
                    <span class="ml-2 text-md"
                        :class="{ 'text-gray-400': !enabled, 'text-gray-600': enabled}">{{ __('Enable 2FA using email') }}</span>
                </label>
                <x-button class="mt-2 cursor-default" x-bind:disabled="!enabled">
                    {{ __('Save changes') }}
                </x-button>
                <input type="radio" name="2FA" class="hidden" x-bind:disabled="!enabled" x-bind:checked="!enabled">
            </form>
        </div>
    </div>
</x-app-layout>