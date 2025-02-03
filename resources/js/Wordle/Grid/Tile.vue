<template>
    <div :style="styles"
         class="border-2 uppercase justify-center text-4xl font-bold flex items-center"
         :class="classes">
        {{ letter }}
    </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
    name: "Tile",
    props: {
        rowIndex: {
            type: Number,
            required: true
        },
        charIndex: {
            type: Number,
            required: true
        },
        size: {
            type: Number,
            default: 52
        }
    },
    computed: {
        ...mapState(['gameGrid', 'evaluations']),
        letter() {
          return this.gameGrid[this.rowIndex][this.charIndex]
        },
        status() {
          return this.evaluations[this.rowIndex][this.charIndex]
        },
        styles() {
            return {
                'width': this.size.toString() + 'px',
                'height': this.size.toString() + 'px'
            }
        },
        classes() {
            return {
                'bg-white': this.status === 'Empty',
                'border-gray-300': this.status === 'Empty',
                'bg-gray-400': this.status === 'Absent',
                'border-gray-400': this.status === 'Absent',
                'bg-yellow-400': this.status === 'Present',
                'border-yellow-400': this.status === 'Present',
                'bg-emerald-500': this.status === 'Correct',
                'border-emerald-500': this.status === 'Correct',
                'text-white': this.status !== 'Empty'
            }
        }
    }
}
</script>
