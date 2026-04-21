<div x-data="companyModal()" class="">
    <x-app-layout>
        <div class="py-10">
            <div class="section-container">

                <div class="mb-8">
                    <h1 class="text-3xl font-bold">جميع الشركات</h1>
                    <p class="text-muted-foreground mt-2">
                        إدارة الشركات المعتمدة داخل النظام
                    </p>
                </div>

                @if (session('success'))
                    <div class="mb-6 bg-green-100 text-green-700 p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="glass-card overflow-hidden">
                    <table class="w-full text-sm">

                        <thead class="border-b bg-muted/30">
                            <tr>
                                <th class="p-4 text-right">الاسم</th>
                                <th class="p-4 text-right">الوصف</th>
                                <th class="p-4 text-right">العنوان</th>
                                <th class="p-4 text-right">الهاتف</th>
                                <th class="p-4 text-center">الإجراءات</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($companies as $company)
                                <tr class="border-b">

                                    <td class="p-4 font-bold">
                                        {{ $company->name }}
                                    </td>

                                    <td class="p-4 text-muted-foreground">
                                        {{ $company->description }}
                                    </td>

                                    <td class="p-4">
                                        {{ $company->address }}
                                    </td>

                                    <td class="p-4">
                                        {{ $company->phone }}
                                    </td>

                                    <td class="p-4">
                                        <div class="flex justify-center gap-2">
                                            {{-- EDIT --}}
                                            {{-- <a href="{{ route('backoffice.businesses.edit', $company->id) }}"
                                            class="px-3 py-1 bg-blue-600 text-white rounded">
                                            تعديل
                                        </a> --}}

                                            {{-- EDIT --}}
                                            <button @click="open({{ Js::from($company) }})"
                                                class="px-3 py-1 bg-blue-600 text-white rounded text-sm font-medium hover:bg-blue-700 transition">
                                                تعديل
                                            </button>

                                            {{-- DELETE --}}
                                            <form method="POST"
                                                action="{{ route('backoffice.businesses.destroy', $company->id) }}"
                                                class="m-0 p-0">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-600 text-white rounded text-sm font-medium hover:bg-red-700 transition">
                                                    حذف
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

        {{-- Edit Modal --}}
        <div x-show="isOpen" x-transition class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center"
            style="display: none;">

            <div class="bg-white rounded-2xl p-8 w-full max-w-xl">

                {{-- Header --}}
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">تعديل الشركة</h2>

                    <button @click="close()" class="text-gray-500 hover:text-black">
                        ✕
                    </button>
                </div>

                {{-- Form --}}
                <form :action="`/admin/businesses/${company.id}`" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm mb-1">اسم الشركة</label>
                            <input type="text" name="name" x-model="company.name"
                                class="w-full rounded-xl border px-4 py-3">
                        </div>

                        {{-- Description --}}
                        <div>
                            <label class="block text-sm mb-1">الوصف</label>
                            <textarea name="description" x-model="company.description" class="w-full rounded-xl border px-4 py-3"></textarea>
                        </div>

                        {{-- Address --}}
                        <div>
                            <label class="block text-sm mb-1">العنوان</label>
                            <input type="text" name="address" x-model="company.address"
                                class="w-full rounded-xl border px-4 py-3">
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label class="block text-sm mb-1">الهاتف</label>
                            <input type="text" name="phone" x-model="company.phone"
                                class="w-full rounded-xl border px-4 py-3">
                        </div>

                        <button type="submit" class="w-full rounded-xl bg-primary text-white py-3">
                            حفظ التعديلات
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </x-app-layout>
    <script>
        function companyModal() {
            return {
                isOpen: false,
                company: {},

                open(data) {
                    this.company = data
                    this.isOpen = true
                },

                close() {
                    this.isOpen = false
                    this.company = {}
                }
            }
        }
    </script>
</div>
