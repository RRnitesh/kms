{{-- resources/views/admin/pages/knowledge/create.blade.php --}}

@extends('admin.main.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Knowledge Entry</h3>
                        </div>

                        <form action="{{ route('knowledge.store') }}" method="POST">
                            @csrf
                            <div class="card-body">

                                {{-- Topic Select --}}
                                <div class="form-group">
                                    <label for="topic">Select Topic</label>
                                    <select name="topic_id" id="topic" class="form-control @error('topic_id') is-invalid @enderror"
                                        required>
                                        <option value="">-- Select Topic --</option>
                                        @foreach ($topics as $topic)
                                            <option value="{{ $topic->id }}"
                                                {{ old('topic_id') == $topic->id ? 'selected' : '' }}>
                                                {{ $topic->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('topic_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Subtopic Select --}}
                                <div class="form-group">
                                    <label for="sub_topic">Select Subtopic</label>
                                    <select name="sub_topic_id" id="sub_topic" class="form-control @error('sub_topic_id') is-invalid @enderror" required>
                                        <option value="">-- Select Subtopic --</option>
                                        {{-- Options will be loaded dynamically with AJAX --}}
                                    </select>
                                </div>

                                {{-- Title --}}
                                <div class="form-group">
                                    <label for="title">Knowledge Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Enter Title" required value="{{ old('title') }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Content --}}
                                <div class="form-group">
                                    <label for="content">Knowledge Content</label>
                                    <textarea name="content" id="content" rows="6" class="form-control" placeholder="Enter detailed content..."
                                        required value="{{ old('content') }}"></textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            {{-- File Uploads --}}
                            <div class="form-group">
                                <label for="attachments">Attach Files / Screenshots</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="attachments[]" class="custom-file-input"
                                            id="attachments" multiple>
                                        <label class="custom-file-label" for="attachments">Choose files</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-paperclip"></i></span>
                                    </div>
                                </div>
                                <small class="form-text text-muted">You can select multiple images or files (PDF, DOCX, PNG,
                                    etc.)</small>
                                @error('attachments')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Additional URLs --}}
                            <div class="form-group">
                                <label for="reference_urls">Reference URLs (optional)</label>
                                <div id="url-fields">
                                    <div class="input-group mb-2">
                                        <input type="url" name="reference_urls[]" class="form-control"
                                            placeholder="https://example.com">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary add-url">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @error('reference_urls')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Submit
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        window.subtopicsByTopicUrl = "{{ route('topic.getSubTopic') }}";
    </script>
    <script src="{{ asset('asset/js/knowledge.js') }}"></script>
@endsection
