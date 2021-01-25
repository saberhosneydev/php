<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account settings') }}
        </h2>
    </x-slot>
    @if ($message = Session::get('status'))
    <div class="max-w-xl px-4 py-2 mt-6 bg-blue-100 text-blue-600 rounded-lg shadow-md mx-auto">
        {{ $message }}
    </div>
    @endif
    <div class="max-w-xl px-4 py-6 my-6 bg-white rounded-lg shadow-md mx-auto">
        <div class="field">
            <p class="font-semibold text-xl  border-b-2 border-gray-600">Change email address</p>
            <form action="{{route('account.settings.update')}}" method="post">
                @csrf
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
                @csrf
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
            <p class="font-semibold text-xl  border-b-2 border-gray-600 mt-8">Change phone number</p>
            <form action="{{route('account.settings.update')}}" method="post">
                @csrf
                <div class="mt-4">
                    <x-label for="currentPhoneNumber" :value="__('Current phone number')" class="ml-0.5" />
                    <x-input id="currentPhoneNumber" class="block mt-1 w-full bg-gray-100" disabled type="tel"
                        name="currentPhoneNumber" :value="Auth::user()->phone_number" />

                </div>
                <div class="mt-4">
                    <x-label for="newPhoneNumber" :value="__('New phone number')" class="ml-0.5" />
                    <x-input id="newPhoneNumber" class="block mt-1 w-full" type="tel" name="newPhoneNumber"
                        placeholder="New phone number" />
                </div>
                <x-button class="mt-2">
                    {{ __('Save changes') }}
                </x-button>
            </form>
        </div>
        <div class="field">
            <p class="font-semibold text-xl  border-b-2 border-gray-600 mt-8">Notify by email when ...</p>
            <form action="{{route('account.settings.update')}}" method="post">
                @csrf
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
        <div class="field" x-data="TwoFactorAuth()">
            <p class="font-semibold text-xl  border-b-2 border-gray-600 mt-8">Two factor authentication</p>
            @if ($user->phoneVerified)
            <form action="{{route('account.settings.update')}}" method="post">
                @csrf
                <label for="phoneVerifiedEnable" class="flex items-center mt-2">
                    <input id="phoneVerifiedEnable" type="radio"
                        class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-600 focus:ring-2"
                        name="phoneVerified" value="EnableTwoFactorAuth"
                        {{ isset($user->TwoFactorAuth) ? 'checked': '' }}>
                    <span class="ml-2 text-md text-gray-600">{{ __('Enable two factor authentication') }}</span>
                </label>
                <label for="phoneVerifiedDisable" class="flex items-center mt-2">
                    <input id="phoneVerifiedDisable" type="radio"
                        class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-gray-600 focus:ring-2"
                        name="phoneVerified" value="DisableTwoFactorAuth"
                        {{ isset($user->TwoFactorAuth) ? '': 'checked' }}>
                    <span class="ml-2 text-md text-gray-600">{{ __('Disable two factor authentication') }}</span>
                </label>
                <x-button class="mt-2">
                    {{ __('Save changes') }}
                </x-button>
            </form>
            @else
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="fixed z-10 inset-0 overflow-y-auto" x-show="isOpen">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 transition-opacity" aria-hidden="true" x-show="isOpen"
                        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        x-show="isOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" role="dialog"
                        aria-modal="true" aria-labelledby="modal-headline">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <!-- Heroicon name: exclamation -->
                                    <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                        Phone verification
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            A SMS contains your verification code has been sent to your phone, please
                                            enter it and press verify.
                                            <form class="mt-2">
                                                @csrf
                                                <div class="inline-block">
                                                    <x-label for="verification_code" :value="__('Verification Code')"
                                                        class="ml-0.5" />
                                                    <x-input id="verification_code" class="block mt-1 w-full" type="tel"
                                                        name="verification_code" placeholder="Enter the code" />
                                                </div>
                                            </form>
                                            <p class="text-red-500 italic ml-0.5 text-sm" x-text="invalidCode"></p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                                @click="completeVerification()">
                                Verify
                            </button>
                            <button type="button" @click="isOpen = false"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <form id="phoneNumberForm" class="mt-2 inline-block" method="post"
                action="{{route('account.settings.verifyPhone')}}">
                @csrf
                <div class="inline-block">
                    <x-label for="phone_number" :value="__('Phone number')" class="ml-0.5" />
                    <x-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number"
                        placeholder="Enter your phone number" :value="$user->phone_number" />
                </div>
            </form>
            <x-button class="inline-block" @click="sendVerificationCode()">
                {{ __('Begin verification') }}
            </x-button>
            <p class="text-red-500 italic ml-0.5 text-sm" x-show="showError" x-text="errorMessage"></p>
            @endif
        </div>
    </div>
    <x-slot name="script">
        <script>
            function TwoFactorAuth() {
                return {
                    isOpen: false,
                    showError: false,
                    errorMessage: "",
                    invalidCode: "",
                    sendVerificationCode() {
                        let data = this;
                        if (isNaN(document.querySelector("#phoneNumberForm")[1].value)) {
                            data.errorMessage = "Not a valid number";
                            data.showError = true;
                        } else {
                            data.showError = false;
                            axios({
                            url: '/dashboard/verifyPhone',
                            data: {
                                phone_number: document.querySelector("#phoneNumberForm")[1].value,
                            },
                            method:'post'})
                            .then(function (response) {
                                if(response.data['status'] == "error"){
                                    data.errorMessage = response.data['message'];
                                    data.showError = true;
                                }else {
                                    data.showError = false;
                                    data.isOpen = true;
                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                        }
                    },
                    completeVerification() {
                        let data = this;
                        if (isNaN(document.querySelector("#verification_code").value)) {
                            data.invalidCode = "Invalid code";
                        } else {
                            data.invalidCode = "";
                            axios({
                            url: '/dashboard/verifyVerificationCode',
                            data: {
                                verification_code: document.querySelector("#verification_code").value,
                                phone_number: document.querySelector("#phoneNumberForm")[1].value
                            },
                            method:'post'})
                            .then(function (response) {
                                if(response.data['status'] == "error"){
                                    console.log("ERRORBRO");
                                    data.invalidCode = "Invalid code";
                                }else {
                                    data.invalidCode = "";
                                    location.reload();
                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                        }
                    },
                }
            }
            
        </script>
    </x-slot>
</x-app-layout>