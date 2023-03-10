@extends('layouts.app')

@section('title', 'modifica')

@section('content')
<section id="edit">
    <div class="container">
        <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required value="{{old('title', $project->title)}}">
                </div>
                <div class="mb-3 col-6">
                    <label for="slug" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="slug" disabled value="{{old('title', $project->title)}}">
                </div>
                <div class="mb-3 col-12">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            <div class="mb-3 col-12">
                <label for="content" class="form-label">Paragrafo</label>
                <textarea class="form-control" id="content" name="content" rows="6" required>{{old('content', $project->content)}}</textarea>
            </div>
            <div class="mb-3 col-4">
                <label for="collab" class="form-label">Collaborazioni</label>
                <input type="text" class="form-control" id="collab" name="collab" value="{{old('collab', $project->collab)}}">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-sm btn-primary-custom text-light me-1">Vai</button>
            <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-sm btn-primary-custom text-light">Indietro</a>
        </div>
    </form>
    </div>
</section>
@endsection

@section('scripts')
<script>
    //prendo gli elemneti 
    const slugInput = document.getElementById('slug');
    const titleInput = document.getElementById('title');

    titleInput.addEventListener('blur', () => {
        slugInput.value = titleInput.value.toLowerCase().split(' ').join('-');
    });
</script>
@endsection