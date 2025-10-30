<div>
    <button 
        type="button" 
        data-modal-target="{{ $target ?? 'addStudentModal' }}" 
        data-modal-toggle="{{ $toggle ?? 'addStudentModal' }}"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        {{ $slot ?? '+ Add' }}
    </button>
</div>
