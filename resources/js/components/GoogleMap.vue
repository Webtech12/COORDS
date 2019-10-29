<template>
    <div>
        <div class="col-md-9">
      <!-- The map goes here -->
      <div id="map" class="map"></div>
    </div>
    <div class="col-md-3">
      <!-- The layer checkboxes go here -->
    </div>
    </div>
</template>

<script>
export default {
    // name: 'google-map',
    props: ['name'],
    data: function () {
        return {
        map: null,
        tileLayer: null,
        layers: [],
        }
    },

    mounted() {
       this.initMap();
    this.initLayers();
    },
    

    methods: {

        
        initMap() {
            this.map = L.map('map').setView([38.63, -90.23], 12);
this.tileLayer = L.tileLayer(
  'https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png',
  {
    maxZoom: 18,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https://carto.com/attribution">CARTO</a>',
  }
);
this.tileLayer.addTo(this.map);
        },
        initLayers() {},
    },
}
</script>


<style scoped>
.map { height: 600px; }
</style>