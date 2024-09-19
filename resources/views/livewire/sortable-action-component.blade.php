<div>
    <button 
        @class([
            'inline-block w-full px-2 py-2 mb-0 font-bold text-white text-center text-black uppercase transition-all ease-in border-0 border-white rounded-lg shadow-soft-md bg-150 leading-pro text-xs hover:shadow-soft-2xl hover:scale-102',
            'bg-nephritis' => !$hasSortOrder,
            'bg-alizarin' => $hasSortOrder,
        ])
        wire:click="sort()"
        >
        <div class="flex gap-2">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                    <path d="M12 0L8 6L11 6L11 11L6 11L6 8L0 12L6 16L6 13L11 13L11 18L8 18L12 24L16 18L13 18L13 13L18 13L18 16L24 12L18 8L18 11L13 11L13 6L16 6L12 0 z" fill="#FFFFFF" />
                </svg>
            </span>
            <span class="fi-btn-label">
                {{ !$hasSortOrder ? __('filasortable::filasortable.Enable') : __('filasortable::filasortable.Disable') }}
            </span>
            <span wire:loading wire:target="sort">
                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin fi-btn-icon transition duration-75 h-5 w-5 text-white">
                    <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                </svg>
            </span>
        </div>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.querySelector('.fi-ta-table tbody');

        var sortable = Sortable.create(el, {
            animation: 200,  // Smooth animation for sorting
            handle: '.fi-ta-row',  // Define draggable row
            ghostClass: 'sortable-ghost',  // Ghost element class
            chosenClass: 'sortable-chosen',  // Chosen (dragging) row class

            onEnd: function (evt) {
                evt.oldValue = el.children[evt.oldIndex].querySelector('.fi-checkbox-input').value;
                // Capture the new value after moving, using the checkbox value
                evt.newValue = el.children[evt.newIndex].querySelector('.fi-checkbox-input').value;

                console.log('Row moved from', evt.oldValue, 'to', evt.newValue);

                // Get the updated item values for the current page using the checkbox value
                let itemValues = Array.from(el.children).map(row => row.querySelector('.fi-checkbox-input').value);
                console.log(itemValues);

                // Call Livewire to update the order with the old and new values and the array of item values
                @this.call('updateSortOrder', itemValues);
            }
        });
    });
</script>
