@if (session('createFailed'))
    <div class="alert alert-danger">
        <strong>{{ session('updateFailed') }}<strong>
    </div>
@elseif (session('createSuccess'))
    <div class="alert alert-success">
        <strong>{{ session('createSuccess') }}<strong>
    </div>
@endif
<!-- Bootstrap Modal: Create book-->
<div class="modal fade" id="createBookModal" tabindex="-1" role="dialog" aria-labelledby="createBookModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createBookModalLabel">Create book information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -21px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('books.store') }}">
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ __('Book Title') }}<span> *</span></label>
                            <input type="text" class="form-control autofocus @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Author') }}<span> *</span></label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required>
                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Publisher') }}<span> *</span></label>
                            <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher') }}" required>
                            @error('publisher')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Publish Date') }}<span> *</span></label>
                            <input type="text" id="datepicker" class="form-control @error('publish_date') is-invalid @enderror" name="publish_date" value="{{ old('publish_date') }}" required>
                            @error('publish_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Language') }}<span> *</span></label>
                            <select class="form-control @error('language') is-invalid @enderror" name="language" required>
                                <option value="English">English</option>
                                <option value="Vietnamese">Vietnamese</option>
                            </select>
                            @error('language')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Price') }}<span> *</span></label>
                            <input type="text" id="currency" placeholder="VNĐ" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                        <input type="submit" class="btn btn-success" value="Save changes">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.Modal -->
