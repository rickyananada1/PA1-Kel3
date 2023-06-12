<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil '.ucfirst($tipe_akun)) }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Silahkan mengubah informasi $tipe_akun anda disini") }}
        </p>
    </header>

@switch($user->tipe_akun)
        @case(0)
            <form method="post" action="{{ route('entity.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="nama_unit" :value="__('Nama Unit')" />
                    <x-text-input value="{{ $data->nama_unit }}" id="nama_unit" class="block mt-1 w-full" type="text" name="nama_unit" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input-label for="alamat_unit" :value="__('Alamat Unit')" />
                    <x-text-input id="alamat_unit" value="{{ $data->alamat_unit }}" class="block mt-1 w-full" type="text" name="alamat_unit" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input-label for="kecamatan_unit" :value="__('Nama kecamatan Unit')" />
                    <x-text-input id="kecamatan_unit" value="{{ $data->kecamatan_unit }}" class="block mt-1 w-full" type="text" name="kecamatan_unit" required autofocus />
                </div>


                <div class="block mt-4">
                    <x-primary-button class="btn btn-sm btn-success">
                        {{ __('Ubah Informasi unit!') }}
                    </x-primary-button>
                </div>
            </form>
            @break
            @case(1)
            <form method="post" action="{{ route('entity.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="nama_nasabah" :value="__('Nama Nasabah')" />
                    <x-text-input id="nama_nasabah" value="{{ $data->nama_nasabah }}" class="block mt-1 w-full" type="text" name="nama_nasabah" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input-label for="no_rekening" :value="__('Nomor Rekening Nasabah')" />
                    <x-text-input id="no_rekening" value="{{ $data->no_rekening }}" class="block mt-1 w-full" type="number" name="no_rekening" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input-label for="alamat_nasabah" :value="__('Alamat Nasabah')" />
                    <x-text-input id="alamat_nasabah" value="{{ $data->alamat_nasabah }}" class="block mt-1 w-full" type="text" name="alamat_nasabah" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input-label for="nik_nasabah" :value="__('NIK Nasabah')" />
                    <x-text-input id="nik_nasabah" value="{{ $data->nik_nasabah }}" minlength="12" maxlength="12" class="block mt-1 w-full" type="text" name="nik_nasabah" required autofocus />
                </div>

                <div class="block mt-4">
                    <x-primary-button class="btn btn-sm btn-success">
                        {{ __('Simpan Perubahan!') }}
                    </x-primary-button>
                </div>
            </form>
        @break
        @default
            <p>anda tidak memiliki data tambahan diakun anda, halaman ini tidak tersedia untuk anda</p>
        @break
    @endswitch

</section>
