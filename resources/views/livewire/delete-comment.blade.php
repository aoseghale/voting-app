<x-modal-confirm 
    {{-- event-to-open-modal="deleteCommentWasSet" --}}
    livewire-event-to-open-modal="deleteCommentWasSet"
    event-to-close-modal="commentWasDeleted"
    modal-title="Delete Comment"
    modal-description="Are you sure you want to delete this comment? This action cannot be undone."
    modal-confirm-button-text="Delete"
    modal-confirm-button-wire-click="deleteComment"
/>