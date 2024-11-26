<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <form class="mb-8 max-w-screen-md">
    @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}" />
    @endif
    <div class="flex flex-row gap-2 flex-wrap">
      <div
        class="flex flex-grow rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-rose-600">
        <input id="blog-input-search"
          class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 text-lg"
          placeholder="Search title..." type="text" name="search" value="{{ request('search') ?? '' }}" />
      </div>
      <button type="submit"
        class="rounded-md bg-rose-600 px-3 py-2 text-lg font-semibold text-white shadow-sm hover:bg-rose-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-600">Search</button>
    </div>
  </form>

  @if (request('category'))
    <span class="flex flex-row gap-2 align-items-center">
      <div class="text-lg text-gray-500">Fitlered category: "{{ request('category') }}"</div>
      <a href="/blog?{{ request('search') ? 'search=' . request('search') : '' }}"
        class="rounded-md px-2 font-semibold duration-150 text-gray-500 bg-gray-100 hover:bg-rose-600 hover:text-white border shadow-md focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">X</a>
    </span>
  @endif
  @if (request('search'))
    <span class="flex flex-row gap-2 align-items-center">
      <div class="text-lg text-gray-500">Fitlered title by: "{{ request('search') }}"</div>
      <a href="/blog?{{ request('category') ? 'category=' . request('category') : '' }}"
        class="rounded-md px-2 font-semibold duration-150 text-gray-500 bg-gray-100 hover:bg-rose-600 hover:text-white border shadow-md focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">X</a>
    </span>
  @endif

  @forelse ($blogs as $blog)
    <article class="py-8 max-w-screen-md border-b border-gray-300">
      <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $blog['title'] }}</h2>
      <div class="text-base text-gray-500">
        <a href="/author/{{ $blog->author->id }}" class="hover:underline">{{ $blog->author->name }}</a> |
        {{-- {{ date('d M Y, H:i', strtotime($blog['created_at'])) }} --}}
        {{-- {{ $blog['created_at']->format('d M Y, H:i') }} --}}
        {{ $blog['created_at']->diffForHumans() }}
      </div>
      <div class="mt-1 flex flex-row gap-1 flex-wrap">
        @foreach ($blog->categories as $category)
          <a href="/blog?category={{ $category['slug'] }}{{ request('search') ? '&search=' . request('search') : '' }}"
            class="text-white bg-gray-800 hover:bg-gray-700 rounded-full px-4 py-1">{{ $category['name'] }}</a>
        @endforeach
      </div>
      <p class="my-4 font-light">{{ Str::limit($blog['description'], 100) }}
      </p>
      <a href="/blog/{{ $blog['slug'] }}" class="font-medium text-rose-500 hover:underline">Read more &raquo;</a>
    </article>
  @empty
    <h1 class="mt-8 mb-1 text-4xl text-rose-500">Oops!</h1>
    <h2 class="text-xl text-rose-400">No article found.</h2>
  @endforelse

  <div class="max-w-screen-md mt-10 mb-8">
    {{ $blogs->links() }}
  </div>
</x-layout>
