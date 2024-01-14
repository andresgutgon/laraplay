import modal from './modal'

document.addEventListener('alpine:init', () => {
  window.Alpine.store('ui:modal', modal)
})
