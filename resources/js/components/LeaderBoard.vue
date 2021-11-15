<template>
    <div class="container-fluid text-center">
        <div class="table-responsive col-12" style="width: 18rem;">

            <loading-view v-if="loading" :loading="loading" class="p-5"/>

            <table class="table table-bordered table-hover">
                <tbody>
                <tr v-for="user in users"
                >
                    <td>
                        <span>
                            <a @click.prevent="addPoint(user.id)" href="#" class="text-link">
                               X
                            </a>
                        </span>
                        <span>
                            {{user.name}}
                        </span>
                        <span>
                            <a @click.prevent="addPoint(user.id)" href="#" class="text-link">
                               +
                            </a>
                        </span>
                        <span>
                            <a @click.prevent="addPoint(user.id)" href="#" class="text-link">
                               -
                            </a>
                        </span>
                        <span>
                            {{user.point}}
                        </span>
                    </td>
                </tr>
                <tr>
                  <span>
                            <a @click.prevent="addPoint(user.id)" href="#" class="text-link">
                               + ADD USER
                            </a>
                        </span>
                </tr>
                </tbody>
            </table>
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
                this.users = data.data;
            }).catch(error => {

            });
        },
        buttonClick() {
            console.log('yo');
        },
        getTooltip(user) {

        }
    }
}
</script>

<style scoped>

</style>
