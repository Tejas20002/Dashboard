<div class="py-5">
    <form class="w-full max-w-lg" wire:submit.prevent="changePassword">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Username
                </label>
            </div>
            <div class="md:w-2/3">
                <input wire:model="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="inline-full-name" type="text" value="{{ $app->app_user }}">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                    Password
                </label>
            </div>
            <div class="relative w-full md:w-2/3">
                <input wire:model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline js-password" id="passwordInput" type="password" autocomplete="off" value="{{ $app->app_password }}"/>
            </div>
        </div>
        <div class="md:flex md:items-center ">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <input id="showPass" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="showPass" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Show Password.</label>
            </div>
        </div>

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Change Password
                </button>
            </div>
        </div>
    </form>
</div>
<script>
$(document).ready(function(){
    $('#showPass').on('click', function(){
        var passInput=$("#passwordInput");
        if(passInput.attr('type')==='password')
        {
            passInput.attr('type','text');
        }else{
            passInput.attr('type','password');
        }
    })
})
</script>
