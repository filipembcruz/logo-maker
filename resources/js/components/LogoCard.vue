<template>
  <v-row class="px-5">
    <v-overlay :value="overlay" opacity="100" color="white" absolute>
      <v-progress-circular indeterminate size="150" width="10" color="#3F51B5"></v-progress-circular>
    </v-overlay>
    <v-col cols="12" md="4" sm="6" v-for="icon in icons" :key="icon.id" class="pa-5">
      <v-card
        :id="'logo_'+icon.id"
        class="card-logo pt-8 pb-5"
        outlined
        @click="downloadImage('#logo_'+icon.id)"
      >
        <img :src="icon.url" style="max-height: 80px;" class="mx-auto d-block" />
        <v-card-subtitle
          class="card-logo text-center"
          v-text="company"
          style="text-transform: capitalize;"
        ></v-card-subtitle>
      </v-card>
      <div id="previewImage"></div>
    </v-col>
  </v-row>
</template>

<script>
import axios from "axios";
import html2canvas from "html2canvas";

export default {
  props: {
    url: String
  },
  mounted() {
    this.company = localStorage.getItem("company");
    this.getIcons();
    this.$root.$on("updateIcons", () => {
      this.getIcons();
    });
  },
  data() {
    return {
      icons: [],
      overlay: false,
      allTerms: [],
      limit: 6,
      page: 0
    };
  },
  methods: {
    getIcons: function() {
      let self = this;
      let term = self.getKeyword();
      self.overlay = true;
      self.page++;
      let endpoint = `${self.url}/generate/${term}/${self.page}/${self.limit}`;

      axios
        .get(endpoint)
        .then(function(response) {
          self.icons = response.data.icons;
          setTimeout(() => {
            self.overlay = false;
          }, 800);
        })
        .catch(function(error) {
          self.page = 0;
          self.overlay = false;
          console.error("error", error);
        });
    },
    getKeyword: function() {
      let self = this;
      let keywords = localStorage.getItem("keyword");

      if (keywords.includes(",") && self.allTerms.length <= 0) {
        self.allTerms = keywords.split(",");
        let term = self.allTerms[0];
        self.allTerms.shift();
        return term;
      }
      if (!keywords.includes(",")) {
        return keywords;
      }

      let term = self.allTerms[0];
      self.allTerms.shift();
      self.page--;
      return term;
    },
    downloadImage(id) {
      html2canvas(document.querySelector(id), {
        width: 2000,
        height: 2000,
        useCORS: true,
      }).then(function(canvas) {
        console.log(canvas);
        
        var link = document.createElement("a");
        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        link.href = canvas.toDataURL("image/png");
        link.download = "somefilename.png";
        link.click();
      });
    }
  }
};
</script>

<style>
.v-card__subtitle.card-logo {
  font-family: "Quicksand", sans-serif;
  font-weight: bold;
  font-size: 24px;
  line-height: 30px;
  color: #000000 !important;
}
</style>