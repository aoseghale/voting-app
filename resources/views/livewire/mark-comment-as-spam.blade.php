<x-modal-confirm 
    {{-- event-to-open-modal="deleteCommentWasSet" --}}
    livewire-event-to-open-modal="markAsSpamCommentWasSet"
    event-to-close-modal="commentWasMarkedAsSpam"
    modal-title="Mark Comment as Spam"
    modal-description="Are you sure you want to mark this comment as spam?"
    modal-confirm-button-text="Mark as Spam"
    modal-confirm-button-wire-click="markAsSpam"
/>