<template>
    <div class="modal show fade" style="display: block;" v-if="show">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
    <div v-if="show" class="modal-backdrop fade show"></div>
</template>
  
<script>
export default {
    props: ['show'],
    data() {
        return {
        }
    },
    mounted() {
    },
    methods: {},
}
</script>
  
 
  
  