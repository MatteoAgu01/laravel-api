@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit {{ $project->name }} Project</h1>
            <div class="col-6">
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                            required maxlength="255" minlength="3" value="{{ old('title', $project->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type_id">Type</label>
                        <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                            <option value="">Select type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class="mb-3">
                            <label for="body">Description</label>
                            <textarea name="description" id="body" rows="10"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <p>Choose technologies</p>
                            <div class="d-flex flex-wrap align-items-center w-100 py-4">

                                @foreach ($technologies as $technology)
                                    <div>
                                        @if ($errors->any())
                                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input"
                                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                                        @else
                                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input"
                                                {{ $product->technologies->contains($technology) ? 'checked' : '' }}>
                                        @endif

                                        <label for="" class="form-check-label">{{ $technology->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('technologies')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>
    </div>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
