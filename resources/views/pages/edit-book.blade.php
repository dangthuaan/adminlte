@if (session('updateFailed'))
    <div class="alert alert-danger">
        <strong>{{ session('updateFailed') }}<strong>
    </div>
@elseif (session('updateSuccess'))
    <div class="alert alert-success">
        <strong>{{ session('updateSuccess') }}<strong>
    </div>
@endif
<!-- Bootstrap Modal: Update book-->
<div class="modal fade" id="updateBookModal_{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="updateBookModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="updateBookModalLabel">Update book information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -21px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('books.update', ['book' => $book->id])}}">
                @csrf
                @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ __('Book Title') }}<span> *</span></label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror autofocus" name="title" value="{{ old('title') ?? $book->title }}" autocomplete="title" required>
                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Author') }}<span> *</span></label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') ?? $book->author }}" autocomplete="author" required>
                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Publisher') }}<span> *</span></label>
                            <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher') ?? $book->publisher }}" autocomplete="publisher" required>
                            @error('publisher')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Publish Date') }}<span> *</span></label>
                            <input type="text" id="datepicker" class="form-control @error('publish_date') is-invalid @enderror" name="publish_date" value="{{ old('publish_date') ?? $book->publish_date }}" autocomplete="publish_date" required>
                            @error('publish_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Language') }}<span> *</span></label>
                            <select class="form-control @error('language') is-invalid @enderror" name="language" autocomplete="language" required>
                                <option value="English" {{ $book->language == 'English' ? 'selected' : '' }}>English</option>
                                <option value="Vietnamese" {{ $book->language == 'Vietnamese' ? 'selected' : '' }}>Vietnamese</option>
                            </select>
                            @error('language')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Price') }}<span> *</span></label>
                            <input type="text" id="currency" placeholder="VNĐ" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $book->price }}" autocomplete="price" required>
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
