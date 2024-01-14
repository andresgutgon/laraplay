import { ModalStore } from '@/ds/alpine/store/modal'
import { $Wire } from '@/ds/livewire'

export interface DirectiveUtilities {
  Alpine: Alpine
  effect: () => void
  cleanup: (callback: CallableFunction) => void
  evaluate: (expression: string) => any
  evaluateLater: (expression: string) => (result: any) => void
}

export interface DirectiveParameters {
  value: string
  modifiers: string[]
  expression: string
  original: string
  type: string
}

export interface Alpine {
  raw(data: any): any
  data(name: string, data: any): void
  store(name: 'ui:modal', data?: ModalStore): ModalStore
  evaluate(scope: any, expression: string): any
  magic(name: string, callback: (el: HTMLElement) => any): void
  directive(
    name: string,
    handler: (
      el: Node,
      directive: DirectiveParameters,
      utilities: DirectiveUtilities,
    ) => void,
  ): void
  effect(callback: () => void): void
}

export abstract class AlpineComponent {
  declare $wire: $Wire
  declare $el: HTMLElement
  declare $root: HTMLElement
  declare $refs: { [name: string]: HTMLElement }
  declare $nextTick: (callback: CallableFunction) => void
  declare $dispatch: (name: string, value: any) => void
  declare $watch: (name: string, callback: CallableFunction) => void
  declare $props: any

  protected skipWatchers: { [name: string]: boolean } = {}

  protected destroyCallbacks: CallableFunction[] = []

  init?(): void

  protected $safeWatch(property: string, callback: CallableFunction): void {
    this.$watch(property, (value: string) => {
      if (this.skipWatchers[property]) {
        this.skipWatchers[property] = false

        return
      }

      callback(value)
    })
  }

  protected $skipNextWatcher(
    property: string,
    callback: CallableFunction,
  ): void {
    this.skipWatchers[property] = true

    callback()

    this.$nextTick(() => {
      this.skipWatchers[property] = false
    })
  }

  $destroy(callback: CallableFunction): void {
    this.destroyCallbacks.push(callback)
  }

  destroy(): void {
    this.destroyCallbacks.forEach((callback) => callback())
  }
}
