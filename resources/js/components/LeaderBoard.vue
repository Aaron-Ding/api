<template>
    <div class="container-fluid text-center">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-header">
                Featured
            </div>

            <loading-view v-if="loading" :loading="loading" class="p-5"/>

            <ul class="list-group list-group-flush">
                <div class="list-group-item">
                    <button>x</button>
                    <span>Emma</span>
                    <button>+</button>
                    <button>-</button>
                    <span>25 points</span>
                </div>
                <div class="list-group-item">
                    <button>x</button>
                    <span>Danny</span>
                    <button  @click.prevent="buttonClick">+</button>
                    <button>-</button>
                    <span>25 points</span>
                </div>
                <div class="list-group-item">
                    <button>x</button>
                    <span>John</span>
                    <button>+</button>
                    <button>-</button>
                    <span>25 points</span>
                </div>
            </ul>
        </div>
    </div>
</template>

<script>
import {
gerAllUsers
} from './api';
export default {
    name: "LeaderBoard",

    data() {
        return {
            loading: false,
            users:[],
        }
    },
    created() {
        this.init();
    },

    methods: {
        init() {
            gerAllUsers().then(data => {
                console.log(data);
            }).catch(error => {

            });
        },
        buttonClick() {
            console.log('yo');
        }
    }
}
</script>

<style scoped>

</style>
