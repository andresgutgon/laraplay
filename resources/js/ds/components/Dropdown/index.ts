import { watchProps } from '@/ds/alpine/magic/props'
import Positionable, { Position } from '@/ds/alpine/modules/Positionable'
import { AlpineComponent } from '@/ds/components/alpine'

export default class Dropdown extends AlpineComponent {
  declare $refs: {
    triggerContainer: HTMLDivElement
    popover: HTMLDivElement
  }

  declare $props: {
    position: Position
  }

  positionable: Positionable = new Positionable()

  init() {
    this.positionable
      .toggleScrollbar(false)
      .mobilePositioning(true)
      .start(this, this.$refs.triggerContainer, this.$refs.popover)
      .position(this.$props.position)
      .offset(8)

    watchProps(this, () => {
      this.positionable.position(this.$props.position).computePosition()
    })
  }

  open() {
    this.positionable.open()
  }

  close() {
    this.positionable.close()
  }

  toggle() {
    this.positionable.toggle()
  }
}
