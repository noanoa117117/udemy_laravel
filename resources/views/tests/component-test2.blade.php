<x-tests.app>
    <x-slot name="header">ヘッダー2</x-slot>
    コンポーネントテスト2

    <x-test-class-base classBaseMessage='message' />
    <div class="mb-4"></div>
    <x-test-class-base classBaseMessage='message' defaultMessage='初期値から変更' />
</x-tests.app>