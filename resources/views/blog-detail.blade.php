<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <article class="py-8 max-w-screen-md ">
    <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $blog['title'] }}</h2>
    <div class="text-base text-gray-500">
      <a href="/author/{{ $blog->author->id }}" class="hover:underline">{{ $blog->author->name }}</a> |
      {{ $blog['created_at']->diffForHumans() }}
    </div>
    <div class="mt-1 flex flex-row gap-1 flex-wrap">
      @foreach ($blog->categories as $category)
        <a href="/category/{{ $category['slug'] }}"
          class="text-white bg-gray-800 hover:bg-gray-700 rounded-full px-4 py-1">{{ $category['name'] }}</a>
      @endforeach
    </div>
    <p class="my-4 font-light">{{ $blog['description'] }}</p>
    <a href="/blog" class="font-medium text-rose-500 hover:underline">&laquo; Back to blogs</a>
  </article>
</x-layout>
