<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="flex flex-col gap-4 max-w-screen-md mx-auto pb-20">
    <h1 class="text-2xl font-semibold text-rose-500 mb-2">Hai! Selamat datang di project saya!</h1>
    <p class="text-justify font-semibold text-gray-500">Ini adalah project saya untuk belajar basic-basic menggunakan
      framework laravel versi 11. Yang menjadi panduan saya dalam project ini adalah playlist youtube dari channel Web
      Programming UNPAS yang disampaikan oleh Pak Sandhika Galih <a
        href="https://youtube.com/playlist?list=PLFIM0718LjIW1Xb7cVj7LdAr32ATDQMdr"
        class="text-rose-500 hover:underline hover:font-bold" target="_blank">(Link)</a>.
    </p>
    <p class="text-justify font-semibold text-gray-500">Dalam pembelajaran ini, fitur yang menjadi fokus utama adalah web
      blog dengan model yang sangat sederhana namun cukup untuk mencoba dasar-dasar pemrograman dengan framework
      laravel.
    </p>
    <p class="text-justify font-semibold text-gray-500">Di bawah ini adalah beberapa dokumentasi yang saya ambil dalam
      pembuatan project ini.</p>

    <div>
      <img src="{{ asset('images/docs-1.png') }}" alt="Docs-1" class="rounded-md border shadow-lg" />
      <p class="text-center font-semibold text-gray-500"><span class="font-bold text-rose-500">Docs 1:</span> Mencoba
        berbagai macam fitur yang
        tersedia pada model dari
        laravel</p>
    </div>
    <div>
      <img src="{{ asset('images/docs-2.png') }}" alt="Docs-2" class="rounded-md border shadow-lg" />
      <p class="text-center font-semibold text-gray-500"><span class="font-bold text-rose-500">Docs 2:</span> Melakukan
        filter pada data blogs menggunakan scope disertai pagination</p>
    </div>
    <div>
      <img src="{{ asset('images/docs-3.png') }}" alt="Docs-3" class="rounded-md border shadow-lg" />
      <p class="text-center font-semibold text-gray-500"><span class="font-bold text-rose-500">Docs 3:</span> Debugging
        N + 1 problem pada loop query menggunakan barryvdh/laravel-debugbar</p>
    </div>

    <p class="text-justify font-semibold text-gray-500">Dokumentasi ini saya akhiri dengan ucapan terimakasih kepada Pak
      Sandhika Galih sebagai pengajar materi, seluruh komunitas dan pengembang framework laravel, pengembang plugin yang
      digunakan, dan semua orang lain yang tidak bisa saya sebutkan satu per satu.</p>
  </div>
</x-layout>
