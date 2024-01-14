import { AlpineComponent } from '@/ds/components/alpine'

export function props(el: HTMLElement): object {
  const $root = el.closest('[x-data]')
  const expression = $root?.getAttribute('x-props')

  if (!expression || !$root) return {}

  const cacheKey = `x-props:${expression}`

  const cache = window.ui.cache[cacheKey]

  if (cache) {
    return cache
  }

  const evaluated = window.Alpine.evaluate($root, expression)

  window.ui.cache[cacheKey] = evaluated

  return evaluated
}

export function watchProps(
  component: AlpineComponent,
  callback: CallableFunction,
): void {
  const observer = new MutationObserver((mutations) => {
    const wasChanged = mutations.some(
      (mutation) => mutation.attributeName === 'x-props',
    )

    if (wasChanged) {
      callback(mutations)
    }
  })

  observer.observe(component.$root, { attributes: true })

  component.$destroy(() => observer.disconnect())
}
