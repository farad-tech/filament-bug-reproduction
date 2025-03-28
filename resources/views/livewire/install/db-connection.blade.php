<div class="flex bg-white py-6 px-3 rounded-md w-12/12 md:w-8/12 mx-auto">
    @livewire('install.sidebar')

    <div class="px-4 w-full">
        <div class="border border-gray-300 rounded-lg p-5 h-full">

            <p class="text-center mb-7">یک دیتابیس MySQL ایجاد و اطلاعات دسترسی آنرا در وارد کنید.</p>


            <form wire:submit="save" class="max-w-sm mx-auto">

                <div class="mb-5">
                    <label for="db_host" class="block mb-2 text-sm font-medium text-gray-900">هاست دیتابیس</label>
                    <input wire:model="db_host" type="db_host" id="db_host"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="آدرس هاست دیتابیس را وارد کنید ..." required />
                </div>

                <div class="mb-5">
                    <label for="db_port" class="block mb-2 text-sm font-medium text-gray-900">پورت دیتابیس</label>
                    <input wire:model="db_port" type="db_port" id="db_port"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="پورت دیتابیس را وارد کنید ..." required />
                </div>

                <div class="mb-5">
                    <label for="db_database" class="block mb-2 text-sm font-medium text-gray-900">نام دیتابیس</label>
                    <input wire:model="db_database" type="db_database" id="db_database"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="نام دیتابیس را وارد کنید ..." required />
                </div>

                <div class="mb-5">
                    <label for="db_username" class="block mb-2 text-sm font-medium text-gray-900">نام کاربری
                        دیتابیس</label>
                    <input wire:model="db_username" type="db_username" id="db_username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="نام کاربری جهت اتصال به دیتابیس را وارد کنید ..." required />
                </div>

                <div class="mb-5">
                    <label for="db_password" class="block mb-2 text-sm font-medium text-gray-900">کلمه عبور
                        دیتابیس</label>
                    <input wire:model="db_password" type="db_password" id="db_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="کلمه عبور جهت اتصال به دیتابیس را وارد کنید" />
                </div>



                <button type="submit"
                    class="text-white flex justify-between items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">

                    <div role="status" class="me-2" wire:loading>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin fill-blue-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>

                    <span>
                        مرحله بعد
                    </span>
                </button>
            </form>

        </div>
    </div>
</div>
