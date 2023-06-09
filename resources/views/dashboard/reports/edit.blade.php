@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 mb-2 border-bottom">
    <h5 class="h5">Edit Reports</h5>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/reports/{{ $report->slug }}" class="mb-3" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">
        <!-- Grid column -->
        <div class="col-md-6">
            <p class="mb-0">Date</p>
            <!-- Material input -->
            <div class="input-group mb-3">
                <input type="date" value="{{ $report->date, old('date') }}" class="form-control" id="date" name="date" required>
            </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6">
            <p class="mb-0">Category</p>
            <!-- Material input -->
            <div class="input-group mb-3">
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if($report->category_id == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Grid column -->
    </div>
    <!-- Grid row -->

    <!-- Grid row -->
    <div class="row">
        <!-- Grid column -->
        <div class="col-md-6">
            <p class="mb-0">Equipment</p>
            <!-- Material input -->
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('equipment') is-invalid @enderror" id="equipment" name="equipment" placeholder="Contoh: 444-FN1" required value="{{ $report->equipment, old('equipment') }}" autofocus>
                @error('equipment')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6">
            <p class="mb-0">Problem Status</p>
            <!-- Material input -->
            <div class="input-group mb-3">
                <select class="form-select" name="status">
                    @if($report->status == "1")
                        <option value="1" selected>Done</option>
                        <option value="0" >Continue</option>
                    @else
                        <option value="1">Done</option>
                        <option value="0" selected>Continue</option>
                    @endif
                </select>
            </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-12">
            <p class="mb-0">Problem</p>
            <!-- Material input -->
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('problem') is-invalid @enderror" id="problem" name="problem" placeholder="Contoh: Motor short circuit" required value="{{ $report->problem, old('problem') }}">
                @error('problem')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <!-- Grid column -->
    </div>
    <!-- Grid row -->

    <div class="mb-3">
        <label for="action" class="form-label">Action</label>
        <input id="action" type="hidden" name="action" value="{{ $report->action, old('action') }}">
        <trix-editor input="action" class="bg-white @error('action') is-invalid @enderror" required></trix-editor>
        @error('action')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label @error('image') is-invalid @enderror">Upload photos</label>
        <div>
            @if($report->image)
                <img src="{{ asset('storage/' . $report->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
        </div>
        <input class="form-control form-control-sm" id="image" type="file" name="image" onchange="previewImage()">
        <input type="hidden" name="oldImage" value="{{ $report->image }}">
        @error('image')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
    </div>

    <div class="mb-3">
        <label for="slug" class="form-label" hidden>Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ $report->slug, old('slug') }}" hidden>
      </div>

    <button type="submit" class="btn btn-primary">Update Report</button>
</form>
</div>

<script>
    let date = document.querySelector('#date');
    let equipment = document.querySelector('#equipment');
    let slug = document.querySelector('#slug');
    let user_id = {{ auth()->user()->id }};

    date.addEventListener('change', function() {
        slug.value = date.value + equipment.value + user_id
    });

    equipment.addEventListener('change', function() {
        slug.value = date.value + equipment.value + user_id
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function previewImage() {
        let image = document.querySelector('#image');
        let imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        let oFReader = new FileReader();
        oFReader .readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
