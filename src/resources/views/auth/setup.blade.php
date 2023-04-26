<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1>Mohon melengkapi info akun sebelum melanjutkan</h1> <br>

    <form method="POST" action="/setup">
        @csrf

        <!--- if else based on the data type --->
        @switch($tipe)
            @case(0)
                <!-- You are register as unit! -->
                <div>
                    <x-input-label for="nama_unit" :value="__('Nama Unit')" />
                    <x-text-input id="nama_unit" class="block mt-1 w-full" type="text" name="nama_unit" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input-label for="alamat_unit" :value="__('Alamat Unit')" />
                    <x-text-input id="alamat_unit" class="block mt-1 w-full" type="text" name="alamat_unit" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input-label for="kecamatan_unit" :value="__('Nama kecamatan Unit')" />
                    <x-text-input id="kecamatan_unit" class="block mt-1 w-full" type="text" name="kecamatan_unit" required autofocus />
                </div>

                <input type="hidden" value="0" name="tipe">

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                @break

            @case(1)
                <div>
                    <x-input-label for="nama_nasabah" :value="__('Nama Nasabah')" />
                    <x-text-input id="nama_nasabah" class="block mt-1 w-full" type="text" name="nama_nasabah" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="no_rekening" :value="__('Nomor Rekening Nasabah')" />
                    <x-text-input id="no_rekening" class="block mt-1 w-full" type="number" name="no_rekening" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="alamat_nasabah" :value="__('Alamat Nasabah')" />
                    <x-text-input id="alamat_nasabah" class="block mt-1 w-full" type="text" name="alamat_nasabah" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="nik_nasabah" :value="__('NIK Nasabah')" />
                    <x-text-input id="nik_nasabah" class="block mt-1 w-full" type="text" name="nik_nasabah" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <input type="hidden" value="1" name="tipe">

                <div class="mt-4">
                    <x-input-label for="nasabah_of" :value="__('Unit yang dipilih')" />

                    <select required name="nasabah_of" class='form-select'>
                        <!--- there will be list of nasabahs -->
                        @foreach($unit as $u)
                            <option value="{{ $u["id"] }}">{{ $u["nama_unit"]  }}</option>
                        @endforeach
                    </select>
                </div>
                @break

            @default
                <p>abooga</p>
                @break
        @endswitch

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn btn-success fw-bold">
                {{ "Siapkan akun ".($tipe == 0 ? "unit" : ($tipe == 1 ? "nasabah" : ""))}}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.getElementById("")
    </script>
</x-guest-layout>
