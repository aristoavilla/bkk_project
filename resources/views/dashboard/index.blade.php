<x-dashboard.layout>

  <x-slot:title>{{ $title }}</x-slot:title>

@if (!auth()->user()->isStudent())
<div class="grid grid-cols-3 gap-4 delay">
  <div class="bg-gray-200 rounded-lg p-4 text-center transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md">
    <h2 class="font-bold">Employedness of Alumnus</h2>
    <canvas id="myChart"></canvas>
  </div>
  <div class="bg-gray-200 rounded-lg p-4 text-center transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md">
    <h2 class="font-bold">Users, Alumnus, & Careers</h2>
    <canvas class="translate-y-20" id="myChart1"></canvas>
  </div>
  <div class="bg-gray-200 rounded-lg p-4 text-center transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md">
    <h2 class="font-bold">Users, Alumnus, & Careers</h2>
    <canvas class="translate-y-20" id="myChart2"></canvas>
  </div>
@endif
@if (auth()->user()->isStudent())
  <h1 class="text-2xl font-bold tracking-tight text-gray-900">Recommended Jobs</h1>
  <div class="grid grid-cols-2 gap-4 delay pb-8">
    @foreach ($paginatedCareers as $career)
    <div class="transition ease-in-out hover:-translate-y-1 hover:scale-105">
      <div class="bg-gray-100 rounded-lg p-4 text-balance transition ease-in-out hover:-translate-y-1 hover:scale-105 border border-gray-700 hover:shadow-md">
        <div
        href=" / "
        class="flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6"
      >
        <span class="w-9/10">
          <h4
            class="font-body text-lg font-semibold text-primary pb-4"
          >
           {{ $career->job_title }}
          </h4>
          <img class="pb-4" src="{{ asset('storage/img/post-image-01.png') }}" alt="">

          <p class="font-body font-light text-primary pb-2">
            {{ Str::limit($career->description, 100) }}
          </p>
          <div class="">
            <button class="bg-blue-600 py-1 px-3 text-white rounded-md"><a href="{{ route('applications.create', $career->id) }}">Apply</a></button>
          </div>
        </span>
      </div>
      </div>
    </div>
    @endforeach
  </div>
@endif
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Accepted', 'Rejected'],
          datasets: [{
            label: 'Count',
            data: [{{ $acceptedCount }}, {{ $rejectedCount }}],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

    const ctx1 = document.getElementById('myChart1');

    new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: ['Users', 'Careers', 'Alumnus'],
          datasets: [{
            label: 'Count',
            data: [{{ $users->count() }}, {{ $careers->count() }}, {{ $alumnus->count() }}],
            borderWidth: 1,
            backgroundColor: [
              'rgba(255, 99, 132, 0.7)',
              'rgba(255, 159, 64, 0.7)',
              'rgba(255, 205, 86, 0.7)',
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
            ],
          }]
        },
        options: {
          scales: {
            y: {
              maintainAspectRatio: false,
              beginAtZero: true,
            }
          }
        }
      });

    const ctx2 = document.getElementById('myChart2');
    const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];


    new Chart(ctx2, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: 'Count',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
          }]
        }
      });
</script>
</x-dashboard.layout>