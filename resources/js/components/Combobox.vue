<template>
  <v-combobox class="custom-combobox" v-model="select" label="Keywords" multiple chips outlined deletable-chips style="border-radius:0" :open-on-clear="true" placeholder="type your keywords"></v-combobox>
</template>

<script>
export default {
  data() {
    return {
      select: [],
    };
  }
};
</script>

<style>
.theme--light.v-chip:not(.v-chip--active) {
    background: #E8EAF6;
}
.v-chip .v-chip__content {
    color: #3949AB;
}
.theme--light.v-icon {
    color: #9FA8DA;
}
.custom-combobox .v-input__append-inner {
    display: none;
}
</style>