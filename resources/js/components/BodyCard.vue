<template>
  <v-content>
    <v-container style="position: relative;top: -200px;max-width: 85%;">
      <v-row justify="center">
        <v-col cols="12" :sm="colsm" :md="colmd">
          <v-card
            class="pa-sm-10 pa-md-12 pb-11"
            :style="'box-shadow: 0px 9px 46px rgba(63, 81, 181, 0.16);border-bottom-right-radius: 0; border-bottom-left-radius: 0;' + css ? css : ''"
          >
            <slot></slot>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-content>
</template>

<script>
export default {
  props: {
    colsm: String,
    colmd: String,
    css: String,
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