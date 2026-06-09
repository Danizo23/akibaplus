<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Edit Staff Member') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                @if($errors->any())
                    <div class="rounded-2xl bg-rose-500/10 border border-rose-400/20 text-rose-100 p-4 mb-6">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="bg-white/10 backdrop-blur-md rounded-3xl shadow-xl p-6">
                    <form method="POST" action="{{ route('manager.staff.update', $user) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label class="block text-sm font-semibold text-cyan-200 mb-2">Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-950/80 px-4 py-3 text-white" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-cyan-200 mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-950/80 px-4 py-3 text-white" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-cyan-200 mb-2">Role</label>
                            <select name="role" class="w-full rounded-2xl border border-slate-700 bg-slate-950/80 px-4 py-3 text-white" required>
                                @foreach($roleOptions as $roleValue => $roleLabel)
                                    <option value="{{ $roleValue }}" {{ old('role', $user->role) === $roleValue ? 'selected' : '' }}>{{ $roleLabel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <a href="{{ route('manager.staff.index') }}" class="inline-flex items-center justify-center rounded-2xl bg-slate-700 px-6 py-3 text-sm font-semibold text-white hover:bg-slate-600">Cancel</a>
                            <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-cyan-500 px-6 py-3 text-sm font-semibold text-white hover:bg-cyan-400">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
