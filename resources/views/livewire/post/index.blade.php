<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                {{ __('Delete Selected') }}
            </button>

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay class="col-12 alert alert-info">
        Loading...
    </div>
    <table class="table table-index w-full">
        <thead>
            <tr>
                <th class="w-9">
                </th>
                <th class="w-28">
                    {{ trans('cruds.contactCompany.fields.id') }}
                    @include('components.table.sort', ['field' => 'id'])
                </th>
                <th>
                    Title
                    @include('components.table.sort', ['field' => 'title'])
                </th>
                <th>
                    Description
                    @include('components.table.sort', ['field' => 'description'])
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($contactCompanies as $contactCompany)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $contactCompany->id }}" wire:model="selected">
                    </td>
                    <td>
                        {{ $contactCompany->id }}
                    </td>
                    <td>
                        {{ $contactCompany->title }}
                    </td>
                    <td>
                        {{ $contactCompany->description }}
                    </td>
                    <td>
                        <div class="flex justify-end">
                            @can('post_show')
                                <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.posts.show', $contactCompany) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endcan
                            @can('post_edit')
                                <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.posts.edit', $contactCompany) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan
                            @can('post_delete')
                                <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $contactCompany->id }})" wire:loading.attr="disabled">
                                    {{ trans('global.delete') }}
                                </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">No entries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $contactCompanies->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush