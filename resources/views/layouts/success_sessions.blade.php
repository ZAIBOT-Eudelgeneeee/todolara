{{-- CREATE SUCCESS SESSION FOR ADDING TASK --}}
@if(session('success'))
    <div id="alert" class="mb-4 p-3 bg-green-100 text-green-700 rounded-md shadow">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
           document.getElementById('alert').remove();
        }, 3000);
    </script>
@endif