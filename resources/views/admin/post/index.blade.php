@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Post List
            </h6>

            @can('contact_company_create')
                <a class="btn btn-indigo" href="{{ route('admin.posts.create') }}">
                    ADD POST
                </a>
            @endcan
        </div>
    </div>
    @livewire('post.index')

</div>
@endsection