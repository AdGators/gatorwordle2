<template>
    <div class="flex">
        <tile v-for="(n,charIndex) in rowLength"
              :key="charIndex"
              :row-index="rowIndex"
              :char-index="charIndex"
              class="m-1"/>
    </div>
</template>

<script>
import Tile from './Tile.vue'
import { mapState } from 'vuex'

export default {
    name: "Row",
    components: {
        Tile
    },
    props: {
        rowIndex: {
            type: Number,
            required: true
        }
    },
    computed: {
        ...mapState(['gameGrid']),
        rowLength() {
            return this.gameGrid[this.rowIndex].length
        }
    }
}
</script>
