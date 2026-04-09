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

                <a href="{{ route('professional-request.index') }}"
                    class="px-4 py-2 bg-black text-primary-foreground rounded-md text-sm font-medium hover:bg-black/80 ">
                    {{ __('عرض الطلبات') }}</a>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($professionals->isEmpty())
                        <p>{{ __('No professionals found.') }}</p>
                    @else
                        <table class="w-full table-auto ">
                            <thead>
                                <tr class="text-right px-2 py-1">
                                    <th class="px-2 py-1">اسم المستخدم</th>
                                    <th class="px-2 py-1">البريد الإلكتروني</th>
                                    <th class="px-2 py-1">رقم الجوال</th>
                                    <th class="px-2 py-1">تاريخ التسجيل</th>
                                    <th class="px-2 py-1">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professionals as $professional)
                                    <tr class="border-t">
                                        <td class="px-2 py-2">
                                            <a href="{{ route('backoffice.users.show', $professional->id) }}"
                                                class="text-blue-600">{{ $professional->user->name }}</a>
                                        </td>
                                        <td class="px-2 py-2">{{ $professional->user->email }}</td>
                                        <td class="px-2 py-2">{{ $professional->phone_number }}</td>

                                        <td class="px-2 py-2">{{ $professional->created_at->diffForHumans() }}</td>
                                        <td class="text-xs text-muted">
                                            <p
                                                class="bg-green-400 animate-pulse text-green-700 font-bold px-2 py-1 rounded w-fit">
                                                تحت
                                                الصيانة</p>
                                        </td>

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
