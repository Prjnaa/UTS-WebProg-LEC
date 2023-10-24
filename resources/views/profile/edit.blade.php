
<x-app-layout>

    
<div class="relative bg-cover bg-center w-2/3 container mx-auto rounded-lg p-5 m-5" style="background-image: url('../storage/images/bg.jpg'); height: 200px;">
        <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>
        <div class="absolute inset-0 flex flex-col md:pl-20 pr-4 md:pr-32 items-left justify-center w-full md:w-4/4 mx-auto">
            <div class="custom-font text-white text-4xl md:text-6xl font-semibold text-left ">
                Your Profile
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 shadow-md bg-gray-100 sm:rounded-lg">
                <div class="max-w-xl ">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 shadow-md bg-gray-100 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 shadow-md bg-gray-100 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
