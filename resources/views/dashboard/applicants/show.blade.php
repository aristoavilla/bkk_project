<x-dashboard.layout>
    <x-slot:title>Detail of Applicant: {{ $applicant->user->username }}</x-slot:title>

    <section class="py-16">
        <div class="container mx-auto bg-gray-100 p-8 rounded-lg shadow-lg">
            <!-- Applicant Header Section -->
            <h2 class="text-3xl font-bold text-teal-700 mb-6">{{ $applicant->user->alumni->firstName }} {{ $applicant->user->alumni->lastName }}</h2>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Applicant Information -->
                <div>
                    <img class="object-cover w-full h-72 rounded-md mb-6" src="{{ asset('storage/'.$applicant->self_picture) }}" alt="Applicant's Picture">
                    
                    <h4 class="text-lg font-semibold text-teal-700 mb-4">Personal Information</h4>
                    <p><strong>Username:</strong> {{ $applicant->user->username }}</p>
                    <p><strong>Email:</strong> {{ $applicant->user->email }}</p>
                    <p><strong>Domicile:</strong> {{ $applicant->domicile }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($applicant->status) }}</p>
                </div>

                <!-- Career & Documents Information -->
                <div>
                    <h4 class="text-lg font-semibold text-teal-700 mb-4">Career Information</h4>
                    <p><strong>Career Title:</strong> {{ $applicant->career->job_title }}</p>
                    <p><strong>Career Description:</strong> {{ $applicant->career->description }}</p>

                    <h4 class="text-lg font-semibold text-teal-700 mt-8 mb-4">Application Description</h4>
                    <p>{{ $applicant->description }}</p>
                    
                    <!-- Documents Section -->
                    <h4 class="text-lg font-semibold text-teal-700 mt-8 mb-4">Documents</h4>
                    <ul>
                        <li><strong>Resume:</strong> <a href="{{ asset('storage/'.$applicant->resume) }}" class="text-teal-500" target="_blank">Download Resume</a></li>
                        <li><strong>Competence Certificate:</strong> <a href="{{ asset('storage/'.$applicant->competence_certificate) }}" class="text-teal-500" target="_blank">Download Certificate</a></li>
                        <li><strong>Identity Card:</strong> <a href="{{ asset('storage/'.$applicant->identity_card) }}" class="text-teal-500" target="_blank">Download Identity Card</a></li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8">
                <button class="bg-gray-400 py-2 px-4 text-white rounded-md mr-2">
                    <a href="/dashboard/applicants">Back</a>
                </button>
                @if ($applicant->status === "pending")
                <form action="{{ route('applicants.accept', $applicant->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-600 py-2 px-4 mr-2 text-white rounded-md">
                      Accept
                    </button>
                </form>

                <!-- Reject Button -->
                <form action="{{ route('applicants.reject', $applicant->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 py-2 px-4 mr-2 text-white rounded-md">
                        Deny
                    </button>
                </form>
                @endif
            </div>
        </div>
    </section>
</x-dashboard.layout>
