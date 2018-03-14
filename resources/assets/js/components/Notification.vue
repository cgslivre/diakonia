<template>
  <div class="notification" v-text="message"></div>
</template>

<script>
export default {
  props: ['message']
}
</script>

<style>
    .notification{
        border: 1px solid #000000;
    }
</style>

