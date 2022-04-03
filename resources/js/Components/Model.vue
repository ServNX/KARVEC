<template>
  <div>
    <button @click="$emit('update:modelValue', true)"
            :class="`btn ${as === 'button' ? 'btn-dark' : 'btn-link'} text-primary`"
    >
      {{ name ?? title }}
    </button>
    <div :class="`modal fade ${modelValue ? 'show' : null} bg-dark bg-opacity-50`"
         :style="`display: ${modelValue ? 'block' : 'none'}`"
         tabindex="-1"
         aria-modal="true"
         role="dialog"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-dark text-primary">
            <h5 class="modal-title">{{ title }}</h5>
          </div>
          <div class="modal-body">
            <slot></slot>
          </div>
          <div class="modal-footer">
            <button @click="$emit('update:modelValue', false)" class="btn btn-dark-secondary">Close</button>
            <slot name="buttons"></slot>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>

</style>

<script>
export default {
  name: 'Model',
  props: {
    modelValue: { type: Boolean },
    as: { type: String, default: 'button' },
    name: { type: String, default: null },
    title: { type: String, required: true },
  },
};
</script>
