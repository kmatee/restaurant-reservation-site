<x-guest-layout>
    <section class="bg-white dark:bg-white py-8">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md bg-gray-50 rounded-xl shadow-lg">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">Contact Us</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-600 sm:text-xl">Got a technical issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
            <form action="{{route('contact-email')}}" method="POST" class="space-y-8">
                @csrf
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Geroge Smith">
                </div>
                @error('name')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-200 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@email.com">
                </div>
                @error('email')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
                    <textarea name="message" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-200 dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a message..."></textarea>
                </div>
                @error('message')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-primary-800">Send message</button>
            </form>
        </div>
      </section>
</x-guest-layout>