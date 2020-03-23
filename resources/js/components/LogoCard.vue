<template>
  <v-row class="px-5">
    <v-overlay :value="overlay" opacity="100" color="white" absolute>
      <v-progress-circular indeterminate size="150" width="10" color="#3F51B5"></v-progress-circular>
    </v-overlay>
    <v-col cols="12" md="4" sm="6" v-for="icon in icons" :key="icon.id" class="pa-5">
      <v-card
        class="card-logo pt-8 pb-5"
        outlined
        @click="downloadImage(icon.url)"
        style="min-height: 185px;"
      >
        <div>
          <v-img style="max-height: 65px;" :src="icon.url" class="mx-auto d-block" />
        </div>
        <v-card-subtitle
          class="card-logo text-center"
          v-text="company"
          style="text-transform: capitalize;"
        ></v-card-subtitle>
      </v-card>
    </v-col>

    <div id="current_logo">
      <img :src="currentLogo" class="mx-auto d-block" />
      <h1 class="card-logo" v-text="company"></h1>
    </div>
  </v-row>
</template>

<script>
import axios from "axios";
import html2canvas from "html2canvas";
import domtoimage from "dom-to-image";

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
      currentLogo: "",
      company: "",
      dialog: false,
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
    downloadImage(url) {
      this.dialog = true;
      this.currentLogo = url;
      let company = this.company;
      let mydiv = document.querySelector("#current_logo");
      setTimeout(() => {
        html2canvas(mydiv, {
          scale: 1,
          quality: 10,
          width: 2000,
          height: 2000,
          useCORS: true
        }).then(function(canvas) {
          console.log(canvas);
          var link = document.createElement("a");
          link.href = canvas.toDataURL("image/png");
          link.download = company + " - Logo Maker.png";
          link.click();
        });
      }, 1000);
    }
  }
};
</script>

<style>
.v-card__subtitle.card-logo,
.card-logo {
  font-family: "Quicksand", sans-serif;
  font-weight: bold;
  font-size: 24px;
  line-height: 30px;
  color: #000000 !important;
}
.card-logo.v-card:hover {
  border: 2px solid #3f51b5 !important;
}
.v-dialog.v-dialog--active.v-dialog--fullscreen {
  background: white;
}
.card-logo .v-image__image,
.current-logo .v-image__image {
  background-size: contain;
}
#current_logo h1 {
  font-size: 15rem;
  text-align: center;
  line-height: 25rem;
}

#current_logo img {
  width: 50%;
  margin-top: 25%;
}

#current_logo {
  width: 2000px;
  height: 2000px;
  left: -9999999px;
  top: -999999999;
  position: absolute;
  background: white;
}
</style>