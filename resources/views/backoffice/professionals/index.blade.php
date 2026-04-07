<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('عرض المهنيين') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="my-4">

                <a href="{{ route('professional-request.create') }}"
                    class="px-4 py-2 bg-black text-primary-foreground rounded-md text-sm font-medium hover:bg-black/80 ">
                    {{ __('عرض الطلبات') }}</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($professionals->isEmpty())
                        <p>{{ __('No users found.') }}</p>
                    @else
                        {{-- Desktop Table --}}
                        {{-- <div class="hidden md:block">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr class="text-right">
                                        <th class="px-2 py-1">اسم المستخدم</th>
                                        <th class="px-2 py-1">المهنة</th>
                                        <th class="px-2 py-1">تاريخ الإضافة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($professionals as $professional)
                                        <tr class="border-t">
                                            <td class="px-2 py-2">
                                                {{ $professional->user->name }}
                                            </td>
                                            <td class="px-2 py-2">
                                                {{ $professional->profession->name ?? '-' }}
                                            </td>
                                            <td class="px-2 py-2">
                                                {{ $professional->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}

                        {{-- Mobile Cards --}}
                        {{-- <div class="md:hidden space-y-4">
                            @foreach ($professionals as $professional)
                                <div class="bg-gray-50 p-4 rounded-lg shadow">
                                    <p><span class="font-bold">الاسم:</span> {{ $professional->user->name }}</p>
                                    <p><span class="font-bold">المهنة:</span>
                                        {{ $professional->profession->name ?? '-' }}</p>
                                    <p><span class="font-bold">التاريخ:</span>
                                        {{ $professional->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        </div> --}}
                        <table class="w-full table-auto ">
                            <thead>
                                <tr class="text-right px-2 py-1">
                                    <th class="px-2 py-1">اسم المستخدم</th>
                                    <th class="px-2 py-1">البريد الإلكتروني</th>
                                    <th class="px-2 py-1">الدور</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professionals as $professional)
                                    <tr class="border-t">
                                        <td class="px-2 py-2">
                                            <a href="{{ route('backoffice.users.show', $user->id) }}"
                                                class="text-blue-600">{{ $professional->user()->name }}</a>
                                        </td>
                                        <td class="px-2 py-2">{{ $professional->profession_id }}</td>

                                        <td class="px-2 py-2">{{ $professional->created_at->diffForHumans() }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
