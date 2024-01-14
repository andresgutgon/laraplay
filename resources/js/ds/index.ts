// Things that put functions or variables in Window global scope
import './global'
import './browserSupport'

// Alpine
import './alpine/magic'
import './alpine/store'
import './alpine/directives'

// Components
import { Alpine } from './components/alpine'

import { UiHooks } from '@/ds/hooks'

export interface UI { }

declare global {
  interface Window {
    Alpine: Alpine
    Livewire: any
    $ui: UI
    ui: UiHooks
    $openModal: CallableFunction
    $closeModal: CallableFunction
  }
}

const ui: UI = {}

window.$ui = ui

export default ui
