<script setup>
const bootstrap = require("bootstrap");
import { watch, nextTick } from "vue";
const props = defineProps({
    showModal: Boolean,
});
const emit = defineEmits(["onBootstrapModalClose"]);
const randomId = (Math.random() + 1).toString(36).substring(7);
nextTick(() => {
    const myModalEl = document.getElementById(randomId);
    const myModal = new bootstrap.Modal(myModalEl, {
        keyboard: false,
    });
    myModalEl.addEventListener("hidden.bs.modal", function () {
        emit("onBootstrapModalClose");
    });
    watch(
        () => props.showModal,
        (state, statePrevious) => {
            if (state) {
                myModal.show();
            }
        }
    );
});
</script>
<template>
    <div
        class="modal fade"
        :id="randomId"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <slot name="header"></slot>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</template>
