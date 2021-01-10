<template>
  <div class="modal">
    <div class="modal-head">
      <slot name="modal-header"></slot>
    </div>
    <div class="modal-body">
      <slot name="modal-body"></slot>
    </div>
    <div class="modal-footer">
      <slot name="midal-footer"></slot>
    </div>
  </div>
</template>

<script>

export default {
  name: 'modal-component'
}

</script>