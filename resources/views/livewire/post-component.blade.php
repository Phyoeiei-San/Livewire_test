
<div class="container mt-4">
    <h2>{{ $isUpdate ? 'Edit Post' : 'Create Post' }}</h2>

    {{-- <form wire:submit.prevent="store"> --}}
        <div class="form-group mb-3">
            <label for="title">Post Title</label>
            <input type="text" id="title" wire:model="title" class="form-control" placeholder="Post Title">
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="body">Post Body</label>
            <textarea id="body" wire:model="body" class="form-control " placeholder="Post Body" rows="5"></textarea>
            @error('body') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button wire:click="store" class="btn btn-primary">
            {{ $isUpdate ? 'Update' : 'Create' }}
        </button>
    {{-- </form> --}}

    <hr>

    <h2>Posts</h2>
    <ul class="list-group">
        @foreach($posts as $post)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $post->title }}</strong>
                    <p>{{ $post->body }}</p>
                </div>
                <div>
                    <button wire:click="edit({{ $post->id }})" class="btn btn-sm btn-warning">Edit</button>
                    <button wire:click="delete({{ $post->id }})" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
