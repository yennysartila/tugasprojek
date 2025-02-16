<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('QR Code Saya') }}
        </h2>
    </x-slot>

    <style>
        .qr-container {
            margin-top: 20px;
        }
        .qr-container img {
            border: 1px solid #ccc;
            padding: 10px;
            background: #f9f9f9;
        }
        .btn-generate {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-generate:hover {
            background-color: #45a049;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Buat Tanda Tangan Digital</h1>

                    <!-- Form Input -->
                    <form action="{{ route('qrku') }}" method="POST">
                        @csrf
                        <div>
                            <label for="data">Masukkan Data Tanda Tangan:</label>
                            <textarea name="data" id="data" rows="4" cols="50" required>{{ old('data', $data ?? '') }}</textarea>
                        </div>
                        <button type="submit" class="btn-generate">Generate QR Code</button>
                    </form>

                    <!-- Tampilkan QR Code jika ada -->
                    @if ($qrCode)
                        <div class="qr-container">
                            <h2>QR Code Tanda Tangan Digital</h2>
                            <p>Data yang diinput: <strong>{{ $data }}</strong></p>
                            {!! $qrCode !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
