<x-layouts.admin title="Kelola Studio">
<div class="flex items-center justify-between mb-6">
    <a href="/admin/studios/create" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90">
        + Tambah Studio
    </a>
</div>

<div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                    <th class="px-6 py-4 font-medium">Studio</th>
                    <th class="px-6 py-4 font-medium">Bioskop</th>
                    <th class="px-6 py-4 font-medium">Tipe</th>
                    <th class="px-6 py-4 font-medium">Kapasitas</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <!-- Studio 1 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 text-white font-medium">Studio 1</td>
                    <td class="px-6 py-4 text-gray-300">Cinema XXI Gandaria City</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-purple-500/20 text-purple-400 text-xs rounded-full">Regular 2D</span>
                    </td>
                    <td class="px-6 py-4 text-gray-300">150 kursi (10x15)</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Aktif</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/studios/1/edit" class="p-2 text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Studio 2 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 text-white font-medium">Studio 2</td>
                    <td class="px-6 py-4 text-gray-300">Cinema XXI Gandaria City</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-purple-500/20 text-purple-400 text-xs rounded-full">Regular 2D</span>
                    </td>
                    <td class="px-6 py-4 text-gray-300">120 kursi (10x12)</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Aktif</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/studios/2/edit" class="p-2 text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Studio 3 IMAX -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 text-white font-medium">Studio 3</td>
                    <td class="px-6 py-4 text-gray-300">Cinema XXI Gandaria City</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-purple-500/20 text-purple-400 text-xs rounded-full">IMAX</span>
                    </td>
                    <td class="px-6 py-4 text-gray-300">200 kursi (10x20)</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Aktif</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/studios/3/edit" class="p-2 text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Studio 4 Premiere -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 text-white font-medium">Velvet</td>
                    <td class="px-6 py-4 text-gray-300">CGV Grand Indonesia</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-purple-500/20 text-purple-400 text-xs rounded-full">Premiere</span>
                    </td>
                    <td class="px-6 py-4 text-gray-300">50 kursi (5x10)</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-red-500/20 text-red-400 text-xs rounded-full">Nonaktif</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/studios/4/edit" class="p-2 text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-white/10">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-400">Menampilkan 1 - 4 dari 4 studio</p>
            <div class="flex gap-2">
                <button class="px-3 py-1 bg-[#e50914] rounded text-white">1</button>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>