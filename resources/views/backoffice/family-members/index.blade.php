<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">إدارة شجرة العائلة</h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">إدارة شجرة العائلة</h1>

                <a href="{{ route('family-members.create') }}"
                    class="bg-primary flex items-center gap-1.5 text-white px-4 py-2 rounded-lg">
                    <x-icons.pencil /> إضافة فرد
                </a>
            </div>

            <div class="bg-white rounded-lg shadow p-4">

                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="text-right p-2">الاسم</th>
                            <th class="text-right p-2">الأب</th>
                            <th class="text-right p-2">إجراءات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($members as $member)
                            <tr class="border-b">
                                <td class="p-2">{{ $member->name }}</td>
                                <td class="p-2">
                                    {{ $member->parent?->name ?? '-' }}
                                </td>
                                <td class="p-2 flex gap-2">

                                    <a href="{{ route('family-members.edit', $member->id) }}" class="text-blue-500">
                                        تعديل
                                    </a>

                                    <form action="{{ route('family-members.destroy', $member->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-red-500">
                                            حذف
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
