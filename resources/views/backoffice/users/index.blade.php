<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('عرض المستخدمين') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-50 text-green-700 rounded-lg border border-green-200 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    @if ($users->isEmpty())
                        <p class="text-gray-500 text-center py-8">{{ __('No users found.') }}</p>
                    @else
                        {{-- ===== موبايل: بطاقات ===== --}}
                        <div class="flex flex-col gap-4 sm:hidden">
                            @foreach ($users as $user)
                                <div class="border border-gray-200 rounded-xl p-4 flex flex-col gap-3">

                                    {{-- الاسم والدور --}}
                                    <div class="flex items-center justify-between gap-2">
                                        <a href="{{ route('backoffice.users.show', $user->id) }}"
                                            class="font-semibold text-blue-600 text-base truncate">
                                            {{ $user->name }}
                                        </a>

                                        @if ($user->role === 'admin')
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded shrink-0">Admin</span>
                                        @elseif ($user->role === 'editor')
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded shrink-0">Editor</span>
                                        @else
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded shrink-0">Member</span>
                                        @endif
                                    </div>

                                    {{-- البريد والتاريخ --}}
                                    <div class="text-sm text-gray-500 flex flex-col gap-1">
                                        <span class="truncate">{{ $user->email }}</span>
                                        <span>{{ $user->created_at->diffForHumans() }}</span>
                                    </div>

                                    {{-- الإجراءات --}}
                                    @if ($user->role !== 'admin')
                                        <div class="flex gap-2 pt-1">
                                            <a href="{{ route('backoffice.users.show', $user->id) }}"
                                                class="flex-1 text-center bg-blue-700 hover:bg-blue-900 text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                                                ✎ عرض / تعديل
                                            </a>
                                            <form action="{{ route('backoffice.users.destroy', $user->id) }}"
                                                method="POST" class="flex-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-full bg-red-700 hover:bg-red-900 text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                                                    ✕ حذف
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-sm pt-1">لا توجد إجراءات</span>
                                    @endif

                                </div>
                            @endforeach
                        </div>

                        {{-- ===== ديسكتوب/تابلت: جدول ===== --}}
                        <div class="hidden sm:block overflow-x-auto">
                            <table class="w-full table-auto text-right">
                                <thead>
                                    <tr class="border-b border-gray-200 text-gray-600 text-sm">
                                        <th class="px-3 py-3 font-medium">اسم المستخدم</th>
                                        <th class="px-3 py-3 font-medium">البريد الإلكتروني</th>
                                        <th class="px-3 py-3 font-medium">الدور</th>
                                        <th class="px-3 py-3 font-medium">تاريخ التسجيل</th>
                                        <th class="px-3 py-3 font-medium">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="border-t border-gray-100 hover:bg-gray-50 transition">
                                            <td class="px-3 py-3">
                                                <a href="{{ route('backoffice.users.show', $user->id) }}"
                                                    class="text-blue-600 hover:underline font-medium">
                                                    {{ $user->name }}
                                                </a>
                                            </td>
                                            <td class="px-3 py-3 text-gray-600 text-sm">{{ $user->email }}</td>
                                            <td class="px-3 py-3">
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
                                            <td class="px-3 py-3 text-gray-500 text-sm whitespace-nowrap">
                                                {{ $user->created_at->diffForHumans() }}
                                            </td>
                                            <td class="px-3 py-3 whitespace-nowrap">
                                                @if ($user->role === 'admin')
                                                    <span class="text-gray-400 text-sm">لا توجد إجراءات</span>
                                                @else
                                                    <div class="flex items-center gap-2">
                                                        <a href="{{ route('backoffice.users.show', $user->id) }}"
                                                            class="inline-flex items-center gap-1 bg-blue-700 hover:bg-blue-900 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                                                            عرض / تعديل
                                                        </a>
                                                        <form
                                                            action="{{ route('backoffice.users.destroy', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="inline-flex items-center gap-1 bg-red-700 hover:bg-red-900 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
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
                        </div>

                    @endif
                </div>
            </div>

            {{-- Pagination --}}
            @if ($users->hasPages())
                <div class="mt-6 " dir="ltr">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
