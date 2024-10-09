<x-dashboard.layout>
    <x-slot:title>New Application</x-slot:title>

    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-semibold mb-6">Apply for {{ $career->job_title }}</h1>

        <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="career_id" value="{{ $career->id }}">

            <div class="mb-4">
                <label for="domicile" class="block text-gray-700">Domicile</label>
                <input type="text" id="domicile" name="domicile" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="description" class="w-full px-3 py-2 border border-gray-300 rounded-md" required></textarea>
            </div>

            <div class="mb-4">
                <label for="resume" class="block text-gray-700">Resume (PDF)</label>
                <input type="file" id="resume" name="resume" class="w-full px-3 py-2 border border-gray-300 rounded-md" accept=".pdf" required>
            </div>

            <div class="mb-4">
                <label for="self_picture" class="block text-gray-700">Self Picture</label>
                <img class="img-preview img-fluid mb-2 col-sm-5">
                <input onchange="previewImg()" type="file" id="self_picture" name="self_picture" class="w-full px-3 py-2 border border-gray-300 rounded-md" accept="image/*" required>
            </div>

            <div class="mb-4">
                <label for="competence_certificate" class="block text-gray-700">Competence Certificate (PDF)</label>
                <input type="file" id="competence_certificate" name="competence_certificate" class="w-full px-3 py-2 border border-gray-300 rounded-md" accept=".pdf" required>
            </div>

            <div class="mb-4">
                <label for="identity_card" class="block text-gray-700">Identity Card (PDF)</label>
                <input type="file" id="identity_card" name="identity_card" class="w-full px-3 py-2 border border-gray-300 rounded-md" accept=".pdf" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit Application</button>
        </form>
    </div>
    <script>
        //image
        function previewImg(){
        const self_picture = document.querySelector('#self_picture');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(self_picture.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }

        }
    </script>
</x-dashboard.layout>
