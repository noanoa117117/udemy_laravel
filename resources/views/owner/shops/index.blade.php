<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    @foreach ($shops as $shop)
                        <div class="w-1/3 p-4">
                            <a href="{{ route('owner.shops.edit', ['shop' => $shop->id]) }}">
                                <div class="rounded-md border p-4">
                                    <div class="mb-4">
                                        @if ($shop->is_selling)
                                            <span class="rounded-md border bg-blue-400 p-2 text-white">販売中</span>
                                        @else
                                            <span class="rounded-md border bg-red-400 p-2 text-white">停止中</span>
                                        @endif
                                    </div>
                                    <div class="test-xl">{{ $shop->name }}</div>
                                    @if (empty($shop->filename))
                                        <img src="{{ asset('images/noImage.jpg') }}">
                                    @else
                                        <img src="{{ asset('storage/shops/' . $shop->filename) }}">
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
