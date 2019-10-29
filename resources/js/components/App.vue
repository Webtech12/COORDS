<template>
   <div>
       <div class="col-md-9">
      <!-- The map goes here -->
      <div id="map" class="map"></div>
    </div>
    <div class="col-md-3">
      <!-- The layer checkboxes go here -->
      <div
  class="form-check"
  v-for="layer in layers"
  :key="layer.id"
>
  <!-- label and input elements go here -->
  <label class="form-check-label">
  <input
    class="form-check-input"
    type="checkbox"
    v-model="layer.active"
    @change="layerChanged(layer.id, layer.active)"
  />
  {{ layer.name }}
</label>
</div>
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
        layers: [{
         id: 0,
         name: 'Flights',
         active: false,
         features: [
         {
         id: 0,
         name: 'Bogart\'s Smokehouse',
         type: 'marker',
         coords: [24.68, 55.36],
         },
         {
         id: 1,
         name: 'Pappy\'s Smokehouse',
         type: 'marker',
         coords: [25.05, 51.29],
         },
         ],
      }],
    }
   },

    mounted() {
       this.initMap();
    this.initLayers();
    },
    

    methods: {
        initMap() {
            this.map = L.map('map').setView([25.252777,55.364445], 12);
this.tileLayer = L.tileLayer(
  'https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png',
  {
    maxZoom: 18,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https://carto.com/attribution">CARTO</a>',
  }
);
this.tileLayer.addTo(this.map);
        },


        initLayers() {
            this.layers.forEach((layer) => {
              
               // Initialize the layer
               // console.log('works');
               const markerFeatures = layer.features.filter(feature => feature.type === 'marker');
               console.log(layer);
               markerFeatures.forEach((feature) => {
               feature.leafletObject = L.marker(feature.coords)
                  .bindPopup(feature.name);
               });
            });
        },

        layerChanged(layerId, active) {
         //   alert('sdsd');

           const layer = this.layers.find(layer => layer.id === layerId);

           layer.features.forEach((feature) => {
            /* Show or hide the feature depending on the active argument */
            if (active) {
               feature.leafletObject.addTo(this.map);
               } else {
               feature.leafletObject.removeFrom(this.map);
               }
            });
         },
    },
}
</script>


<style scoped>
.map { height: 600px; }
</style>