<a href="{{ route('profile.resume') }}">
  <!-- component -->
<div>
  <div>
    <img class="h-32 w-[1200px] object-cover lg:h-48" src="https://resources.thomascook.in/images/holidays/sightSeeing/8-big-ben-min.jpg" alt="">
  </div>
  <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
    <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
      <div class="flex">
        <img class="h-24 w-24 rounded-full ring-4 ring-blue-300 sm:h-32 sm:w-32" src="{{asset('images/' . $user->profile->profile_picture)}}" alt="">
      </div>
      <div class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
        <div class="mt-6 min-w-0 flex-1 sm:hidden md:block">
          <h1 class="truncate text-2xl font-bold text-blue-300">{{ $user->name }}</h1>
        </div>
        <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
          <button type="button" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
              <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
            </svg>
            <span>{{ $user->email}}</span>
          </button>
          <button type="button" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 gap-3">
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB4UlEQVR4nL2WvUtcQRTFf0GSJpYxRKKIWlsGQTQB2SZg/CMEoxitbR9CQIhgZZGQIqSIom3QKlWKYGGzxYaE2Nhom42KURPlwl0Yhrdv7ryPPXDY2Zm595w37868gTj0A4vAHvAdOFVKexd4BfRRAR4Db4Er4CbAf8A2MFCW+DTQNAj7lJgXRcWX9Ilixd3VkFeWC8+B6wLirglZxeh33gwkbgATykZg7m+gN8bA+4xkl8AK0ANsKHu07zIjTorYvNWu2yTZB0aAKeDI6T/SvhGdkxZ7pStrKrwbj+fAsi7jx4ynlO33CHgJ/EkZX7AY2PWCDoBBdZ8Yii7RuYMa6459thj44QXVgS+a2Gog0Zi6NyYnZhDNQOKWqVWPLbEso5I7iDODAfkd17pY1nZiMCDfjSAOjQYS45jLXxYDOxUa2LIYmK/QwKzFwMM2n11JWtOCqzlt/3+tjQE5JR9gxHZKgrpTdCH620+4SQRGgf+GPW+l5HpCJHZKNBD19C0MARcliP8FhsmJ9RIMrFEA94GfBcTlUOumIMZyXs3kKvaUkrCWw8AbSsRd4GuE+DfgHiWjFzg2iJ9Yr155MBm4eMrYMyrGTIaBOTqE1RTx13QQd4B3jvgH7esouoBPSmnnwi2ih9XFBBfp4wAAAABJRU5ErkJggg==">

            <span>{{ $user->profile->address}}</span>
          </button>
        </div>
      </div>
    </div>
    <div class="mt-6 hidden min-w-0 flex-1 sm:block md:hidden">
      <h1 class="truncate text-2xl font-bold text-blue-300">{{ $user->name }}</h1>
    </div>
  </div>
</div>
</a>
