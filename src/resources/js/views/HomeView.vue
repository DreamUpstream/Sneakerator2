<script setup>
import { reactive } from "vue";
import axios from "axios";
const state = reactive({});
</script>

<template>
    <div>
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                    >Sneaker code</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                />
                <div id="emailHelp" class="form-text">helper text</div>
            </div>
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="exampleCheck1"
                />
                <label class="form-check-label" for="exampleCheck1"
                    >Does not work</label
                >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
