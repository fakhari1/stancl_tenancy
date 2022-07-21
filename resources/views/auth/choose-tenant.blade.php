@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="width: 50%">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('user.tenants.store', auth()->user()) }}">
                    @csrf

                    <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Select/Change a tenant')"/>

                            <select id="tenant"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text"
                                    name="tenant">
                                @forelse($tenants as $tenant)
                                    <option>Select one tenant</option>
                                    <option value="{{ $tenant->id }}"
                                            @if(auth()->user()->tenant_id == $tenant->id) selected @endif >{{ $tenant->id }}</option>
                                @empty
                                    <option value="-10000">No tenant exists</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Continue & save tenant') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
