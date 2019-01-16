<template>
    <div>
        <span class="m-0 p-0 mx-1">TEXT SIZE:</span> 
        <button @click="decreaseTextSize" title="Make text smaller" class="btn btn-outline-secondary round mx-1"><span class="sr-only">Make text smaller</span><i class="fa fa-minus" aria-hidden="true"></i></button>
        <button @click="resetTextSize" title="Reset text size" class="btn btn-outline-secondary round mx-1 reset-button"><span class="sr-only">Reset text size</span><i class="fa" aria-hidden="true">100%</i></button> 
        <button @click="increaseTextSize" title="Make text bigger" class="btn btn-outline-secondary round mx-1"><span class="sr-only">Make text bigger</span><i class="fa fa-plus" aria-hidden="true"></i></button> 
    </div>
</template>
<script>
    export default {
        methods: {
            increaseTextSize() {
                this.$root.textSize = (this.$root.textSize < 3 ? this.$root.textSize + 1 : this.$root.textSize);
            },
            decreaseTextSize() {
                this.$root.textSize = (this.$root.textSize > 0 ? this.$root.textSize - 1 : this.$root.textSize);
            },
            resetTextSize() {
                this.$root.textSize = 0;
            }
        }
    }
</script>
    