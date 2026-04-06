<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('عرض المستخدمين') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($users->isEmpty())
                        <p>{{ __('No users found.') }}</p>
                    @else
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="text-right px-2 py-1">
                                    <th class="px-2 py-1">اسم المستخدم</th>
                                    <th class="px-2 py-1">البريد الإلكتروني</th>
                                    <th class="px-2 py-1">الدور</th>
                                    <th class="px-2 py-1">تاريخ التسجيل</th>
                                    <th class="px-2 py-1">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="border-t">
                                        <td class="px-2 py-2">
                                            <a href="{{ route('backoffice.users.show', $user->id) }}"
                                                class="text-blue-600">{{ $user->name }}</a>
                                        </td>
                                        <td class="px-2 py-2">{{ $user->email }}</td>
                                        <td class="px-2 py-2">
                                            @if ($user->role === 'admin')
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Admin</span>
                                            @elseif ($user->role === 'editor')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Editor</span>
                                            @else
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Member</span>
                                            @endif
                                        </td>
                                        <td class="px-2 py-2">{{ $user->created_at->diffForHumans() }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            @if ($user->role === 'admin')
                                                <span class="text-gray-500 text-sm">No actions</span>
                                            @else
                                                <div class="flex items-center gap-2">

                                                    {{-- edit --}}
                                                    <a href="{{ route('backoffice.users.show', $user->id) }}"
                                                        class="inline-flex items-center gap-1 bg-blue-700 hover:bg-blue-900 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                                                        ✎ عرض / تعديل
                                                    </a>


                                                    {{-- delete --}}
                                                    <form action="{{ route('backoffice.users.destroy', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button
                                                            class="inline-flex items-center gap-1 bg-red-700 hover:bg-red-900 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                                                            ✕ حذف
                                                        </button>
                                                    </form>

                                                </div>
                                            @endif

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
