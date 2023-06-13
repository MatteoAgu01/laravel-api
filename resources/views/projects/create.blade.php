@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-4">
				<form action="{{ route('admin.projects.store') }}" method="POST" class="d-flex flex-column align-items-center">
					@csrf

					<div class="p-1  flex-column align-items-center">
						<label class="text-uppercase fw-bold" for="title">title</label>

						<input type="text" name="title" id="title" aria-describedby="titleHelp"
							class="form-control @error('title') is-invalid @enderror">

						<div id="titleHelp" class="form-text">
							<span>Inserisci il titolo del progetto</span>
						</div>

						@error('title')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>


					<div class="p-3 flex-column align-items-center">
						<label class="text-uppercase fw-bold" for="description">description</label>

						<input type="text" name="description" id="description" aria-describedby="descriptionHelp"
							class=" form-control @error('description') is-invalid @enderror">

						<div id="descriptionHelp" class="form-text">
							<span>Inserisci la descrizione</span>
						</div>

						@error('description')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>


					<div class="p-3 flex-column align-items-center">
						<label class="text-uppercase fw-bold" for="type_id">Type</label>

						<select name="type_id" id="type" class="form-control @error('type') is-invalid @enderror">
							<option value="">Select the project's type</option>
							@foreach ($types as $type)
								<option value="{{ $type->id }}">{{ $type->name }}</option>
							@endforeach
						</select>


						<div id="typeHelp" class="form-text">
							<span>Inserisci la categoria</span>
						</div>

						@error('type')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>

					<div class="form-group">
						<p>Choose technologies</p>
						<div class="d-flex flex-wrap align-items-center w-100 py-4">
							@foreach ($technologies as $technology)
								<div>
									<input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input"
										{{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
									<label for="" class="form-check-label">{{ $technology->name }}</label>
								</div>
							@endforeach
						</div>
						@error('technologies')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>


					<div class="d-flex gap-1 justify-content-center">
						<button type="submit" class="btn btn-success">Submit</button>
						<button type="reset" class="btn btn-warning">Reset</button>
					</div>

				</form>
			</div>
		</div>
	</div>
@endsection
