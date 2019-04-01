<template>
    <div>
        <div id="map-container" class="w-full" style="height: calc(100vh - 55px);">
            <MglMap :accessToken="accessToken" :mapStyle="mapStyle" @load="onMapLoaded"
                :center="[40, 20]" :zoom="1.1" :minZoom="1.1" :maxZoom="15"
                :dragRotate="false" :touchZoomRotate="false" :keyboard="false"
            >
                <MglMarker v-for="place in places" :key="place.id"
                    :coordinates="[place.longitude, place.latitude]"
                    anchor="bottom">
                    <span slot="marker" class="text-lg">📍</span>
                </MglMarker>
            </MglMap>
        </div>

        <!-- <div class="fixed pin-t pin-l p-6" style="width: 300px; margin-top: 55px;">
            <div class="rounded-lg overflow-y-scroll border select-none" style="height: calc(100vh - 100px); background-color: rgba(255, 255, 255, 0.9);">
                <ul class="list-reset">
                    <li v-for="place in places" @click="flyTo(place.latitude, place.longitude); selectedPlaceId = place.id;"
                        class="flex hover:bg-grey-lighter p-4 border-b cursor-pointer"
                        :class="selectedPlaceId == place.id ? 'bg-grey-lighter' : ''"
                    >
                        <div class="flex items-center w-1/3">
                            <small class="block text-grey-dark truncate">
                                <span class="font-mono mr-1">&#9679;</span> {{ place.start_date | moment('Do MMMM Y') }}
                            </small>
                        </div>

                        <div class="truncate">
                            {{ place.name ? place.name : place.city + ', ' + place.country }}
                            <!-- <span v-if="place.description" class="block mt-3 text-sm truncate">
                                {{ place.description }}
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div> --> -->
    </div>
</template>

<script>
    import Mapbox from 'mapbox-gl'
    import { MglMap, MglMarker } from 'vue-mapbox'

    export default {
        components: { MglMap, MglMarker },

        props: ['places'],

        data() {
            return {
                accessToken: 'pk.eyJ1IjoiamFja2NydWRlbiIsImEiOiJjanNraTViN2oycTBwNDRtbGtleGMzcXNuIn0.yHJHr-M6VGpBhWoIN1oBkQ',
                mapStyle: 'mapbox://styles/jackcruden/cjtw58fzg1kff1fnw9pb3lksu',
                selectedPlaceId: null,
            }
        },

        methods: {
            onMapLoaded(event) {
                this.map = event.map
            },
            flyTo(latitude, longitude) {
                this.map.flyTo({
                    center: [longitude, latitude],
                    duration: 2000,
                    zoom: 5
                    // offset: [200, 0],
                    // curve: 1.3,
                    // speed: 1.2,

                })
            }
        },

        created() {
            // We need to set mapbox-gl library here in order to use it in template
            this.mapbox = Mapbox
            this.map = null
        }
    }
</script>

<style lang="scss">
    #map-container * {
        @apply .outline-none;
    }
</style>
