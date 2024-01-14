import kebabCase from 'lodash.kebabcase'

window.$openModal = (name: string) => {
  return window.dispatchEvent(new Event(`open-ui-modal:${kebabCase(name)}`))
}

window.$closeModal = (name: string) => {
  return window.dispatchEvent(
    new Event(`close-ui-wireui-modal:${kebabCase(name)}`),
  )
}
