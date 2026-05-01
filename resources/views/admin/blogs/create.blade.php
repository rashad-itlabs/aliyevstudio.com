@extends('admin.admin')

@section('title', 'Yeni Blog Əlavə Et')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Yeni Blog Əlavə Et</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog Formu</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Başlıq</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="upload_date" class="form-label">Yüklənmə Tarixi</label>
                        <input type="date" class="form-control" id="upload_date" name="upload_date" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="uploader" class="form-label">Yükləyən</label>
                        <input type="text" class="form-control" id="uploader" name="uploader" value="Admin" required>
                        {{-- Real tətbiqlərdə bu sahə adətən avtomatik doldurulur və ya istifadəçilər siyahısından seçilir --}}
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Şəkillər</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                        <small class="form-text text-muted">Birdən çox şəkil seçə bilərsiniz.</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Təsvir</label>
                        <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                    </div>

                    @push('scripts')
                    <script>
                        CKEDITOR.replace('description');
                    </script>
                    @endpush
                    </div>

                    <button type="submit" class="btn btn-primary">Blog Əlavə Et</button>
                </form>
            </div>
        </div>
    </div>
@endsection