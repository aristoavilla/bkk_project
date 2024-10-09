{{-- Dataset section --}}
<div class="py-16 lg:py-20">

    {{-- Head of dataset section --}}
    <div class="flex items-center pb-6">
      <img src="{{ asset('storage/img/icon-story.png') }}" alt="icon story" />
      <h3
        class="ml-3 font-body text-2xl font-semibold text-primary"
      >
        Alumni People
      </h3>
      <a
        href="/blog"
        class="flex items-center pl-10 font-body italic text-green transition-colors hover:text-secondary"
      >
        All datas
        <img
          src="{{ asset('storage/img/long-arrow-right.png') }}"
          class="ml-3"
          alt="arrow right"
        />
      </a>
    </div>
    {{-- End of head dataset section --}}
    
    {{-- Main of dataset section --}}
    <div class="pt-8">
        <div class="grid grid-cols-3 gap-4 delay pb-8">
            <div class="bg-gray-100 rounded-lg p-4 text-center transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md">
                <span
                class="mb-4 inline-block rounded-full bg-green-light px-2 py-1 font-body text-sm text-green"
                >category</span
                >
                <a
                href="/post"
                class="block font-body text-lg font-semibold text-primary transition-colors hover:text-green"
                >Alumnus</a
                >
                <canvas id="myChart"></canvas>
            </div>
            <div class="bg-gray-100 rounded-lg p-4 text-center transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md">
                <span
                class="mb-4 ml-4 inline-block rounded-full bg-yellow-light px-2 py-1 font-body text-sm text-yellow-dark"
                >category</span
                >
                <a
                href="/post"
                class="block font-body text-lg font-semibold text-primary transition-colors hover:text-green"
                >Undergraduate</a
                >
                <canvas class="translate-y-20" id="myChart1"></canvas>
            </div>
            <div class="bg-gray-100 rounded-lg p-4 text-center transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md">
                <span
                class="mb-4 inline-block rounded-full bg-green-light px-2 py-1 font-body text-sm text-green"
                >category</span
                >
                <a
                href="/post"
                class="block font-body text-lg font-semibold text-primary transition-colors hover:text-green"
                >Employed</a
                >
                <canvas class="translate-y-20" id="myChart"></canvas>
            </div>
        </div>

    </div>
    {{-- End of main dataset section --}}

</div>
{{-- End of dataset section --}}