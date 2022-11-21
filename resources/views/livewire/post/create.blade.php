<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('post.title') ? 'invalid' : '' }}">
        <label class="form-label" for="company_name">Title</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="post.title" required>
        <div class="validation-message">
            {{ $errors->first('post.title') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.description') ? 'invalid' : '' }}">
        <label class="form-label" for="company_address">Description</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="post.description">
        <div class="validation-message">
            {{ $errors->first('post.description') }}
        </div>
    </div>
    
    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>